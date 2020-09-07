<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit62c704c704be2c79756957a044ed0967
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'System\\' => 7,
        ),
        'I' => 
        array (
            'Imob\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'System\\' => 
        array (
            0 => __DIR__ . '/..' . '/System',
        ),
        'Imob\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'System\\Request' => __DIR__ . '/..' . '/System/Request.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit62c704c704be2c79756957a044ed0967::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit62c704c704be2c79756957a044ed0967::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit62c704c704be2c79756957a044ed0967::$classMap;

        }, null, ClassLoader::class);
    }
}
