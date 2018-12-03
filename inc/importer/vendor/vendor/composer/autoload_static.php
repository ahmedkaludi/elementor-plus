<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite67535fe8bb9e847195ca18c8c330d4g
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'ProteusThemes\\WPContentImporter2\\' => 33,
        ),
        'L' => 
        array (
            'LUIMPORT\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ProteusThemes\\WPContentImporter2\\' => 
        array (
            0 => __DIR__ . '/..' . '/proteusthemes/wp-content-importer-v2/src',
        ),
        'LUIMPORT\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite67535fe8bb9e847195ca18c8c330d4g::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite67535fe8bb9e847195ca18c8c330d4g::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
