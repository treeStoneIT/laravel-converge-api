<?php

namespace Treestoneit\LaravelConvergeApi;

use Illuminate\Support\Facades\Config;
use wwwroth\Converge\Converge as ConvergePHP;

class Converge
{
    public ConvergePHP $converge;

    public function __construct()
    {
        $this->converge = new ConvergePHP([
            'merchant_id' => Config::get('converge-api.merchant_id'),
            'user_id' => Config::get('converge-api.user_id'),
            'pin' => Config::get('converge-api.pin'),
            'demo' => Config::get('converge-api.demo'),
        ]);
    }

    public function getToken(array $params): array
    {
        return $this->converge->request('ccgettoken', $params);
    }

    public function authOnly(array $params): array
    {
        return $this->converge->request('ccauthonly', $params);
    }

    public function sale(array $params): array
    {
        return $this->converge->request('ccsale', $params);
    }

    public function verify(array $params): array
    {
        return $this->converge->request('ccverify', $params);
    }

    public function credit(array $params): array
    {
        return $this->converge->request('cccredit', $params);
    }

    public function avsOnly(array $params): array
    {
        return $this->converge->request('ccavsonly', $params);
    }

    public function force(array $params): array
    {
        return $this->converge->request('ccforce', $params);
    }

    public function balanceInquiry(array $params): array
    {
        return $this->converge->request('ccbalinquiry', $params);
    }

    public function return(array $params): array
    {
        return $this->converge->request('ccreturn', $params);
    }

    public function void(array $params): array
    {
        return $this->converge->request('ccvoid', $params);
    }

    public function complete(array $params): array
    {
        return $this->converge->request('cccomplete', $params);
    }

    public function delete(array $params): array
    {
        return $this->converge->request('ccdelete', $params);
    }

    public function updateTip(array $params): array
    {
        return $this->converge->request('ccupdatetip', $params);
    }

    public function signature(array $params): array
    {
        return $this->converge->request('ccsignature', $params);
    }

    public function addRecurring(array $params): array
    {
        return $this->converge->request('ccaddrecurring', $params);
    }

    public function addInstall(array $params): array
    {
        return $this->converge->request('ccaddinstall', $params);
    }

    public function updateToken(array $params): array
    {
        return $this->converge->request('ccupdatetoken', $params);
    }

    public function deleteToken(array $params): array
    {
        return $this->converge->request('ccdeletetoken', $params);
    }

    public function queryToken(array $params): array
    {
        return $this->converge->request('ccquerytoken', $params);
    }
}
