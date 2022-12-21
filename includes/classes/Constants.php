<?php

class Constants
{
    public static $firstNameError = "Your first name must bew between 2 and 25 characters";
    public static $lastNameError = "Your last name must bew between 2 and 25 characters";
    public static $userNameError = "User name must bew between 2 and 25 characters";
    public static $userNameTaken = "User name already taken";
    public static $emailDontMatch = "Email you entered doesn't match";
    public static $emailInvalid = "Invalid Email Address";
    public static $passwordMismatched = "Password Mismatched";
    public static $passwordLengthError = "Password length should be greater tha 2 words";

    public static function emailAlreadyExists()
    {
        return "Email Already Exists";
    }
    public static function validate($error)
    {
        return $error;
    }
}
