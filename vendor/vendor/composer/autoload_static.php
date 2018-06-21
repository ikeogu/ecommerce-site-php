<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit922870f6ca72cdb78b58290360373667
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Yabacon\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Yabacon\\' => 
        array (
            0 => __DIR__ . '/..' . '/yabacon/paystack-php/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit922870f6ca72cdb78b58290360373667::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit922870f6ca72cdb78b58290360373667::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}