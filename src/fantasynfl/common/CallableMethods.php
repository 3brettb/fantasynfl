<?php

namespace Fantasy\NFL\FantasyNFL\Common;

use Fantasy\NFL\FantasyNFL\Data\Request;

class CallableMethods
{

    public function __call($name, $arguments)
    {
        return $this->$name(new Request($name, $arguments));
    }

    public function get(Request $request)
    {
        $name = $request->method();
        return $this->$name($request);
    }

}