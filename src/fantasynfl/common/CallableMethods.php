<?php

namespace Fantasy\NFL\FantasyNFL\Common;

use Fantasy\NFL\FantasyNFL\Data\Request;
use Symfony\Component\Debug\Exception\UndefinedMethodException;

class CallableMethods
{

    public function __call($name, $arguments)
    {
        return $this->callMethod($name, new Request($name, $arguments));
    }

    public function get(Request $request)
    {
        return $this->callMethod($request->method(), $request);
    }

    private function callMethod($name, $request)
    {
        if(method_exists($this, $name)) {
            return $this->$name($request);
        } else {
            throw new UndefinedMethodException(get_class($this)." ".$name."() method is not defined.", new \ErrorException());
        }
    }

}