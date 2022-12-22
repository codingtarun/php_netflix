<?php

class SessionHelper
{
    public static function logout()
    {
        if (isset($_SESSION['userLoggedIn'])) {
            unset($_SESSION['userLoggedIn']);
            session_destroy();
        }
    }
}
