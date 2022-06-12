<?php

class TP_Filters
{
    public function __construct()
    {
        // ADD FILTERS
        // Enable Key Fields - Directorist Fields
        add_filter('directorist_custom_field_meta_key_field_args', array($this, 'tpbd_custom_field_meta_key_field_args'));
    }

    public function tpbd_custom_field_meta_key_field_args($args)
    {
        $args['type'] = 'text';
        return $args;
    }
}

new TP_Filters;
