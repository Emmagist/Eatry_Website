<?php
$result = array();
//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/'. $_GET['reference'];
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
$ch, CURLOPT_HTTPHEADER, [
'Authorization: Bearer sk_test_2a0325b2ffd0a06eb02da123a4a5019e1fdbe3fa']
);
$request = curl_exec($ch);
curl_close($ch);
 
if ($request) {
$result = json_decode($request, true);
}
 
if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
echo "Transaction was successful";
//Perform necessary action
}else{
echo "Transaction was unsuccessful";
}