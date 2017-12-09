<?php

namespace Fantasy\NFL\Resources;

class Session
{

    static $prefix = "fantasy_session_";

    /**
     * @param $key
     * @param null $default
     * @return string
     */
    public static function get($key, $default = null)
    {
        return session()->get(static::$prefix.$key, $default);
    }

    /**
     * @param $key
     * @param $value
     * @return string
     */
    public static function set($key, $value)
    {
        return session()->put(static::$prefix.$key, $value);
    }

}