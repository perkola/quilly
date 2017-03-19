<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4b2cf7c04c5bf92e742d784fa8228bb4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Perkola\\Quilly\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Perkola\\Quilly\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4b2cf7c04c5bf92e742d784fa8228bb4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4b2cf7c04c5bf92e742d784fa8228bb4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
