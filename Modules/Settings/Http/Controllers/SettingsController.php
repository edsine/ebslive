<?php

// Modules\Settings\Http\Controllers\SettingsController.php
namespace Modules\Settings\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\AppBaseController;



class SettingsController extends AppBaseController
{
    public function index()
    {
   

        // Return the settings view.
        return view('settings::index');
    }


    public function edit()
    {
        // Get the settings from the database.
        $settings = Setting::all();

        // Return the settings view.
        return view('settings', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        // Validate the request.
        $request->validate([
            'name' => 'required|string',
            'value' => 'required|string',
            'created_by' => 'required|string',
            // 'status' => 'required|boolean',
        ]);

        // Save the settings to the database.
        foreach ($request->all() as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        // Return a success message.
        return redirect()->route('settings.edit')->with('success', 'Settings updated successfully.');
    }
}
