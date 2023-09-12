<?php

namespace Core;

/**
 * Summary of App
 */
class App
{
    /**
     * Summary of container
     * @var 
     */
    protected static $container;

    /**
     * Summary of setContainer
     * @param mixed $container
     * @return void
     */
    public static function setContainer($container)
    {
        static::$container = $container;
    }

    /**
     * Summary of container
     * @return mixed
     */
    public static function container()
    {
        return static::$container;
    }

    /**
     * Summary of bind
     * @param mixed $key
     * @param mixed $resolver
     * @return void
     */
    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    /**
     * Summary of resolve
     * @param mixed $key
     * @return mixed
     */
    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }

}