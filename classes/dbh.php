<?php

class Dbh {
    protected function connect() {
        try {
            $username = 'root';
            $password = '';
            $conn = new PDO('mysql:host=localhost; dbname=agrotech', $username, $password); //PDO is a driver that enable access to database
            return $conn;
        }
        catch(PDOException $e) { 
            print "Error!: ". $e->getMessage() . "<br/>"; //error message
            die(); //kill the connection
        }
    }
}