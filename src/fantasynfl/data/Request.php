<?php

namespace Fantasy\NFL\FantasyNFL\Data;

class Request
{

    private $method;

    private $names;

    private $values;

    private $arguments;

    public function __construct($method, $values)
    {
        $this->method = $method;

        if(self::isAssocArray($values)){
            $this->names = array_keys($values);
            $this->values = array_values($values);
            $this->arguments = $values;
        } else {
            $this->values = $values;
        }
    }

    public function __set($name, $value)
    {
        $this->arguments[$name] = $value;
    }

    public function __get($name)
    {
        if($this->__isset($name))
        {
            return $this->arguments[$name];
        }
        return null;
    }

    public function __isset($name)
    {
        if(array_key_exists($name, $this->arguments))
        {
            if($this->arguments[$name] != null)
            {
                return true;
            }
        }
        return false;
    }

    public function __unset($name)
    {
        if($this->__isset($name))
        {
            $index = array_search($name, array_keys($this->arguments));
            array_splice($this->arguments, $index, 1);
        }
    }

    public function arguments(array $names)
    {
        $this->names = $names;
        for($i=0; $i < sizeof($names); $i++)
        {
            if(isset($this->values[$i])) {
                $this->arguments[$this->names[$i]] = $this->values[$i];
            } else {
                $this->arguments[$this->names[$i]] = null;
            }
        }
        return $this;
    }

    public function issetOr($name, $alt)
    {
        if($this->__isset($name) && $this->__get($name) != null)
        {
            return $this->__get($name);
        }
        return $alt;
    }

    public function method()
    {
        return $this->method;
    }

    private static function isAssocArray(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

}