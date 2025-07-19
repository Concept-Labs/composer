<?php
namespace Concept\Composer;

use Composer\Autoload\ClassLoader;
use ReflectionClass;

class Composer
{
    /**
     * The vendor directory
     *
     * @var string|null
     */
    protected static ?string $vendorDir = null;
    
    /**
     * Get vendor directory
     * 
     * @return string|null
     */
    public static function getVendorDir(): ?string
    {
        return static::$vendorDir ??= 
            class_exists(ClassLoader::class) 
                ? dirname(dirname((new ReflectionClass(ClassLoader::class))->getFileName())) // assume Composer still has same structure
                : throw new \RuntimeException('Composer is not loaded');
    }
}
