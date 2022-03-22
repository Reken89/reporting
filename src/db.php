<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DB {
    
    const USER = "tublat";
    const PASS = "12345";
    const HOST = "localhost";
    const DB = "start";
    
    
    public static function connToDB(){
            
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;


            $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
            return $conn;
    }
}