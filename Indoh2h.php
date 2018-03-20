<?php
error_reporting(E_ALL);

  class Indoh2h {

    private $url, $username, $api_key;

    function __construct($username,$api_key)
    {
      $this->url = 'https://api.indoh2h.com/h2h';
      $this->username = $username;
      $this->api_key = $api_key;
    }

    function curl_post($end_point,$data_post)
    {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $this->url.$end_point);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_post));
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      $result = curl_exec($ch);
      $result_data = json_decode($result);
      return $result_data;
    }

    function check_balance()
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'check_balance'
                    );

      return $this->curl_post('/account',$data_post);
    }

    function topup($nominal)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'topup',
                      'nominal_request' => $nominal
                    );

      return $this->curl_post('/account',$data_post);
    }

    function check_trx_by_trxid($trx_id)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'check_by_trx_id',
                      'trx_id' => $trx_id
                    );

      return $this->curl_post('/transaction',$data_post);
    }

    function check_trx_by_trxref($trx_ref)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'check_by_trx_ref',
                      'trx_ref' => $trx_ref
                    );

      return $this->curl_post('/transaction',$data_post);
    }

    function pulsa_provider()
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'providerlist'
                    );

      return $this->curl_post('/pulsa',$data_post);
    }

    function pulsa_pricelist($provider)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'pricelist',
                      'provider' => $provider
                    );

      return $this->curl_post('/pulsa',$data_post);
    }

    function pulsa_purchase($code,$number,$trx_ref)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'purchase',
                      'code' => $code,
                      'number' => $number,
                      'trx_ref' => $trx_ref
                    );

      return $this->curl_post('/pulsa',$data_post);
    }

    function pln_prepaid_pricelist()
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'pricelist'
                    );

      return $this->curl_post('/pln_prepaid',$data_post);
    }

    function pln_prepaid_purchase($code,$number,$trx_ref)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'purchase',
                      'code' => $code,
                      'number' => $number,
                      'trx_ref' => $trx_ref
                    );

      return $this->curl_post('/pln_prepaid',$data_post);
    }

  }

?>
