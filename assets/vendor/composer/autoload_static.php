<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b5b306d49f74b229708bcb78c0c3efc
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dcblogdev\\PdoWrapper\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dcblogdev\\PdoWrapper\\' => 
        array (
            0 => __DIR__ . '/..' . '/dcblogdev/pdo-wrapper/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0b5b306d49f74b229708bcb78c0c3efc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0b5b306d49f74b229708bcb78c0c3efc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
