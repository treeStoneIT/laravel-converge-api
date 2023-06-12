<?php

namespace Treestoneit\LaravelConvergeApi;

class ConvergeRequest
{
    private string $merchant_id;

    private string $user_id;

    private string $pin;

    private bool $demo;

    private string $xmlEndpoint;

    /**
     * Construct Converge Request object with provided settings.
     *
     *
     * @throws \Treestoneit\LaravelConvergeApi\ConvergeException
     */
    public function __construct(array $settings)
    {
        $this->validateSettings($settings);

        $this->merchant_id = $settings['merchant_id'];
        $this->user_id = $settings['user_id'];
        $this->pin = $settings['pin'];

        if (isset($settings['demo']) && $settings['demo'] == true) {
            $this->demo = true;
            $this->xmlEndpoint = 'https://api.demo.convergepay.com/VirtualMerchantDemo/process.do';
        } else {
            $this->demo = false;
            $this->xmlEndpoint = 'https://api.convergepay.com/VirtualMerchant/process.do';
        }
    }

    /**
     * Make request to Converge with transaction type and parameters.
     */
    public function request($transactionType, array $parameters): array
    {
        return $this->httpRequest(array_merge(['ssl_transaction_type' => $transactionType], $parameters));
    }

    /**
     * Validate provided settings when constructing class.
     *
     * @throws ConvergeException
     */
    private function validateSettings(array $settings): bool
    {
        if (! isset($settings['merchant_id'])) {
            throw new ConvergeException('Please provide a valid merchant id in settings.');
        }
        if (! isset($settings['user_id'])) {
            throw new ConvergeException('Please provide a valid user id in settings.');
        }
        if (! isset($settings['pin'])) {
            throw new ConvergeException('Please provide a valid pin in settings.');
        }

        return true;
    }

    private function httpRequest($parameters): array
    {
        $parameters['ssl_merchant_id'] = $this->merchant_id;
        $parameters['ssl_user_id'] = $this->user_id;
        $parameters['ssl_pin'] = $this->pin;
        $parameters['ssl_show_form'] = 'false';
        $parameters['ssl_result_format'] = 'ascii';

        $ch = curl_init($this->xmlEndpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Break out response into array of key value pairs
        $response = [];
        foreach (explode("\n", curl_exec($ch)) as $part) {
            $pParts = explode('=', $part);
            if (isset($pParts[1])) {
                $response[$pParts[0]] = $pParts[1];
            }
        }

        isset($response['errorCode']) ? $response['success'] = false : $response['success'] = true;

        return $response;
    }
}
