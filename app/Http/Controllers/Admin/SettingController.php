<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

use Validator;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index', [
            'setting' => Setting::first()
        ]);
    }

    public function update(Request $request, Setting $setting)
    {
        $data = $request->all();
        $fillables = $setting->getFillable();

        foreach ($fillables as $name) {
            if (isset($data[$name])) {
                $setting->$name = is_array($setting->$name) 
                    ? array_merge($setting->$name, $data[$name])
                    : $data[$name];
            }
        }

        $setting->save();

        return $request->ajax()
            ? ['success' => true]
            : redirect()->route('admin.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        Setting::destroy($setting->id);
        return ['success' => true];
    }
}
