<?php

namespace App\Http\Controllers;
use \GuzzleHttp\Client;
use Illuminate\Http\Request;

class pushNotification extends Controller
{
    //
    public function sendNotification($message=null,$title= "Example")
    {
    	$fcm_path= "https://fcm.googleapis.com/fcm/send";
    	$server_key= "AAAASMCofDQ:APA91bE2pKH7pYxad0E4VYMCzr10u4dB20eKBC_3pipimKHi5NLaihNv8J82zlEkbjT8pZQ0du1bKk5WofR4Ozc_6ytPbwjlI2EXOFySbTg7IH86pBtYvuvhnhnIcwQWsGdojMAPftPx";
    	$key="#something called the result";

    	$headers = array('to' =>$key,'Authorization:key='.$server_key,
    					 'Content-Type:application/json',"project_id"=>"enasiz-b0d2c"
    );
    	$fields= array('notification' =>array('title'=>$title, 'body'=>$message));
    
    	$payload = json_encode($fields);
    	$curl_session = curl_init();
    	curl_setopt($curl_session, CURLOPT_URL, $fcm_path);
    	curl_setopt($curl_session, CURLOPT_POST, true);
    	curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    	curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload); 
    	$result = curl_exec($curl_session);

    }
    public function test(){
    	$this->sendNotification("sending api","sending api");
    	dd("SENT");
    }

    public function test1()
    {
        $client = new Client([
            'base_uri' => "https://api.hellocash.net",
             'headers' => [
                 'Accept' => 'application/json',
                 'Authorization' => 'Bearer ' . 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcmluY2lwYWwiOiIxODUzNDczIiwic3lzdGVtIjoibHVjeSIsImNoYWluIjpbInBhc3N3b3JkIl0sImlhdCI6MTUyOTU5NzI3OSwiZXhwIjoxNTI5NjgzNjc5fQ._Tolv9jVCAJODL0vKUfEagcobqZpnEiaPTkf6X7kFqw',
                 'Content-Type' => 'application/json'
                 ],
            'allow_redirects' => [
                    'max' => 100,
                     ]
        ]);
//        $client = new Client();
    
$post = $client->request('POST', '/transfers', [
        'json' => [
            "to"=>"+251911841881",
            "amount"=>25
            ]
        ]);
        return 200;
        
//    	$client = new \GuzzleHttp\Client();
//    	$curl_session = curl_init();
//    	curl_setopt($curl_session,CURLOPT_URL,"Http://localhost:8002/api/testsend2");
//    	$result = curl_exec($curl_session);
//    	return "done";
    }
    public function junk(){

    	return 405;
    }

}
