<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\ApiController;
use App\Models\Area;

class AreaCareerController extends ApiController
{
    public function __construct()
    {

        $this->middleware('client.credentials')->only(['index']);
        $this->middleware('auth:api')->except(['index']);

    }
    public function index(Area $area)
    {
        $carrers = $area->careers;
        return $this->showAll($carrers);
    }
}
