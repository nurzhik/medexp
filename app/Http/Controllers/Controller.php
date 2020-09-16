<?php

namespace App\Http\Controllers;

use App\Traits\ActivityHelper;
use App\Traits\MapHelper;
use App\Traits\Uploader;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,Uploader,MapHelper,ActivityHelper;
}
