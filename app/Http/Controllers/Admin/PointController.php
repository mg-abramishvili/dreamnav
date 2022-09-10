<?php

namespace App\Http\Controllers\Admin;

use App\Models\Point;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        return Point::all();
    }
}