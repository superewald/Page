<?php
namespace Backup\Util;

class ClassFinder
{
    public static function getClassesInNamespace($namespace)
    {
        $files = scandir(self::getNamespaceDirectory($namespace));

        $classes = array_map(function($file) use ($namespace){
            return $namespace . '\\' . str_replace('.php', '', $file);
        }, $files);

        return array_filter($classes, function($possibleClass){
            return class_exists($possibleClass);
        });
    }

    private static function getDefinedNamespaces()
    {
        $composerJsonPath = base_path() . 'composer.json';
        $composerConfig = json_decode(file_get_contents($composerJsonPath));

        //Apparently PHP doesn't like hyphens, so we use variable variables instead.
        $psr4 = "psr-4";
        return (array) $composerConfig->autoload->$psr4;
    }

    private static function getNamespaceDirectory($namespace)
    {
        $composerNamespaces = self::getDefinedNamespaces();

        $namespaceFragments = explode('\\', $namespace);
        $undefinedNamespaceFragments = [];

        while($namespaceFragments) {
            $possibleNamespace = implode('\\', $namespaceFragments) . '\\';

            if(array_key_exists($possibleNamespace, $composerNamespaces)){
                return realpath(base_path() . $composerNamespaces[$possibleNamespace] . implode('/', $undefinedNamespaceFragments));
            }

            $undefinedNamespaceFragments[] = array_pop($namespaceFragments);
        }

        return false;
    }
}