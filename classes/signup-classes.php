<?php 

class Signup extends Dbh{  //all the database related stuff

    public function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('insert into users(users_uid, users_pwd, users_email) values (?, ?, ?);'); //Prepares a statement for execution and returns a statement object

        //Hash password

        $hashPwd = password_hash($pwd,PASSWORD_DEFAULT); //built-in PHP method password_hash. We want to hash the password and hashing method. Its default method for password_hash

        if(!$stmt->execute(array($uid, $hashPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();  
        }

        $stmt = null;
    }

    public function checkUser($uid, $email) {
        //Prepared statement method connect from controller and prepare is php built-in function 
        //Question marks stands for placeholers that later on will be assigned to query. Its for protection, seperating the data from the query
        $stmt = $this->connect()->prepare('select users_uid from users where users_uid = ? or users_email = ?;');

        if(!$stmt->execute(array($uid, $email))) { //if actual statement fails then we need to know about it
            $stmt = null; //delete stmt
            header("location: ../index.php?error=stmtfailed"); // sends the user back to index page
            exit();
        }

        $result_check = false;

        if($stmt->rowCount() > 0) { //finds if the username and email already exists in database, if it does, we do not signup user.
            $result_check = false;
        }
        else {
            $result_check = true;
        }
        return $result_check;
    }
    

}