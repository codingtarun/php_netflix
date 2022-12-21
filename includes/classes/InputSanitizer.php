<?php
class InputSanitizer
{
    public static function sanitizeInput($input) // static function don't need to initialize to call it
    {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        $input = strtolower($input);
        $input = ucfirst($input);
        return $input;
    }
    public static function sanitizeUsername($input) // static function don't need to initialize to call it
    {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        return $input;
    }
    public static function sanitizePassword($input) // static function don't need to initialize to call it
    {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        return $input;
    }
    public static function sanitizeEmail($input) // static function don't need to initialize to call it
    {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        return $input;
    }
}
