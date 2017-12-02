<?php

namespace Fantasy\NFL\Enums;

abstract class ResearchInfo extends Enum
{

    const PercentOwned = "percentOwned";
    const PercentOwnedDelta = "percentOwnedDelta";
    const PercentStarted = "percentStarted";
    const PercentStartedDelta = "percentStartedDelta";
    const NumberAdds = "numAdds";
    const NumberDrops = "numDrops";

    // Aliases
    const PercentOwnedChanged = self::PercentOwnedDelta;
    const PercentStartedChanged = self::PercentStartedDelta;
    const NumAdds = self::NumberAdds;
    const NumDrops = self::NumberDrops;

}