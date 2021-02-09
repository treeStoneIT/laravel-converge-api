<?php

return [
    /*
     * Merchant ID: Elavon-assigned Converge account ID.
     */
    'merchant_id' => env('CONVERGE_MERCHANT_ID', ''),

    /*
     * Converge User ID: The user ID with Hosted Payment API User status that
     * can send transaction requests through the terminal.
     */
    'user_id'     => env('CONVERGE_USER_ID', ''),

    /*
     * Terminal ID: Unique identifier of the terminal that will process the
     * transaction request and submit to the Converge gateway.
     *
     * Important: The ssl_user_id sending the transaction request must be
     * associated with the terminal that will process the request.
     */
    'pin'         => env('CONVERGE_PIN', ''),

    /*
     * Demo / Live Site
     */
    'demo'        => env('CONVERGE_DEMO', true),
];
