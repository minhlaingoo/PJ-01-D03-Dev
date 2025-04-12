<?php

use App\Models\Setting;

function setting($category)
{

    $settings = Setting::where('category', $category)->first();
    return json_decode($settings->value);
}

function saveSetting($category, $value)
{
    $settings = Setting::where('category', $category)->first();
    $settings->value = json_encode($value);
    $settings->save();
}
