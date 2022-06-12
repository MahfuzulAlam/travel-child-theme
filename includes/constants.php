<?php

class TP_Constants
{
    public function __construct()
    {
        // Declare Constants
        define('TPBD_DIR', get_stylesheet_directory());
        define('TPBD_URI', get_stylesheet_directory_uri());
        define('TPBD_VESION', '1.0.0');
    }
}
new TP_Constants;
