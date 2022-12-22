<?php


class Hash
{
    public static function make($input)
    {
        return hash("sha512", $input);
    }
}
