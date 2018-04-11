<?php

include "indoh2h.php";

$auth = array('api_username' => 'pratamapayment', 'api_key' => 'f0119ff8a151b096b026782c244ccaf01b2e4562');
$h2h = new Indoh2h($auth);

echo "<pre>";

// $balance = $h2h->check_balance(); //()
// print_r($balance);
//
// $topup = $h2h->topup(500000); // (NOMINAL)
// print_r($topup);

// $check_trx_by_trxid = $h2h->check_trx_by_trxid('h2h-00041'); // (TRX-ID)
// print_r($check_trx_by_trxid);

// $check_trx_by_trxref = $h2h->check_trx_by_trxref('TRX-41'); // (TRX-REF)
// print_r($check_trx_by_trxref);

// $pulsa_provider = $h2h->pulsa_provider(); // ()
// print_r($pulsa_provider);

// $pulsa_pricelist = $h2h->pulsa_pricelist('TELKOMSEL'); // (PROVIDER_NAME)
// print_r($pulsa_pricelist);

// $pulsa_purchase = $h2h->pulsa_purchase('S5','081291220010','TRX-50'); // (CODE,NUMBER,TRX_REF)
// print_r($pulsa_purchase);

// $pln_prepaid_pricelist = $h2h->pln_prepaid_pricelist(); // ()
// print_r($pln_prepaid_pricelist);

// $pln_prepaid_purchase = $h2h->pln_prepaid_purchase('PLN20','56503031991','TRX-52'); // (CODE,NUMBER,TRX_REF)
// print_r($pln_prepaid_purchase);

$pln_postpaid_inquiry = $h2h->pln_postpaid_inquiry('530000000001');
print_r($pln_postpaid_inquiry);



echo "</pre>";

?>
