<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Contest;
use App\Models\Course;
use App\Models\Mawhob;
use App\Models\Program;
use App\Models\Revenue;
use App\Models\Setting;
use App\Models\Teacher;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    use GeneralTrait;

    ////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = __('dashboard.admin_panel');
        return view('admin.dashboard', compact('title'));
    }
    ////////////////////////////////////////////////////////
    /// get Settings
    public function getSettings()
    {
        $title = __('settings.settings');
        return view('admin.settings', compact('title'));
    }
    ////////////////////////////////////////////////////////
    /// store Settings
    public function storeSettings(SettingRequest $request)
    {

        $settings = Setting::get();
        if ($settings->isEmpty()) {

            if ($request->hasFile('site_icon')) {
                $site_icon = $request->file('site_icon')->store('settings');
            }
            if ($request->hasFile('site_logo')) {
                $site_logo = $request->file('site_logo')->store('settings');
            }

            Setting::create([
                'site_name_ar' => $request->site_name_ar,
                'site_name_en' => $request->site_name_en,
                'site_email' => $request->site_email,
                'site_gmail' => $request->site_gmail,
                'site_facebook' => $request->site_facebook,
                'site_twitter' => $request->site_twitter,
                'site_youtube' => $request->site_youtube,
                'site_instagram' => $request->site_instagram,
                'site_phone' => $request->site_phone,
                'site_mobile' => $request->site_mobile,
                'site_lang_en' => $request->site_lang_en,
                'lang_front_button_status' => $request->lang_front_button_status,
                'site_description_ar' => $request->site_description_ar,
                'site_description_en' => $request->site_description_en,
                'site_keywords_ar' => $request->site_keywords_ar,
                'site_keywords_en' => $request->site_keywords_en,
                'site_icon' => $site_icon,
                'site_logo' => $site_logo,
            ]);
            return $this->returnSuccessMessage(__('general.add_success_message'));


            /////////////////////////////////////////////////////////////////////////////////////
            /// Update Settings
        } else {

            $settings = Setting::orderBy('id', 'desc')->first();
            //////////////////////////////////////////////////////
            /// check and upload icon and logo

            /// Icon
            if ($request->hasFile('site_icon')) {
                if (!empty($settings->site_icon)) {
                    Storage::delete($settings->site_icon);
                    $site_icon = $request->file('site_icon')->store('settings');
                } else {
                    $site_icon = $request->file('site_icon')->store('settings');
                }
            } else {
                $site_icon = $settings->site_icon;
            }

            /// logo
            if ($request->has('site_logo')) {
                if (!empty($settings->site_logo)) {
                    Storage::delete($settings->site_logo);
                    $site_logo = $request->file('site_logo')->store('settings');
                } else {
                    $site_logo = $request->file('site_logo')->store('settings');
                }
            } else {
                $site_logo = $settings->site_logo;
            }


            $settings->update([
                'site_name_ar' => $request->site_name_ar,
                'site_name_en' => $request->site_name_en,
                'site_email' => $request->site_email,
                'site_gmail' => $request->site_gmail,
                'site_facebook' => $request->site_facebook,
                'site_twitter' => $request->site_twitter,
                'site_youtube' => $request->site_youtube,
                'site_instagram' => $request->site_instagram,
                'site_phone' => $request->site_phone,
                'site_mobile' => $request->site_mobile,
                'site_lang_en' => $request->site_lang_en,
                'lang_front_button_status' => $request->lang_front_button_status,
                'site_description_ar' => $request->site_description_ar,
                'site_description_en' => $request->site_description_en,
                'site_keywords_ar' => $request->site_keywords_ar,
                'site_keywords_en' => $request->site_keywords_en,
                'site_icon' => $site_icon,
                'site_logo' => $site_logo,
            ]);

            return $this->returnSuccessMessage(__('general.update_success_message'));
        }


    }


    ////////////////////////////////////////////////////////
    ///  switchEnglishLang
    public function switchEnglishLang(Request $request)
    {
        $settings = Setting::orderBy('id', 'desc')->first();
        if ($request->switchStatus == 'false') {
            $settings->site_lang_en = null;
            $settings->save();
        } else {
            $settings->site_lang_en = 'on';
            $settings->save();
        }
        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }


    ////////////////////////////////////////////////////////
    ///  switchFrontend Language
    public function switchFrontendLang(Request $request)
    {
        $settings = Setting::orderBy('id', 'desc')->first();
        if ($request->switchFrontendLanguageStatus == 'false') {
            $settings->lang_front_button_status = null;
            $settings->save();
        } else {
            $settings->lang_front_button_status = 'on';
            $settings->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

    ////////////////////////////////////////////////////////
    /// not Found
    public function notFound()
    {
        $title = __('general.not_found');
        return view('admin.errors.not-found', compact('title'));
    }


}
