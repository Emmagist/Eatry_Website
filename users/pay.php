
<?php
function genReference($qtd){
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
    $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
    $QuantidadeCaracteres = strlen($Caracteres);
    $QuantidadeCaracteres--;
 
    $Hash=NULL;
 
    for($x=1;$x<=$qtd;$x++){
        $Posicao = rand(0,$QuantidadeCaracteres);
        $Hash .= substr($Caracteres,$Posicao,1);
    }
 
    return $Hash;
}
 
 
$result = array();

$per = $_POST['total'] /2;
$per_total = $per * 100;
 
//Set other parameters as keys in the $postdata array
$postdata = array(
    'email' => $_POST['email'],
    'name' => $_POST['name'],
    'amount' => $per_total,
    'title' => $_POST['food_title'],
    'quantiy' => $_POST['food_quantity'],
    "reference" => genReference(10),
      'metadata'=>json_encode([
      'order_reference'=>$_POST['order_reference'],
      'custom_fields'=> [
        [
          'display_name'=> "Name",
          'variable_name'=> "name",
          'value'=> $_POST['name']
        ],
        [
          'display_name'=> "Phone number",
          'variable_name'=> "phone_number",
          'value'=> $_POST['phone_number']
        ],
        [
          'display_name'=> "city",
          'variable_name'=> "city",
          'value'=> $_POST['city']
        ],
        [
          'display_name'=> "Country",
          'variable_name'=> "Country",
          'value'=> $_POST['country']
        ],
         [
          'display_name'=> "Order reference",
          'variable_name'=> "order_reference",
          'value'=> $_POST['order_reference']
        ],
        [
          'display_name'=> "quantiy",
          'variable_name'=> "quantiy",
          'value'=> $_POST['food_quantity']
        ],
        [
          'display_name'=> "title",
          'variable_name'=> "title",
          'value'=>  $_POST['food_title']
        ]
      ]
    ])
);
 
$url = "https://api.paystack.co/transaction/initialize";
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
$headers = [
    'Authorization: Bearer sk_test_2a0325b2ffd0a06eb02da123a4a5019e1fdbe3fa',
    'Content-Type: application/json',
 
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
$request = curl_exec($ch);
 
curl_close($ch);
 
if ($request) {
 
    $result = json_decode($request, true);
 
    header('Location: ' . $result['data']['authorization_url']);
 
}