<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FixedTextsRequest;
use App\Models\fixedText;
use App\Traits\GeneralTrait;

class FixedTextsController extends Controller
{

    use GeneralTrait;

    // index
    public function index()
    {
        $title = trans('menu.fixed_texts');
        return view('admin.landing-page.fixed-texts', compact('title'));
    }

    // update
    public function update(FixedTextsRequest $request)
    {

        $fixedText = FixedText::get();

        if ($fixedText->isEmpty()) {
            FixedText::create([
                'project_details_ar' => $request->project_details_ar,
                'project_details_en' => $request->project_details_en,

            ]);
            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } else {

            $fixedTextUpdate = FixedText::orderBy('id', 'desc')->first();

            $fixedTextUpdate->update([
                'project_details_ar' => $request->project_details_ar,
                'project_details_en' => $request->project_details_en,
            ]);

            return $this->returnSuccessMessage(__('general.update_success_message'));
        }

    }

}
