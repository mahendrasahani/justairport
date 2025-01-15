<?php
namespace App\Services;
use Kreait\Firebase\Factory;
class FirebaseService{
    private $database;
    public function __construct(){
        $firebase = (new Factory)
            ->withServiceAccount(storage_path('justairports-be7c8-firebase-adminsdk-bkani-0e1c677e6f.json'))
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));
        $this->database = $firebase->createDatabase();
    }
    public function getDatabase(){
        return $this->database;
    }
}
