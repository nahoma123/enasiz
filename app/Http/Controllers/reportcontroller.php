<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class reportcontroller extends Controller {

    //
    public function showUserAccountActivityForm() {
        $user = User::where('privilage_level', 0)->get();
        return View('user_account_acivity_form')->with('users', $user);
    }

    public function getAllStaffStatus() {
        $employed = User::whereNotIn('privilage_level', [0])->where('status', 1)->get();
        $unemployed = User::whereNotIn('privilage_level', [0])->where('status', 0)->get();
        return View('employee_status')->with('employed', $employed)->with('unemployed', $unemployed);
    }

    public function showUserTransactions(User $user, $lastdate, $firstdate) {
        $trasactions = $user->account->transactions()->whereDate('updated_at', '<=', [$lastdate])->whereDate('updated_at', '>', [$firstdate]);
        if (!$user->account) {
            $account = null;
        } else {
            $account = $user->account()->get();
        }

        return View('report_user_activity')->with('user', $user)->with('account', $account)->with('transaction', $trasactions);
    }
    public function deactivate(User $user){
        $user->status=0;
        $user->save();
        $employed = User::whereNotIn('privilage_level', [0])->where('status', 1)->get();
        $unemployed = User::whereNotIn('privilage_level', [0])->where('status', 0)->get();
        return View('employee_status')->with('employed', $employed)->with('unemployed', $unemployed);
    }
     public function activate(User $user){
        $user->status=1;
        $user->save();
        $employed = User::whereNotIn('privilage_level', [0])->where('status', 1)->get();
        $unemployed = User::whereNotIn('privilage_level', [0])->where('status', 0)->get();
        return View('employee_status')->with('employed', $employed)->with('unemployed', $unemployed);
    }

}
