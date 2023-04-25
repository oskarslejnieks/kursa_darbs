<?php 

class Login extends Dbh{

    public function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('select users_pwd from users where users_uid = ? or users_email = ?;');
       

        if(!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../login_form.php?error=stmtfailed");
            exit();
        }

        elseif($stmt->rowCount() == 0) { //if we dont have results from query, return user back 
            $stmt = null;  
            header("location: ../login_form.php?error=usernotfound");
            exit();
        }

        $pwdHash = $stmt->fetchAll(PDO::FETCH_ASSOC); //statement variable points to php built-in method fetchAll, Fetches array. PDO::FETCH_ASSOC is an associative array
        $checkPwd = password_verify($pwd, $pwdHash[0]["users_pwd"]); // password_verify is built-in method in PHP that in this case takes 2 parameters - user input password and password from database which is hashed password. Returns true or false

        if($checkPwd == false) { // if passwords from user input and database don't match, it locates user to home page and shows error message in url
            $stmt = null;
            header("location: ../login_form.php?error=wrongpassword");
            exit();
        }
        elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('select * from users where users_uid = ? or users_email = ? and users_pwd = ?;'); //checks everything from users table and user can log in using either email or username

            if(!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("location: ../login_form.php?error=stmtfailed");
                exit();
            }
            elseif($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../login_form.php?error=rowcount");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC); //returns all info from database

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"]; // all datas 1st index from column users_id 
            $_SESSION["useruid"] = $user[0]["users_uid"];

            $stmt = null;
        }

        $stmt = null;
    }
    

}