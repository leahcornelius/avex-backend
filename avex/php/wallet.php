<?php
require_once '/api/jsonRPCClient.php';
use TurtleCoin\TurtleService;

$config = [
    'rpcHost'     => 'http://localhost',
    'rpcPort'     => 1234,
    'rpcPassword' => 'password',
];

$avrio = new TurtleService($config);
$bitcoin = new jsonRPCClient('http://username:password@127.0.0.1:8332/');
function get_wallet(userId,currency) { //Balance, Deposit address 
    if ($currency == "BTC") {
        $address=$bitcoin->getaccountaddress($userId);
        $wallet = array(
            "balance" => bitcoind->getbalance($userId),
            "deposit_address" => $address
         )
    } else if ($currency == "AIO") {
        $myfile = fopen("avrio-wallets.dat", "r") or die("Unable to open file!");
        while (fgets($myfile) != $userId) {
        }
        $address = fgets($myFile);
        $response = $avrio->getBalance($address);
        $obj = json_decode($response);
        fclose($myfile);
        $wallet = array(
            "balance" => obj->result->availableBalance,
            "deposit_address" => "Aio88999cccf8a312b413e2e49d91ce91653f5f4be32159634818676afb78dc647"
        )
    }
    return wallet;
}
    
function withdraw(userId,currency,amount,wallet_to,fee) {
    if (strtoupper($currency) ==  "BTC") {
        return $bitcoin->sendfrom($userId,$receiver,$amount,3);  
    } else if (strtoupper($currency) == "AIO") {
        return ; // todo
    }
}
    
function create_wallets(new_userId) {
    return $bitcoin->getaccountaddress($new_userId);
}

function transfer_funds(userIdFrom,userIdTo,currency,amount) {
    return 1;
}
?>
