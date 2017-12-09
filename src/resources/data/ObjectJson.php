<?php

namespace Fantasy\NFL\Resources\Data;

abstract class ObjectJson
{

    static abstract function mapJson(string $json);

}