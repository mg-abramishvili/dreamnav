<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        return Config::find(1);
    }

    public function update()
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'logo' => 'required',
        ]);

        $config = Config::find($id);
        
        $config->name = $request->name;
        $config->title = $request->title;
        $config->logo = $request->logo;

        $config->save();
    }
}
