<?php

namespace G28\ArterExtension;

class Plugin {

	protected static $_instance = null;

	/**
	 * @var string
	 */
	private static $url;
	/**
	 * @var string
	 */
	private static $dir;
	/**
	 * @var string
	 */
	private static $plugin_base;
	/**
	 * @var string
	 */
	private static $slug;
	/**
	 * @var string
	 */
	private static $text_domain;
	/**
	 * @var string
	 */
	private static $assets_prefix;
	/**
	 * @var string
	 */
	private static $assets_url;
	/**
	 * @var array
	 */
	private static $plugin_data;


	public function __construct( $root )
	{
		self::$url                  = plugin_dir_url( $root );
		self::$dir                  = plugin_dir_path( $root );
		self::$plugin_base          = plugin_basename( $root );
		self::$slug                 = trim( dirname( self::$plugin_base ), '/' );
		self::$assets_url           = self::$url . 'assets/';
		self::$text_domain          = self::$slug;
		self::$assets_prefix        = 'pontosul_';
		self::$plugin_data          = get_plugin_data($root);
	}

	public static function getInstance( $root ): ?Plugin {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $root );
		}
		return self::$_instance;
	}

	/**
	 * @return string
	 */
	public static function getUrl(): string {
		return self::$url;
	}

	/**
	 * @return string
	 */
	public static function getDir(): string {
		return self::$dir;
	}

	/**
	 * @return string
	 */
	public static function getPluginBase(): string {
		return self::$plugin_base;
	}

	/**
	 * @return string
	 */
	public static function getSlug(): string {
		return self::$slug;
	}

	/**
	 * @return string
	 */
	public static function getTextDomain(): string {
		return self::$text_domain;
	}

	/**
	 * @return string
	 */
	public static function getAssetsPrefix(): string {
		return self::$assets_prefix;
	}

	/**
	 * @return string
	 */
	public static function getAssetsUrl(): string {
		return self::$assets_url;
	}

	/**
	 * @return string
	 */
	public static function getName(): string {
		return self::$plugin_data['Name'];
	}

	/**
	 * @return string
	 */
	public static function getVersion(): string
	{
		return self::$plugin_data['Version'];
	}
}