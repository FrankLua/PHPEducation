<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb61a6cec8d11ee2bd092e83cc605cd30
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Project\\' => 8,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Project\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Back',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb61a6cec8d11ee2bd092e83cc605cd30::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb61a6cec8d11ee2bd092e83cc605cd30::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb61a6cec8d11ee2bd092e83cc605cd30::$classMap;

        }, null, ClassLoader::class);
    }
}
