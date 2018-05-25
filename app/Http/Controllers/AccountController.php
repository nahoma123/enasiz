<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function rechargeAccountView()
    {
        return view('rechargeAccount');
    }
    public function rechargeAccount(Request $request, $user_id)
    {
        $current_amount = DB::table('better_users')->select('current_amount')->where('users_id', $user_id)->get();
        DB::table('accounts')->where('users_id', '=', $user_id)->update(['current_amount' => $request->amount + $current_amount]);
    }
}
