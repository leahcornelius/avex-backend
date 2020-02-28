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
        $db_bal = bal_get(userId, currency);
        bal_edit($userId,$currency,$bitcoin->getbalance($userId), "keep");
        $wallet = array(
            "balance" => $db_bal->funds + $db_bal->additionalFunds,
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
        bal_edit($userId,$currency,obj->result->availableBalance, "keep");
        $db_bal = bal_get(userId, currency);
        $wallet = array(
            "balance" => $db_bal->funds + $db_bal->additionalFunds,
            "deposit_address" => $address
        )
    }
    return wallet;
}
    
function withdraw($userId,$currency,$amount,$wallet_to,$fee) {
    if (strtoupper($currency) ==  "BTC") {
        return $bitcoin->sendfrom($userId,$receiver,$amount,3);  
    } else if (strtoupper($currency) == "AIO") {
        $wallet = get_wallet(userId, "AIO");
        $anonymity = 0;
        $transfers = [
            ["address" => $wallet_to, "amount"  => amount],
        ];

        $response = $avrio->sendTransaction(
            0, $transfers, $fee, null, null, null, null, null
        );
        $json_parsed = json_decode(response);
        return json_parsed->result->transactionHash;
    }
}
    
function create_wallets($new_userId) {
    $spendSecretKey = null;
    $spendPublicKey = null;
    $response = $avrio->createAddress($spendSecretKey, $spendPublicKey);
    $obj = json_decode(response);
    $new_aio_address = onj->result->address
    $fp = fopen('avrio-wallets.dat', 'a');//opens file in append mode.
    fwrite($fp, $new_userId);
    fwrite($fp, $new_aio_address);
    fclose($fp);
    return array (
        "bitcoin" => $bitcoin->getaccountaddress($new_userId),
        "avrio" => $new_aio_address
}

function transfer($userId, $toUserId, $currency, $amount) {
    if ($currency == "BTC") {
        $balance = $bitcoind->getbalance($userId) + $db_bal->additionalFunds;
        bal_edit($userId,$currency,$balance, $amount);
        //
        $balance_to = $bitcoind->getbalance($toUserId);
        bal_edit($toUserId,$currency,$balance_to, abs($amount));
    } else if ($currency == "AIO") {
        $myfile = fopen("avrio-wallets.dat", "r") or die("Unable to open file!");
        while (fgets($myfile) != $userId) {
        }
        $address = fgets($myFile);
        $response = $avrio->getBalance($address);
        $obj = json_decode($response);
        fclose($myfile);
        $balance = obj->result->availableBalance;
         bal_edit($userId,$currency,$balance, $amount);
        //
        $myfile_to = fopen("avrio-wallets.dat", "r") or die("Unable to open file!");
        while (fgets($myfile_to) != $toUserId) {
        }
        $address_to = fgets($myFile);
        $response_to = $avrio->getBalance($address);
        $obj_to = json_decode($response_to);
        fclose($myfile_to);
        $balance_to = obj->result->availableBalance;
         bal_edit($toUserId,$currency,$balance_to, abs($amount));
    }
}
        
?>
