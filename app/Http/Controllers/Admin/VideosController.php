<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideosRequest;
use App\Http\Resources\VideosResource;
use App\Models\Slider;
use App\Models\Video;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = trans('menu.videos');
        $videos = Video::orderByDesc('created_at')->paginate();
        return view('admin.videos.index', compact('title', 'videos'));
    }

    // create
    public function create()
    {
        $title = trans('menu.add_new_video');
        return view('admin.videos.create', compact('title'));
    }

    // store
    public function store(VideosRequest $request)
    {

        if ($request->has('link')) {
            if (preg_match('@^(?:https://(?:www\\.)?youtube.com/)(watch\\?v=|v/)([a-zA-Z0-9_]*)@', $request->link, $match)) {
                $VideoLink = $this->getVideoLink($request->link);
            } else {
                return $this->returnError(trans('videos.url_invalid'), '500');
            }
        }


        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('\adminBoard\uploadedImages\videos\\');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
        } else {
            $photo_path = '';
        }


        $lang_en = setting()->site_lang_en;
        Video::create([
            'photo' => $photo_path,
            'language' => $lang_en == 'on' ? 'ar_en' : 'ar',
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'link' => $VideoLink,
            'duration' => $request->duration,
            'added_date' => $request->added_date,
        ]);


        return $this->returnSuccessMessage(trans('general.add_success_message'));


    }

    ////////////////////////////////////////////
    /// user define get Video Link function
    protected function getVideoLink($link)
    {
        //// Get YouTube Video Key
        if (strlen($link) > 11) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                $link, $match)) {
                return $match[1];
            } else
                return '0';
        }
    }

    ////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        $title = trans('videos.video_update');
        $video = Video::find($id);
        if (!$video) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.medias.videos.update', compact('title', 'video'));
    }


    ////////////////////////////////////////////
    /// update
    public function update(VideosRequest $request)
    {

        try {

            $video = Video::find($request->id);
            if (!$video) {
                return redirect()->route('admin.not.found');
            }

            if ($request->has('link')) {

                if (preg_match('@^(?:https://(?:www\\.)?youtube.com/)(watch\\?v=|v/)([a-zA-Z0-9_]*)@', $request->link, $match)) {
                    $VideoLink = $this->getVideoLink($request->link);
                } else {
                    return $this->returnError(trans('videos.url_invalid'), '500');
                }
            }

            if ($request->hasFile('photo')) {
                if (!empty($video->photo)) {
                    Storage::delete($video->photo);
                    $photo_path = $request->file('photo')->store('videos_photos');
                } else {
                    $photo_path = $request->file('photo')->store('videos_photos');
                }
            } else {
                if (!empty($video->photo)) {
                    $photo_path = $video->photo;
                } else {
                    $photo_path = '';
                }
            }


            if ($request->language == 'ar') {
                $video->update([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                    'link' => $VideoLink,
                    'photo' => $photo_path,
                    'duration' => $request->duration,
                    'added_date' => $request->added_date,
                ]);
            } elseif ($request->language == 'en') {
                $video->update([
                    'language' => $request->language,
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                    'link' => $VideoLink,
                    'photo' => $photo_path,
                    'duration' => $request->duration,
                    'added_date' => $request->added_date,
                ]);
            } elseif ($request->language == 'ar_en') {
                $video->update([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'link' => $VideoLink,
                    'photo' => $photo_path,
                    'duration' => $request->duration,
                    'added_date' => $request->added_date,
                ]);
            }
            return $this->returnSuccessMessage(trans('general.update_success_message'));

        } catch (\Exception $exception) {

            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }


    }


    ////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {

        try {
            if ($request->ajax()) {
                $video = Video::find($request->id);
                if (!$video) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($video->photo)) {
                    Storage::delete($video->photo);
                }

                $video->delete();
                return $this->returnSuccessMessage(trans('general.delete_success_message'));

            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }

    }


    ////////////////////////////////////////////
    /// view video
    public
    function viewVideo(Request $request)
    {
        if ($request->ajax()) {
            $video = Video::find($request->id);
            return response()->json(['data' => $video]);
        }
    }


    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {
        $video = Video::find($request->id);

        if ($video->status == '1') {
            $video->status = '0';
            $video->save();
        } else {
            $video->status = '1';
            $video->save();
        }
        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }

}
