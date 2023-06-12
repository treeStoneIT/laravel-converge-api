<?php

namespace Treestoneit\LaravelConvergeApi;

use Illuminate\Support\Facades\Config;

class Converge
{

    /**
     * Full documentation can be found here:
     * @link https://developer.elavon.com/na/docs/converge/1.0.0/integration-guide/transaction_types/credit_card
     */
    public ConvergeRequest $converge;

    /**
     * @throws \Treestoneit\LaravelConvergeApi\ConvergeException
     */
    public function __construct()
    {
        $this->converge = new ConvergeRequest([
            'merchant_id' => Config::get('converge-api.merchant_id'),
            'user_id' => Config::get('converge-api.user_id'),
            'pin' => Config::get('converge-api.pin'),
            'demo' => Config::get('converge-api.demo'),
        ]);
    }

    /**
     *  Auth Only - ccauthonly
     *
     * The Credit Card Authorization Only or ccauthonly transaction obtains a real-time authorization for a credit card transaction, guarantees that the funds are available on the card, and reduces the cardholder‘s limit to buy for only a predetermined period (which is usually 7-10 days based on the credit card’s issuing bank).
     *
     * @param array $params
     *
     * @return array
     */
    public function authOnly(array $params): array
    {
        return $this->converge->request('ccauthonly', $params);
    }

    /**
     *  Sale - ccsale
     *
     * The ccsale transaction obtains real-time authorization for a Credit Card Sale transaction and enters the transaction into the Unsettled batch.
     *
     * @param array $params
     *
     * @return array
     */
    public function sale(array $params): array
    {
        return $this->converge->request('ccsale', $params);
    }

    /**
     * Verification - ccverify
     *
     * The ccverify transaction verifies the credit card account for AVS and CVV data. AVS and CVV codes are returned to indicate if the AVS and CVV data passed originally were correct and matched the cardholder statement billing address and the CVV value located on the card.
     *
     * @param array $params
     *
     * @return array
     */
    public function verify(array $params): array
    {
        return $this->converge->request('ccverify', $params);
    }

    /**
     * Balance Inquiry - ccbalinquiry
     *
     * The ccbalinquiry transaction returns the balance of a pre-paid card.
     *
     * @param array $params
     *
     * @return array
     */
    public function balanceInquiry(array $params): array
    {
        return $this->converge->request('ccbalinquiry', $params);
    }

    /**
     * Return - ccreturn
     *
     * The ccreturn transaction issues a partial or full refund to a cardholder’s credit card using the Transaction ID of the original Sale or Force. This will guarantee that the same credit card used previously for the purchase is the one being refunded.
     *
     * Enhanced credits for an amount higher than the original Sale or Force transaction amount are not allowed. Converge tracks partial refunds against the balance of the original transaction. If a partial refund would result in total refunds exceeding the value of the original transactions, Converge will return an error.
     *
     * @param array $params
     *
     * @return array
     */
    public function return(array $params): array
    {
        return $this->converge->request('ccreturn', $params);
    }

    /**
     * Void - ccvoid
     *
     * The Credit Card Void or ccvoid transaction removes a Sale, Credit or Force transaction from the open batch. Commonly used for same day returns or to correct cashier mistakes, and can only be performed before the batch is settled.
     *
     * @param array $params
     *
     * @return array
     */
    public function void(array $params): array
    {
        return $this->converge->request('ccvoid', $params);
    }

    /**
     * Completion - cccomplete
     *
     * The cccomplete transaction places an approved Auth Only transaction into the open batch for settlement and converts the approved Auth Only transaction into a Sale transaction.
     *
     * @param array $params
     *
     * @return array
     */
    public function complete(array $params): array
    {
        return $this->converge->request('cccomplete', $params);
    }

    /**
     * Delete - ccdelete
     *
     * The Credit Card Delete or ccdelete transaction deletes and attempts a Reversal on a Credit Card Sale or Auth Only transaction.
     *
     * This transaction is typically used in a Partial Approval scenario. When a consumer decides not to continue with an additional tender type, the point of sale application must send a reversal to cancel the payment and restore the balance to the card. Reversal frees up the cardholders' open to buy amounts by reducing issuer holds on available balances when transactions are not completed. This reduces declines at the point of sale and the amount of cardholder complaints that are unpleasant for all parties involved.
     *
     * @param array $params
     *
     * @return array
     */
    public function delete(array $params): array
    {
        return $this->converge->request('ccdelete', $params);
    }

    /**
     * Update Tip - ccupdatetip
     *
     * The ccupdatetip transaction adds, modifies or resets a tip (gratuity) amount on an open approved Credit Card Sale or Force transaction.
     *
     * @param array $params
     *
     * @return array
     */
    public function updateTip(array $params): array
    {
        return $this->converge->request('ccupdatetip', $params);
    }

    /**
     * Signature - ccsignature
     *
     * The ccsignature transaction adds signature data to a previously approved Credit Card Sale (ccsale), Auth Only (ccauthonly), or Force (ccforce) transaction.
     *
     * @param array $params
     *
     * @return array
     */
    public function signature(array $params): array
    {
        return $this->converge->request('ccsignature', $params);
    }

    /**
     * Add Recurring - ccaddrecurring
     *
     * The ccaddrecurring transaction adds a credit card recurring record to the Converge recurring batch. Once added, the transaction will run automatically within the specified billing cycle on the scheduled payment day without the need to send it for authorization.
     *
     * @param array $params
     *
     * @return array
     */
    public function addRecurring(array $params): array
    {
        return $this->converge->request('ccaddrecurring', $params);
    }

    /**
     * Update Recurring - ccupdaterecurring
     *
     * The ccupdaterecurring transaction updates a credit card recurring record in Converge.
     *
     * @param array $params
     *
     * @return array
     */
    public function updateRecurring(array $params): array
    {
        return $this->converge->request('ccupdaterecurring', $params);
    }

    /**
     * Delete Recurring - ccdeleterecurring
     *
     * The ccdeleterecurring transaction deletes a credit card recurring record from Converge.
     *
     * @param array $params
     *
     * @return array
     */
    public function deleteRecurring(array $params): array
    {
        return $this->converge->request('ccdeleterecurring', $params);
    }

    /**
     * Submit Recurring Payment - ccrecurringsale
     *
     * The ccrecurringsale transaction allows you to run a credit card recurring payment outside of its billing cycle. This will increase the payment number.
     *
     * @param array $params
     *
     * @return array
     */
    public function recurringSale(array $params): array
    {
        return $this->converge->request('ccrecurringsale', $params);
    }

    /**
     * Add Installment - ccaddinstall
     *
     * The ccaddinstall transaction adds a credit card installment record to the Converge recurring batch. Once added, the transaction will run automatically within the specified billing cycle on the scheduled payment day without the need to send it for authorization.
     *
     * @param array $params
     *
     * @return array
     */
    public function addInstallment(array $params): array
    {
        return $this->converge->request('ccaddinstall', $params);
    }

    /**
     * Update Installment - ccupdateinstall
     *
     * The ccupdateinstall transaction updates a credit card installment record in Converge.
     *
     * @param array $params
     *
     * @return array
     */
    public function updateInstallment(array $params): array
    {
        return $this->converge->request('ccupdateinstall', $params);
    }

    /**
     * Delete Installment - ccdeleteinstall
     *
     * The ccdeleteinstall transaction deletes a credit card installment record from Converge.
     *
     * @param array $params
     *
     * @return array
     */
    public function deleteInstallment(array $params): array
    {
        return $this->converge->request('ccdeleteinstall', $params);
    }

    /**
     * Submit Installment Payment - ccinstallsale
     *
     * The ccinstallsale transaction allows you to run a credit card installment payment outside of its billing cycle. This will increase the payment number.
     *
     * @param array $params
     *
     * @return array
     */
    public function installmentSale(array $params): array
    {
        return $this->converge->request('ccinstallsale', $params);
    }

    /**
     * Token Query - ccquerytoken
     *
     * The ccquerytoken transaction retrieves information associated with a token.
     *
     * @param array $params
     *
     * @return array
     */
    public function queryToken(array $params): array
    {
        return $this->converge->request('ccquerytoken', $params);
    }

    /**
     * Token Update - ccupdatetoken
     *
     * The ccupdatetoken transaction updates the information associated with a token.
     *
     * @param array $params
     *
     * @return array
     */
    public function updateToken(array $params): array
    {
        return $this->converge->request('ccupdatetoken', $params);
    }

    /**
     *  Generate Token - ccgettoken
     *
     * The ccgettoken transaction generates a token from a card number or an existing recurring/installment in the recurring batch. The token generated can be used in place of a credit card number in any subsequent transactions. Additionally, you can request to add the generated token to Card Manager.
     *
     * @param array $params
     *
     * @return array
     */
    public function getToken(array $params): array
    {
        return $this->converge->request('ccgettoken', $params);
    }

    /**
     * Token Delete - ccdeletetoken
     *
     * The ccdeletetoken transaction deletes a token from Card Manager.
     *
     * @param array $params
     *
     * @return array
     */
    public function deleteToken(array $params): array
    {
        return $this->converge->request('ccdeletetoken', $params);
    }

    /**
     * Custom Transaction Type for cases where our existing endpoints don't
     * cover your use case
     *
     * @param string $transactionType
     * @param array $params
     *
     * @return array
     */
    public function custom(string $transactionType, array $params): array
    {
        return $this->converge->request($transactionType, $params);
    }
}
