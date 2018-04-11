<?php
error_reporting(E_ALL);

  class Indoh2h {

    private $url, $username, $api_key;

    function __construct($auth)
    {
      $this->url = 'https://api.indoh2h.com/h2h';
      $this->username = $auth['api_username'];
      $this->api_key = $auth['api_key']
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

    function pln_postaid_inquiry($number)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'inquiry',
                      'number' => $number
                    );

      return $this->curl_post('/pln_postpaid',$data_post);
    }

    function pln_postaid_payment($inquiry_id,$number,$nominal,$trx_ref)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      "action" => "payment",
                      "inquiry_id" => $inquiry_id,
                      "number" => $number,
                      "nominal" => $nominal,
                      "trx_ref" => $trx_ref
                    );

      return $this->curl_post('/pln_postpaid',$data_post);
    }

    function bpjs_kes_inquiry($number,$jml_bln,$loket = array())
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'inquiry',
                      'number' => $number,
                      'jml_bln' => $jml_bln,
                      'loket' => $loket
                    );

      return $this->curl_post('/bpjs_kes',$data_post);
    }

    function bpjs_kes_payment($inquiry_id,$number,$nominal,$trx_ref)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      "action" => "payment",
                      "inquiry_id" => $inquiry_id,
                      "number" => $number,
                      "nominal" => $nominal,
                      "trx_ref" => $trx_ref
                    );

      return $this->curl_post('/bpjs_kes',$data_post);
    }

    function telkom_inquiry($code,$number)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      'action' => 'inquiry',
                      'code' => $code
                      'number' => $number
                    );

      return $this->curl_post('/telkom',$data_post);
    }

    function telkom_payment($code,$inquiry_id,$number,$nominal,$trx_ref)
    {
      $data_post = array(
                      'username' => $this->username,
                      'api_key' => $this->api_key,
                      "action" => "payment",
                      "inquiry_id" => $inquiry_id,
                      "code" => $code,
                      "number" => $number,
                      "nominal" => $nominal,
                      "trx_ref" => $trx_ref
                    );

      return $this->curl_post('/telkom',$data_post);
    }

    function vgame()
    {
      
    }
  }

?>
