<?php

namespace G28\ArterExtension;

class Controller {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts_and_styles' ] );
	}

    public function register_scripts_and_styles() {
		wp_enqueue_style( Plugin::getAssetsPrefix() . '_g28arterstyle', Plugin::getAssetsUrl() . 'css/g28-arter-style.css' );
		
	}
}