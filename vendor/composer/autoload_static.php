<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfcd326c88d022b6ba45ba57de59ec2fc
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Routes\\' => 7,
            'Renderer\\' => 9,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'K' => 
        array (
            'Kone3\\GestionEtudiant\\' => 22,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Routes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Routes',
        ),
        'Renderer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Renderer',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
        'Kone3\\GestionEtudiant\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Database',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Controllers',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfcd326c88d022b6ba45ba57de59ec2fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfcd326c88d022b6ba45ba57de59ec2fc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfcd326c88d022b6ba45ba57de59ec2fc::$classMap;

        }, null, ClassLoader::class);
    }
}
