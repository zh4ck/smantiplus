<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $savedInfo = Collection::where('user_id', Auth::guard('student')->user()->id)->get();
        $createdInfo = Information::where('writer_id', Auth::guard('student')->user()->id)->get();
        $search = $request->query('search');
        return view('niskala.profile', ['savedInfo' => $savedInfo, 'search' => $search, 'createdInfo' => $createdInfo]);
    }
    public function created(Request $request) {
        $createdInfo = Information::where('writer_id', Auth::guard('student')->user()->id)->get();
        $search = $request->query('search');
        return view('niskala.info.created', ['createdInfo' => $createdInfo, 'search' => $search]);
    }
    public function archived(Request $request) {
        $archivedInfo = Information::where('writer_id', Auth::guard('student')->user()->id)->where('status', 'Diarsipkan')->get();
        $search = $request->query('search');
        return view('niskala.info.archived', ['archivedInfo' => $archivedInfo, 'search' => $search]);
    }

    public function requestRole() {
        $user = User::where('id', Auth::guard('student')->user()->id)->first();
        $user->status = 'Aktif-RequestPeran';
        $user->save();
        return redirect()->back()->with(['messageSuccess' => 'Permintaan terkirim, harap tunggu persetujuan admin atau OSIS!']);
    }
    
    public function edit() {
        return view('niskala.edit-profile');
    }
    public function profileAdmin() {
        return view('Admin.profile');
    }

    public function editProfileAdmin() {
        return view('Admin.edit-profile-admin');
    }
}