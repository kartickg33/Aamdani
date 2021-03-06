<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit61f708a31ab6b61002a7002e6f78a4eb
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit61f708a31ab6b61002a7002e6f78a4eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit61f708a31ab6b61002a7002e6f78a4eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit61f708a31ab6b61002a7002e6f78a4eb::$classMap;

        }, null, ClassLoader::class);
    }
}
