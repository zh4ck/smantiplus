<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Category;
use App\Models\Information;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $infoCount = Information::count();
        $infoArchivedCount = Information::where('status', 'Diarsipkan')->count();
        $typeCount = Type::count();
        $categoryCount = Category::count();
        $studentCount = User::whereIn('status', ['Aktif','Aktif-RequestPeran'])->where('role_id', 4)->count();
        $writerCount = User::where('status', 'Aktif')->where('role_id', 3)->count();
        $requestRoleCount = User::where('status', 'Aktif-RequestPeran')->count();
        $adminCount = Administrator::where('status', 'Aktif')->count();
        return view('Admin.dashboard', ['infoCount' => $infoCount, 'typeCount' => $typeCount, 'categoryCount' => $categoryCount, 'studentCount' => $studentCount, 'writerCount' => $writerCount, 'requestRoleCount' => $requestRoleCount, 'adminCount' => $adminCount, 'infoArchivedCount' => $infoArchivedCount]);
    }
}