<?php
require_once '/api/jsonRPCClient.php';
$bitcoin = new jsonRPCClient('http://username:password@127.0.0.1:8332/');
function get_wallet(userId,currency) { //Balance, Deposit address 
    if ($currency == "BTC") {
        $address=$bitcoin->getaccountaddress($userId);
        $wallet = array(
            "balance" => bitcoind->getbalance($userId),
            "deposit_address" => $address
         )
    } else if ($currency == "AIO") {
        $wallet = array(
            "balance" => 104.3200,
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
