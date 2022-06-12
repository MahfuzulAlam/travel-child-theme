<?php

class TP_Enqueques
{
    public function __construct()
    {
        // ENQUEUE FILES
        $this->enqueue_styles();
    }

    public function enqueue_styles()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_main_style'));
    }

    public function enqueue_main_style()
    {
        wp_enqueue_style('main-style', TPBD_URI . '/assets/css/main.css', array(), TPBD_VESION);
    }
}
new TP_Enqueques;
