<?php

namespace App\Http\Controllers\Site;

use App\File;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Traits\GeneralTrait;

class MediaController extends Controller
{
    use GeneralTrait;


    // photos Albums
    public function photosAlbums()
    {
//        $title = __('index.founders');
//
//        $founders = Team::orderByDesc('id')->where('status', 'on')->where('type', 'founder')->get();
//        return view('site.founders', compact('title', 'founders'));
    }

    // videos
    public function videos()
    {
        $title = __('index.our_videos');

        $videos = Video::orderByDesc('id')->where('status', 'on')->paginate(10);
        return view('site.videos', compact('title', 'videos'));
    }


}
