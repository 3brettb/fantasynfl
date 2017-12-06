<?php

namespace Fantasy\NFL\Enums;

abstract class TradeStatus extends Enum
{

    const PROPOSED = 1;
    const REJECTED = 2;
    const ACCEPTED = 3;
    const APPROVED = 4;
    const VETOED = 5;
    const PROCESSED = 6;

}