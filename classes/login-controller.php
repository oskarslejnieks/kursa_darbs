<?php 

class LoginController extends Login{

    private $uid; //private because other classes dont need to access them
    private $pwd;

    public function __construct($_uid, $_pwd) { // constructor lets assign user input in signup form to theese properties
        $this->uid = $_uid;
        $this->pwd = $_pwd;
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            header("location: ../login_form.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }

    //Error handler empty input
    public function emptyInput() { 
        $result = false;
        if(empty($this->uid) || empty($this->pwd)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}