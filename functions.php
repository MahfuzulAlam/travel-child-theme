<?php

class OneListing_Travel
{
	public function __construct()
	{
		add_action('after_setup_theme', array($this, 'onelisting_child_theme_setup'));
		require_once(get_stylesheet_directory() . '/includes/constants.php');
		$this->includes();
	}

	public function onelisting_child_theme_setup()
	{
		load_child_theme_textdomain('onelisting', get_stylesheet_directory() . '/languages');
	}

	public function includes()
	{
		add_action('wp_enqueue_scripts', array($this, 'onelisting_child_styles'), 18);

		require_once(TPBD_DIR . '/includes/filters.php');
		require_once(TPBD_DIR . '/includes/actions.php');
	}

	public function onelisting_child_styles()
	{
		wp_enqueue_style('onelisting-child-style', get_stylesheet_uri());
	}
}
new OneListing_Travel;
