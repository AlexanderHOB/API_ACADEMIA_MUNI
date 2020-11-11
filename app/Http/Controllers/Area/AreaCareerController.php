<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\ApiController;
use App\Models\Area;

class AreaCareerController extends ApiController
{
    public function index(Area $area)
    {
        $carrers = $area->careers;
        return $this->showAll($carrers);
    }
}
