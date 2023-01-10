<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
<<<<<<< HEAD
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Resources\ArticleResource;
=======
>>>>>>> 99e51f96b462d0a00558e5c41155f8b03137b1e8
use App\Http\Resources\NewResource;
use App\Models\Article;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    use GeneralTrait;

    ///////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.articles');
        return view('admin.articles.index', compact('title'));
    }
    ///////////////////////////////////////////////
    /// index
    public function getArticles(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Article::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = ArticleResource::collection($list);
        $recordsTotal = Article::get()->count();
        $recordsFiltered = Article::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }

    ///////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = trans('menu.add_new_article');
        return view('admin.articles.create', compact('title'));
    }

    /////////////////////////////////////////////////
    /// store
    public function store(ArticleRequest $request)
    {
        if ($request->hasFile('photo')) {
<<<<<<< HEAD
            $photo_path = $request->file('photo')->store('ArticlesPhotos');
=======
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/articles');
            $photo_path = $this->saveResizeImage($image, $destinationPath);

>>>>>>> 99e51f96b462d0a00558e5c41155f8b03137b1e8
        } else {
            $photo_path = '';
        }


        if (setting()->site_lang_en == 'on') {
            Article::create([
                'photo' => $photo_path,
                'language' => 'ar_en',
                'slug_ar' => slug($request->title_ar),
                'slug_en' => slug($request->title_en),
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'abstract_ar' => $request->abstract_ar,
                'abstract_en' => $request->abstract_en,
                'publish_date' => $request->publish_date,
                'publisher_name' => $request->publisher_name,
            ]);
        } else {
            Article::create([
                'photo' => $photo_path,
                'language' => 'ar',
                'slug_ar' => slug($request->title_ar),
                'slug_en' => null,
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'abstract_ar' => $request->abstract_ar,
                'abstract_en' => null,
                'publish_date' => $request->publish_date,
                'publisher_name' => $request->publisher_name,
            ]);
        }
        return $this->returnSuccessMessage(trans('general.add_success_message'));

    }

    /////////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $title = trans('articles.update_article');
        $article = Article::find($id);

        if (!$article) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.articles.update', compact('title', 'article'));

    }


    /////////////////////////////////////////////////
    /// update
    public function update(ArticleUpdateRequest $request)
    {


        $article = Article::find($request->id);

        if (!$article) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            if (!empty($article->photo)) {
                $image_path = public_path("\adminBoard\uploadedImages\articles\\") . $article->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\articles\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath);

            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\articles\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath);
            }
        } else {
            if (!empty($article->photo)) {
                $photo_path = $article->photo;

            } else {
                $photo_path = '';
            }
        }


        if (setting()->site_lang_en == 'on') {
            $article->update([
                'photo' => $photo_path,
                'language' => 'ar_en',
                'slug_ar' => slug($request->title_ar),
                'slug_en' => slug($request->title_en),
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'abstract_ar' => $request->abstract_ar,
                'abstract_en' => $request->abstract_en,
                'publish_date' => $request->publish_date,
                'publisher_name' => $request->publisher_name,
            ]);
        } else {
            $article->update([
                'photo' => $photo_path,
                'language' => 'ar',
                'slug_ar' => slug($request->title_ar),
                'slug_en' => null,
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'abstract_ar' => $request->abstract_ar,
                'abstract_en' => null,
                'publish_date' => $request->publish_date,
                'publisher_name' => $request->publisher_name,
            ]);
        }
        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }

    ///////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $article = Article::find($request->id);

            if (!$article) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($article->photo)) {
                Storage::delete($article->photo);
            }
            $article->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }
    }

    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {
        $article = Article::find($request->id);

        if ($request->switchStatus == 'false') {
            $article->status = null;
            $article->save();
        } else {
            $article->status = 'on';
            $article->save();
        }

        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }

}
