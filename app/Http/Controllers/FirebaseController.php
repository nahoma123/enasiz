<?php

namespace App\Http\Controllers;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
//use Kreait\Firebase\Database;

use Illuminate\Http\Request;
use function MongoDB\BSON\fromJSON;

class FirebaseController extends Controller
{
    public function index(){
//        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/enasiz-b0d2c-firebase-adminsdk-fmnaq-028d610da0.json');
        $serviceAccount = ('{
            "type": "service_account",
  "project_id": "enasiz-b0d2c",
  "private_key_id": "028d610da0453750ba8a6c1353dfd72b218b3046",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDPu3aXTxyeDZkS\nPZC3/W5GkHC38slOewlhDOzxErVtukRCx3fdRj0UDLvCSCTA6qU6FLhyNjgtkXat\nBZwOv4K2f7/lTvXAfLf5LNHYNDToAH6pc+TgvrwFvLPlJ9SigtQ7RhLVILpBKFLT\nkt3EcRf8bnbQP946d01E9NDo2NSXTDtIHvCGu+X+EyyGEH1u7wCEq/nRmTkcN5U4\nMgwQ2YXzd1azRE6PkcbPzjDIFcdP0bbXdm5wa+goPBwXbm2q9cQRIEXqbH+Z5KTX\nrp07WCU6G45+ofDyp6GxhlC03ndR9xYZ1fNVAxBC0cIYYrhADJsbgbnCzaUHZbiu\n1Zd7W8kPAgMBAAECggEABxaE6IsdAAbuavu/H+AIWWUH9jwqV+taeb1t/5hyqKtQ\nipzGv2iW9e5XS7ztcB2xhJFSF9I3dCqV9je48vHgPRI6fdGwu0rQy4eWzhM984/s\nwnhqCKx0EEK3kAFIv+t0irnh3kl5wXZlmRgrnqPN5zbtBpRfT0xkeQ6yFXfXN9BP\newuR1ph2Q3iI63lsnh+Uafb589bC0HA6kgSOTigYfU9LueRrl6quMvwz1TmGhzKd\nuYk3U8W+rN7E/4rzUoS5x/Go0nfwoe3RFpulclc4Kt7z3w23gyFALyMEMr6Vcr7f\n2Z5ZjOF2WRSJwHLdeGV230SqY0KX4AlMf1AEQSOUEQKBgQDyf4AAkRW3j7F+QD8D\nIf+hHMlnpI0g7nzsCN8q6GqsJXktbzuqIJyQaMjxCGs0JYVYmBvpIMt6RZTmVF3u\nnyX0SxEDKY23b7A1xz2JF7th5BNGN455K1S7ZcgzEjreXnbsFW3kekbp+g5Uz3X1\n5+QMzPhOlFpXamdgMZH/hpU9XwKBgQDbTGvuFwFYDY2dtcLQRVGJUe+rZvNUbi1o\nm6qJFAJmoL1q8AaQdytW6lK3d3a0b0uOe+vQR1tOse2wQn0FbpqZwc/ADtcjYjEw\nLywY5D8xRCjTGuBEmpHPOLwctWt/nO9G1EhAPvZRdUCmn2Icsps8WXco+z26t+8d\nogyYuHtiUQKBgCwndQolYLvsqRfg4NhUL3SJhk6d0qilZA+iSehJK2su45KXR1jh\n2UAeJEBnFQYIsu//uk1HkGUyGDucLwJM7h8+L9nQjiJRbtdL8PNuY8seOTg203VS\no3n/vWU3M4rbznGMMVdBwHnH8yYUJFljIM4H4EqGjrCOCkakn/3T5oanAoGBAMGH\nk8gt7TWz4EJJ4X7Dbc1tzcDJvfvIr7IdjkYirmu7du4knOZpBIpTiGP4vX1Gqrs3\niUfpcR7lzwk54/MjRLRkYd7wOdQ0F4yaVKQy6cGkkRKcKUbh0cO6IeiEAjZAXLl5\nJbns1pvUihWBmqgQxwZfPdWgwz1AjXjtRYiRZfHBAoGAalVeR07qNgP6o3F9Su69\nlvVXP8d/merBrbtWaU1VFteh30DHHIR3Mgb62Kq0Oz+1JcbtM67HUjgzjnnpzb0M\nlhQR0P8DoI7Z22LGR/apQOQNZUuYMNLlofziGv408sfyN3MgJhWN5ULHfsAwbPRT\n5HbVf9mGUe5sPjLNDgx/7Oo=\n-----END PRIVATE KEY-----\n",
  "client_email": "firebase-adminsdk-fmnaq@enasiz-b0d2c.iam.gserviceaccount.com",
  "client_id": "113952920315972068888",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://accounts.google.com/o/oauth2/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-fmnaq%40enasiz-b0d2c.iam.gserviceaccount.com"
}');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $db = $firebase->getDatabase();

            $db->getReference('users')->set([
                'id'=>1,
                'name'=>'yared',
                'email'=>'yared101yared@gmail.com',
                'online'=>1
            ]);
            echo '<h1>data has been inserted using php sdk with laravel 5.4</h1>';
    }
}
