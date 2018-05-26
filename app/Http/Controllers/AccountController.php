<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function rechargeAccountView()
    {
        return view('rechargeAccount');
    }
    public function rechargeAccount(Request $request, $user_id)
    {
        $current_amount = Account::select('current_amount')->where('users_id', $user_id)->get();;
        DB::table('accounts')->where('users_id', '=', $user_id)->update(['current_amount' => ($request->recharge_ammount + $current_amount[0]['current_amount'])]);
        Session::flash('flash_message', 'You have successfuly recharged the account');
        return back();
    }
    public function search(Request $request){
        $searchResult = User::where('name', 'like', '%'.$request->keyword.'%')->get();
        //$categories = CourseCategory::all();
        return view('searchResult')->with('searchResult', $searchResult)->with('request', $request);
    }
    public function rechargeUserAccount($id)
    {
        $username = User::select('name')->where('id', $id)->get();
        return view('rechargeUserAccount')->with('user_id', $id)->with('username', $username);
    }
}
