<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $info = Information::where('status', 'Penting')->orderBy('updated_at', 'desc')->get();
        $type = Type::all();
        return view('niskala.home', ['info' => $info, 'type' => $type]);
    }
}