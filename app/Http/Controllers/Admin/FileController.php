<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class FileController extends Controller
{
    public function store(Request $request)
    {
        if (request()->file('scheme_image')) {
            $file = request()->file('scheme_image');
            $filename = time().'.'.$file->extension();

            if (!file_exists(public_path() . '/uploads/schemes')) {
                mkdir(public_path() . '/uploads/schemes', 0755, true);
            }

            $img = Image::make($file->path());
            $img->resize(3840, 2160, function ($const) {
                $const->aspectRatio();
            })->save(public_path() . '/uploads/schemes/' . $filename);

            return \Response::make('/uploads/schemes/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);
        }

        if (request()->file('banner_image')) {
            $file = request()->file('banner_image');
            $filename = time().'.'.$file->extension();

            if (!file_exists(public_path() . '/uploads/banners')) {
                mkdir(public_path() . '/uploads/banners', 0755, true);
            }

            $img = Image::make($file->path());
            $img->resize(2000, 2000, function ($const) {
                $const->aspectRatio();
            })->save(public_path() . '/uploads/banners/' . $filename);

            return \Response::make('/uploads/banners/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);
        }

        if (request()->file('banner_video')) {
            $file = request()->file('banner_video');
            $filename = time().'.'.$file->extension();

            if (!file_exists(public_path() . '/uploads/banners')) {
                mkdir(public_path() . '/uploads/banners', 0755, true);
            }

            $file->move(public_path() . '/uploads/banners', $filename);

            return \Response::make('/uploads/banners/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);
        }
    }
}
