<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
class SettingsController extends Controller
{
     public function index()
    {
        $settingsObjects = Settings::first();

             return response()->json($settingsObjects);
    }

}
