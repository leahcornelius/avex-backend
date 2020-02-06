<?php
use TurtleCoin\TurtleService;

$config = [
    'rpcHost'     => 'http://localhost',
    'rpcPort'     =>  12345,
    'rpcPassword' => 'password',
];

$avrio-wallet = new TurtleService($config);
function reset() {
  $scanHeight = 0;
  $response = $avrio-wallet->reset($scanHeight);
  return $response;
}
function save() {
  $response = $avrio-wallet->save();
  return $response;
}
function getStatus() {
  $response = $avrio-wallet->getStatus();
  return $response;
}
function addFunds(userId, ammount) {
    return true;
}

function removeFunds(userId, ammount) {
    return true;
}
function transferFund(sId, rId, ammount) {
    return true;
}
function deleteWallet(userId) {
    return true;
}
function withdrawFunds(userid, ammount, address) {
    return true;
}
function getBalance(userId) {
    return 3.2292
}
function getDepositAddress(userid) {
    return "Aio88999cccf8a312b413e2e49d91ce91653f5f4be32159634818676afb78dc647" ;
}
function getTransactions(userid) {
    $txns = [
        0 => "288999cccf8a312b413e2e49d91ce91653f5f4be32159634818676afb78dc647",
        1 => "9299accccf8a312b413e2e49d91ce91653f5f4be32159634818676afb78jsj82"
    ];
    return txns;
}
function lockFunds(userid,ammount) {
    return true;
}

?>
