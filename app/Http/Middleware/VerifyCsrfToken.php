<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware {

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/post_callback/*',
        '/post_callback2/*',
        '/register/', 
        '/all_members' ,
        '/member/*',
        '/savings_accounts',
        '/loan_accounts',
        '/mobile_banking_login',
        '/mobile_banking_b2c_callback',
        '/mobile_banking_b2b_callback',
        '/mobile_banking_withdrawal',
        '/mobile_banking_fund_transfer',
        '/mobile_banking_account_balance',
        '/mobile_banking_ministatement',
        '/mobile_banking_utility_services',
        '/mobile_banking_refer_friend',
       
    ];

}
