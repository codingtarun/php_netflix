<?php
class Account
{
    private $con;
    private $errorArray = array();
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function register($fn, $ln, $un, $em, $cem, $ps, $cps)
    {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
        $this->validateEmail($em, $cem);
        $this->validatePassword($ps, $cps);

        if (empty($this->errorArray)) {
            return $this->store($fn, $ln, $un, $em, $ps);
        }

        return false;
    }

    private function store($fn, $ln, $un, $em, $ps)
    {
        $ps = Hash::make($ps);
        $query = $this->con->prepare("INSERT INTO users (firstName, lastName, username, email, password ) VALUES (:fn, :ln, :un, :em, :ps)");

        $query->bindValue(":fn", $fn);
        $query->bindValue(":ln", $ln);
        $query->bindValue(":un", $un);
        $query->bindValue(":em", $em);
        $query->bindValue(":ps", $ps);

        return $query->execute();
    }
    private function validateFirstName($input)
    {
        if (strlen($input) < 2 || strlen($input) > 25) {
            array_push($this->errorArray, Constants::$firstNameError);
        }
    }
    private function validateLastName($input)
    {
        if (strlen($input) < 2 || strlen($input) > 25) {
            array_push($this->errorArray, Constants::$lastNameError);
        }
    }
    private function validateUsername($input)
    {
        if (strlen($input) < 2 || strlen($input) > 25) {
            array_push($this->errorArray, Constants::$lastNameError);
            return; // don't execute if condition is not fullfilled
        }
        $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
        $query->bindValue(":un", $input);
        $query->execute();
        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$userNameTaken);
        }
    }
    private function validateEmail($em, $cem)
    {

        if ($em != $cem) {
            array_push($this->errorArray, Constants::$emailDontMatch);
            return;
        }
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }
        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
        $query->bindValue(":em", $em);
        $query->execute();
        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::emailAlreadyExists());
        }
    }
    private function validatePassword($ps, $cps)
    {
        if ($ps != $cps) {
            array_push($this->errorArray, Constants::$passwordMismatched);
            return;
        }
        if (strlen($ps) < 2 || strlen($cps) < 2) {
            array_push($this->errorArray, Constants::$passwordLengthError);
            return;
        }
    }
    public function getError($error)
    {
        if (in_array($error, $this->errorArray)) {
            return $error;
        }
    }
}
