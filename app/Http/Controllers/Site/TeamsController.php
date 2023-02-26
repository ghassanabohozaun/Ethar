<?php

namespace App\Http\Controllers\Site;

use App\File;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Traits\GeneralTrait;

class TeamsController extends Controller
{
    use GeneralTrait;


    ///index
    public function founders()
    {
        $title = __('index.founders');
        //founders
        $founders = Team::orderByDesc('id')->where('status', 'on')->where('type', 'founder')->get();
        return view('site.founders', compact('title', 'founders'));
    }


}
