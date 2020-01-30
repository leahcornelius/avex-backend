var avex_app = new Vue({
    el: '#avex-app',
    data: {

        primary_currency: "aio",
        secondary_currency: "btc",
        
        buy_orders: [
            {
                price: 0.95,
                amount: 2.3,
            },
            {
                price: 1,
                amount: 2
            },
            {
                price: 1.1,
                amount: 3
            }
        ],
        
        sell_orders: [
            {
                price: 1.95,
                amount: 2.3,
            },
            {
                price: 2,
                amount: 2
            },
            {
                price: 3.1,
                amount: 3
            }    
        ],
        
        show_orders: "buy",
        
        trade_mode: "buy"

    }
})