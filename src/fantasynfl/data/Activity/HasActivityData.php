<?php

namespace Fantasy\NFL\FantasyNFL\Data\Activity;

use Fantasy\NFL\FantasyNFL\Data\Request;

trait HasActivityData
{

    // ------ Accessors ------------------------------------------------------------------------------------------------

    protected function getActivity(Request $request)
    {
        return ActivityDataController::getActivity($request->arguments(['league_id']));
    }

    // ------ Aliases --------------------------------------------------------------------------------------------------

    protected function activity(Request $request)
    {
        return $this->getActivity($request);
    }

}