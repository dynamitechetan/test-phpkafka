<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite2e6c3b08901731255f19891bd510b32
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'YourNamespace\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'YourNamespace\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite2e6c3b08901731255f19891bd510b32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite2e6c3b08901731255f19891bd510b32::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite2e6c3b08901731255f19891bd510b32::$classMap;

        }, null, ClassLoader::class);
    }
}
