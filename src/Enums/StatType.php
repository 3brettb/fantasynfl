<?php

namespace Fantasy\NFL\Enums;

abstract class StatType extends Enum
{

    const Season = "seasonStats";
    const Week = "weekStats";
    const SeasonProjected = "seasonProjectedStats";
    const WeekProjected = "weekProjectedStats";
    const TwoWeek = "twoWeekStats";
    const FourWeek = "fourWeekStats";

    // Aliases
    const SeasonStats = self::Season;
    const WeekStats = self::Week;
    const SeasonProjectedStats = self::SeasonProjected;
    const WeekProjectedStats = self::WeekProjected;
    const TwoWeekStats = self::TwoWeek;
    const FourWeekStats = self::FourWeek;

}