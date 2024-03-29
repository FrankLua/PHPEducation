<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitec8efd47c5cf15b94e7a95703206bfff
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

        spl_autoload_register(array('ComposerAutoloaderInitec8efd47c5cf15b94e7a95703206bfff', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitec8efd47c5cf15b94e7a95703206bfff', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitec8efd47c5cf15b94e7a95703206bfff::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
