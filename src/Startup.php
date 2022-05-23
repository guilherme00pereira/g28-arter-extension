<?php

namespace G28\ArterExtension;

use G28\ArterExtension\Widgets\G28_HeroBanner;

class Startup {

	protected static ?Startup $_instance = null;

	public static function getInstance(): ?Startup {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function run( string $root ) {
		add_action( 'plugins_loaded', function () use ( $root ) {
			Plugin::getInstance($root);
			new Controller();
		} );
        add_action( 'elementor/widgets/widgets_registered', array( $this, 'initWidgets' ) );

	}

    public function initWidgets(  ) {
		\Elementor\Plugin::instance()->widgets_manager->register( new G28_HeroBanner() );
	}
	
}