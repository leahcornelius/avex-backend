<?php
function get_wallet(userId,currency) //Balance, Locked funds, Deposit address {
    $wallet = [
    0 => 1.2345, // bal
    1 => 0.032, // locked bal
    2 => "Aio88999cccf8a312b413e2e49d91ce91653f5f4be32159634818676afb78dc647" // deposit address
}
    
function lock_funds(userId,currency,direction,amount) //Direction being '+' or '-' {
    return 1;
}
    
function withdraw(userId,currency,amount,wallet_to,fee) {
    return 1;

}
    
function create_wallets(new_userId) {
    return 1;
}

function transfer_funds(userIdFrom,userIdTo,currency,amount) {
    return 1;
}
?>
