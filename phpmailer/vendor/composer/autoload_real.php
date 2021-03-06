<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit378c01d2379f8c8c031b45cffbde1c70
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit378c01d2379f8c8c031b45cffbde1c70', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit378c01d2379f8c8c031b45cffbde1c70', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit378c01d2379f8c8c031b45cffbde1c70::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
