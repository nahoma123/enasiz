<?php

namespace App\Http\Controllers;

use App\Account;
use App\User;
use \GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function rechargeAccountApi( $email)
    {
        $user= User::where("email",$email)->first();
        $current_amount = Account::select('current_amount')->where('users_id', $user->user_id)->first();
        $account = Account::where("users_id",'=',$user->id)->first();
        $account->current_amount = $account->current_amount + request()->ammount;
        $account->save();
        
        
        
//        DB::table('accounts')->where('users_id', '=', $user->user_id)->update(['current_amount' => (request()->recharge_ammount + $current_amount['current_amount'])]);
        return 200;
    }
    public function dischargeAccountApi( $email)
    {
        $user= User::where("email",$email)->first();
        $current_amount = Account::select('current_amount')->where('users_id', $user->user_id)->first();
        $account = Account::where("users_id",'=',$user->id)->first();
        $account->current_amount = $account->current_amount - request()->ammount;
        $account->save();
        
        
        
//        DB::table('accounts')->where('users_id', '=', $user->user_id)->update(['current_amount' => (request()->recharge_ammount + $current_amount['current_amount'])]);
        return 200;
    }
    public function checkIfUserMade($hellocashid,$user=null,$token='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcmluY2lwYWwiOiIxODUzNDczIiwic3lzdGVtIjoibHVjeSIsImNoYWluIjpbInBhc3N3b3JkIl0sImlhdCI6MTUyOTU5NzI3OSwiZXhwIjoxNTI5NjgzNjc5fQ._Tolv9jVCAJODL0vKUfEagcobqZpnEiaPTkf6X7kFqw'){
        $client = new Client([
            'base_uri' => "https://api.hellocash.net",
             'headers' => [
                 'Accept' => 'application/json',
                 'Authorization' => 'Bearer ' . $token,
                 'Content-Type' => 'application/json'
                 ],
            'allow_redirects' => [
                    'max' => 100,
                     ]
        ]);
        $post = $client->request('GET', '/transfers/'.$hellocashid);
   
        if(json_decode($post->getBody(), true)['error']){
        
            return 501;
        }
        else{
            return json_decode($post->getBody(), true)['error'];
        }
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
    public function getCurrentBalance(Request $request){
    	$user= User::where("email",$request->email)->first();
    	$balance= Account::where("users_id",$user->id)->first();
    	return $balance->current_amount;
    }
    public function payUsingHelloCash($amount,$email,$token='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcmluY2lwYWwiOiIxODUzNDczIiwic3lzdGVtIjoibHVjeSIsImNoYWluIjpbInBhc3N3b3JkIl0sImlhdCI6MTUyOTU5NzI3OSwiZXhwIjoxNTI5NjgzNjc5fQ._Tolv9jVCAJODL0vKUfEagcobqZpnEiaPTkf6X7kFqw')
    {
        $user= User::where("email",$email)->first();
        $user_phone= $user->phone_number;
        $client = new Client([
            'base_uri' => "https://api.hellocash.net",
             'headers' => [
                 'Accept' => 'application/json',
                 'Authorization' => 'Bearer ' . $token,
                 'Content-Type' => 'application/json'
                 ],
            'allow_redirects' => [
                    'max' => 100,
                     ]
        ]);
        
//        $client = new Client();
        
        $post = $client->request('POST', '/transfers', [
        'json' => [
            "to"=>"+251".$user_phone,
            "amount"=>(float)$amount
            ]
        ]);
        authorizePay('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcmluY2lwYWwiOiIxODUzNDczIiwic3lzdGVtIjoibHVjeSIsImNoYWluIjpbInBhc3N3b3JkIl0sImlhdCI6MTUyOTU5NzI3OSwiZXhwIjoxNTI5NjgzNjc5fQ._Tolv9jVCAJODL0vKUfEagcobqZpnEiaPTkf6X7kFqw');
        return 200;
        
//    	$client = new \GuzzleHttp\Client();
//    	$curl_session = curl_init();
//    	curl_setopt($curl_session,CURLOPT_URL,"Http://localhost:8002/api/testsend2");
//    	$result = curl_exec($curl_session);
//    	return "done";
    }
    public function authorizePay($token){
        
        $client = new Client([
            'base_uri' => "https://api-et.hellocash.net",
             'headers' => [
                 'Accept' => 'application/json',
                 'Authorization' => 'Bearer ' . $token,
                 'Content-Type' => 'application/json'
                 ],
            'allow_redirects' => [
                    'max' => 100,
                     ]
        ]);
        $get = $client->request('GET', 'https://api.hellocash.net/transfers');
        $liststransfer= json_decode($get->getBody(), true);
        $i= $liststransfer->len(); 
        
        $post = $client->request('POST', '/transfers/authorize', [
        'json' => [
                [$liststransfer[$i-1]['id']]
            ]
        ]);
        
        return 200;
    }
}
