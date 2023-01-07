<?php


//  setting Helper Function
if (!function_exists('setting')) {
    function setting()
    {
        return App\Models\Setting::orderBy('id', 'desc')->first();
    }
}

//  get active languages Helper Function
if (!function_exists('getActiveLanguages')) {
    function Lang()
    {
        return LaravelLocalization::getCurrentLocale();
    }
}

//  get admin Helper Function
if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}

function reverseDate($date)
{
    $array = explode("-", $date);
    $rev = array_reverse($array);
    $date = implode("-", $rev);
    return $date;
}


function slug($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^\w\s\-]+/u', '', $string);
}


function returnSpaceBetweenString($string)
{
    return $string = str_replace('-', ' ', $string); // Replaces all spaces with hyphens.
}


