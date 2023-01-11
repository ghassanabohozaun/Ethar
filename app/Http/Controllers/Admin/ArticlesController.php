<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
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
        $articles = Article::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.articles.index', compact('title', 'articles'));
    }

    /////////////////////////////////////////
    /// get trashed articles index
    public function trashedArticles()
    {
        $title = trans('menu.trashed_articles');
        $trashedArticles = Article::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.articles.trashed-articles', compact('title', 'trashedArticles'));
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
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/articles');
            $photo_path = $this->saveResizeImage($image, $destinationPath);

        } else {
            $photo_path = '';
        }

        if (setting()->site_lang_en == 'on') {
            Article::create([
                'photo' => $photo_path,
                'language' => 'ar_en',
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
    public function update(ArticleRequest $request)
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
        try {
            if ($request->ajax()) {
                $article = Article::find($request->id);
                if (!$article) {
                    return redirect()->route('admin.not.found');
                }
                $article->delete();
                return $this->returnSuccessMessage(trans('general.move_to_trash'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch
    }

    /////////////////////////////////////////
    ///  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $article = Article::onlyTrashed()->find($request->id);
                if (!$article) {
                    return redirect()->route('admin.not.found');
                }
                $article->restore();
                return $this->returnSuccessMessage(trans('general.restore_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch
    }

    /////////////////////////////////////////
    ///  force delete
    public function forceDelete(Request $request)
    {
        try {
            if ($request->ajax()) {

                $article = Article::onlyTrashed()->find($request->id);

                if (!$article) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($article->photo)) {
                    $image_path = public_path("\adminBoard\uploadedImages\articles\\") . $article->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $article->forceDelete();

                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch

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
