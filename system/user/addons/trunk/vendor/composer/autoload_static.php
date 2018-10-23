<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7f8228e44179accfe525486cfee2d7c6
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Urodoz\\Truncate\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Urodoz\\Truncate\\' => 
        array (
            0 => __DIR__ . '/..' . '/urodoz/truncate-html/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7f8228e44179accfe525486cfee2d7c6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7f8228e44179accfe525486cfee2d7c6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
