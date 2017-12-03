<?php

namespace Fantasy\NFL\StatsAPI\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchInfo extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_stats_research_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'percentOwned', 'percentOwnedChange', 'percentStarted', 'percentStartedChange', 'depthChartOrder', 'numAdds', 'numDrops', 'averagePoints', 'seasonPoints', 'positionRank'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        //
    }

    // relations here

}