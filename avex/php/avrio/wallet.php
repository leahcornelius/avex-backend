<?php
function get_wallet(userId,currency) //Balance, Locked funds, Deposit address {
    if (currency == "BTC") {
        $wallet = array(
            "balance" => 0.345834,
            "locked_balance" => 0.0003,
            "deposit_address" => "1999cccf8a312b413e2e49d91ce91653f5f4be32159634818676afb78dc647"
         )
    } else if (currency == "AIO") {
        $wallet = array(
            "balance" => 1.2345,
            "locked_balance" => 0.032,
            "deposit_address" => "Aio88999cccf8a312b413e2e49d91ce91653f5f4be32159634818676afb78dc647"
        )
    }
    return wallet;
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
