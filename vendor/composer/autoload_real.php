<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitaf54c8fbd3237700b85d62bc7ee62391
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

        spl_autoload_register(array('ComposerAutoloaderInitaf54c8fbd3237700b85d62bc7ee62391', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitaf54c8fbd3237700b85d62bc7ee62391', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitaf54c8fbd3237700b85d62bc7ee62391::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
