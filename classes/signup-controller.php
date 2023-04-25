<?php //changing something in database

class SignupController extends Signup{

    private $uid; //private because other classes dont need to access them
    private $pwd;
    private $pwdrepeat;
    private $email;

    public function __construct($_uid, $_pwd, $_pwdrepeat, $_email) { // constructor lets assign user input in signup form to theese properties
        $this->uid = $_uid;
        $this->pwd = $_pwd;
        $this->pwdrepeat = $_pwdrepeat;
        $this->email = $_email;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../signup_form.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false) {
            header("location: ../signup_form.php?error=invalidusername");
            exit();
        }    
        if($this->invalidEmail() == false) {
            header("location: ../signup_form.php?error=invalidemail");
            exit();
        }   
        if($this->pwdMatch() == false) {
            header("location: ../signup_form.php?error=pwddoesntmatch");
            exit();
        }  
        if($this->uidTakenCheck() == false) {
            header("location: ../signup_form.php?error=usenametaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email); //if there were no errors, call the function setUser that signs up the user
    }

    //Error handler empty input
    public function emptyInput() { 
        $result = false;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid() {
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    private function invalidEmail() {
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) { //build in php function. PHP way to validate email
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }


    //Password
    private function pwdMatch() {
        $result = false;
        if($this->pwd !== $this->pwdrepeat) { //build in php function
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    

    private function uidTakenCheck() {
        $result = false;
        if(!$this->checkUser($this->uid, $this->email)) { 
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}