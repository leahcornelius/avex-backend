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

}

function removeFunds(userId, ammount) {

}
function transferFund(sId, rId, ammount) {

}
function deleteWallet(userId) {

}
function withdrawFunds(userid, ammount, address) {

}
function getBalance(userId) {

}
function getDepositAddress(userid) {

}
function getTransactions(userid) {

}

?>
