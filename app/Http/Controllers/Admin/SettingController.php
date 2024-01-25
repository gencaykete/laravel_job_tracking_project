<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function global()
    {
        return view('admin.setting.global');
    }

    public function order()
    {
        return view('admin.setting.order');
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token', '_method', 'avatar_remove') as $key => $item) {
            if ($request->hasFile($key)) {
                $item = $request->file($key)->store('settings');
            }

            if (is_array($item)) {
                $item = implode(',', $item);
            }

            $query = Setting::query()->whereName($key)->first();
            if ($query) {
                if ($query->value != $item) {
                    $query->name = $key;
                    $query->value = $item;
                    //$query->type = $isFile ? 'file' : 'text';
                    $query->save();
                }
            } else {
                $newQuery = new Setting();
                $newQuery->name = $key;
                $newQuery->value = $item;
                //$newQuery->type = $isFile ? 'file' : 'text';;
                $newQuery->save();
            }
        }

        if (\request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Ayarlar başarıyla kaydedildi.'
            ]);
        } else {
            return back()->with('status', "Ayarlar güncellendi.");
        }
    }
}
