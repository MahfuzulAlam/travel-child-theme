<?php

class TP_Filters
{
    public function __construct()
    {
        // ADD FILTERS
        // Enable Key Fields - Directorist Fields
        add_filter('directorist_custom_field_meta_key_field_args', array($this, 'tpbd_custom_field_meta_key_field_args'));
        add_filter('atbdp_before_processing_submitted_listing_frontend_filter', array($this, 'atbdp_before_processing_submitted_listing_frontend_filter'));
    }

    public function tpbd_custom_field_meta_key_field_args($args)
    {
        $args['type'] = 'text';
        return $args;
    }

    public function atbdp_before_processing_submitted_listing_frontend_filter($info)
    {
        $features = array(
            'business_facilities',
            'safety_security',
            'general_features',
            'transportation',
            'fitness_wellness',
            'food_drink',
            'media_technology',
            'outdoors_activities',
            'parking_feature',
            'services_extras',
            'payment_methods',
            'pet_policy',
        );
        foreach ($features as $feature) {
            if (isset($info[$feature]) && !empty($info[$feature])) $info[$feature] = array_unique($info[$feature]);
        }
        //file_put_contents(dirname(__FILE__) . '/info.json', json_encode($info));
        return $info;
    }
};
new TP_Filters;
