<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return Page::orderBy('order', 'asc')->get();
    }

    public function page($id)
    {
        return Page::query()
            ->with(['blocks' => function ($query) {
                $query->orderBy('order', 'asc');
            }])
            ->find($id);
    }
}
