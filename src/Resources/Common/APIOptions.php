<?php

namespace Fantasy\NFL\Resources\Common;

abstract class APIOptions
{

    const RESEARCHSORT = ["percentOwned","percentOwnedDelta","percentStarted","percentStartedDelta","numAdds","numDrops"];
    const REGULARPOSITIONS = ["QB","RB","WR","TE","K","DEF","WR-RB-TE"];
    const ALLPOSITIONS = ["QB","RB","WR","TE","K","DEF","DL","LB","DB"];
    const NFLTEAMS = ["ARI","ATL","BAL","BUF","CAR","CHI","CIN","CLE","DAL","DEN","DET","GB","TEN","HOU","IND","JAX","KC","STL","OAK","MIA","MIN","NE","NO","NYG","NYJ","PHI","PIT","SD","SF","SEA","TB","WAS"];
    const SCORINGSORT = ['pts','projectedPts'];
    const STATTYPES = ["seasonStats","weekStats","seasonProjectedStats","weekProjectedStats","twoWeekStats","fourWeekStats"];
    const ADVANCEDSORT = ["fanPtsAgainstOpponentRank","carries","touches","receptions","targets","receptionPercentage","redzoneTargets","redzoneTouches","redzoneG2g"];
    const YESNO = [1,0];

}