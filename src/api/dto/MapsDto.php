<?php

namespace Fantasy\NFL\API\DTO;

use Fantasy\NFL\Resources\UsesMapMethods;

abstract class MapsDto
{

    use UsesMapMethods;

    abstract static function dtomap($data);

}