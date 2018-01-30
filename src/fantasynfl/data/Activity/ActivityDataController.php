<?php

namespace Fantasy\NFL\FantasyNFL\Data\Activity;

use Fantasy\NFL\FantasyNFL\Data\Controller;
use Fantasy\NFL\FantasyNFL\Data\Activity\Commands\GetActivityCommand;
use Fantasy\NFL\FantasyNFL\Data\Request;
use Illuminate\Support\Collection;

class ActivityDataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public static function getActivity(Request $request)
    {
        $cmd = new GetActivityCommand($request);
        return $cmd->exec();
    }

}