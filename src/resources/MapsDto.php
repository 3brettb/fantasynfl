<?php

namespace Fantasy\NFL\Resources;

abstract class MapsDto
{

    use UsesMapMethods;

    abstract static function dtomap($data);

}