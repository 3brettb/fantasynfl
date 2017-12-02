<?php

namespace Fantasy\NFL\Resources;

class Cast
{

    static function cast(&$obj, $class)
    {
        if(class_exists($class))
        {
            $class_in = get_class($obj);
            $obj_in = serialize($obj);
            $obj_out = "O:" . strlen($class) . ':"' . $class . '":' . substr($obj_in, strlen($class_in) + 8);
            $obj = unserialize($obj_out);
            return $obj;
        }
        else return false;
    }

}