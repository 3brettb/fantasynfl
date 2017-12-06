<?php

namespace Fantasy\NFL\Enums;

abstract class TradeStatusStrings extends Enum
{

    const PROPOSED = "PROPOSED";
    const REJECTED = "REJECTED";
    const ACCEPTED = "ACCEPTED";
    const APPROVED = "APPROVED";
    const VETOED = "VETOED";
    const PROCESSED = "PROCESSED";
    const UNDEFINED = "undefined";

}