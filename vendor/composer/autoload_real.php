<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc7306b174a2ab1dd640480357fdb9909
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitc7306b174a2ab1dd640480357fdb9909', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc7306b174a2ab1dd640480357fdb9909', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInitc7306b174a2ab1dd640480357fdb9909::getInitializer($loader)();

        $loader->register(true);

        return $loader;
    }
}