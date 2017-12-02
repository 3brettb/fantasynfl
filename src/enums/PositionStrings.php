<?php

namespace Fantasy\NFL\Enums;

abstract class PositionStrings extends Enum
{

    const QB = "QB";
    const RB = "RB";
    const WR = "WR";
    const TE = "TE";
    const K = "K";
    const DEF = "DEF";
    const DL = "DL";
    const LB = "LB";
    const DB = "DB";

    // PPR
    const RBPPR = "RB-ppr";
    const WRPPR = "WR-ppr";
    const TEPPR = "TE-ppr";

}