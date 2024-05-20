<?php

namespace App\Http\Controllers;

use App\Models\Info_Category;
use App\Models\Information;
use PDF;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\RentLogs;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Exports\ExportExcelUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort');
        $direction = $request->query('direction');
        if (!empty($search)) {
            $students = User::whereIn('status', ['Aktif', 'Aktif-RequestPeran'])
                ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('class', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            })
            ->get();
            $writers = User::where('status', 'Nonaktif')
                ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('class', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            })
            ->get();    
            $nonActive = User::where('status', 'Nonaktif')
                ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('class', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            })
            ->get();    
        } else {
            $students = User::whereIn('status', ['Aktif', 'Aktif-RequestPeran'])->where('role_id', 4)->get();
            $writers = User::whereIn('status', ['Aktif', 'Aktif-RequestPeran'])->where('role_id', 3)->get();
            $nonActive = User::where('status', 'Nonaktif')->get();
        }
        return view('admin.users-grid', ['students' => $students, 'writers' => $writers, 'nonActive' => $nonActive, 'sort' => $sort, 'direction' => $direction])->with(['students' => $students, 'writers' => $writers, 'nonActive'=> $nonActive, 'search'=> $search,]);
    }
    public function list(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort');
        $direction = $request->query('direction');
        if (!empty($search)) {
            $students = User::whereIn('status', ['Aktif', 'Aktif-RequestPeran'])->where('role_id', 4)
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('class', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10)->onEachSide(1)->fragment('students');
            
            $writers = User::whereIn('status', ['Aktif', 'Aktif-RequestPeran'])->where('role_id', 4)
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('class', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10)->onEachSide(1)->fragment('writers');

            $nonActive = User::where('status', 'Nonaktif')->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('class', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10)->onEachSide(1)->fragment('nonActive');    
        } else {
            $students = User::whereIn('status', ['Aktif', 'Aktif-RequestPeran'])->where('role_id', 4)->paginate(10)->onEachSide(1)->fragment('students');
            $writers = User::whereIn('status', ['Aktif', 'Aktif-RequestPeran'])->where('role_id', 3)->paginate(10)->onEachSide(1)->fragment('writers');
            $nonActive = User::where('status', 'Nonaktif')->paginate(10)->onEachSide(1)->fragment('nonActive');
        }

        return view('admin.users-list', ['students' => $students, 'writers' => $writers, 'nonActive' => $nonActive, 'sort' => $sort, 'direction' => $direction])->with(['students'=> $students, 'writers' => $writers, 'nonActive'=> $nonActive, 'search'=> $search,]);
    }

    public function detail($slug)
    {
        $student = User::where('slug', $slug)->first();
        $admin = Administrator::where('slug', $slug)->first();
        return view('admin.user-detail', ['student'=> $student, 'admin'=> $admin]);
    }

    public function editRole($slug, Request $request)
    {
        $user = User::where('slug', $slug)->first();
        $user->update($request->all());
        return redirect()->back()->with(['messageSuccess' => 'Peran Berhasil Diubah']);
    }

    public function editStatus($slug, Request $request)
    {
        $user = User::where('slug', $slug)->first();
        if ($user->status == 'Aktif') {
            $user->status = 'Nonaktif';
            $user->save();
            return redirect()->back()->with(['messageSuccess' => 'Status Pengguna Berhasil Dinonaktifkan']);
        } else {
            $user->status = 'Aktif';
            $user->save();
		    return redirect()->back()->with(['messageSuccess' => 'Status Pengguna Berhasil Diaktifkan']);
        }
    }

    public function destroy(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $comment = Comment::where('user_id', $user->id)->first();
        $collection = Collection::where('user_id', $user->id)->first();
        $info = Information::where('writer_id', $user->id)->first();
        
        if ($info || $comment || $collection) {
            return redirect()->back()->with(['message' => 'Gagal menghapus akun tersebut karena jika terdapat informasi, komentar atau yang lainnya yang berhubungan dengan akun tersebut tidak bisa menghapusnya, Anda bisa menonaktifkan akun tersebut jika akun tersebut bermasalah!']);
        }

        $imagePath = 'profile/'.$user->profile;
        Storage::delete($imagePath);

        $user->delete();
		return redirect()->back()->with(['messageSuccess' => 'Akun berhasil terhapus secara permanen']);
    }

    public function profile(Request $request)
    {
        $search = $request->query('search');
        $categories = Category::all();
        return view('student.profile', ['categories' => $categories, 'search' => $search]);
    }

    public function deleteProfilePict($slug, Request $request)
    {
        $user = User::where('slug', Auth::user()->slug)->first();
        $imagePath = 'profile/'.$user->profile;
        Storage::delete($imagePath);
        $user->profile = '';
        $user->save();
        
        return redirect()->back()->with(['messageSuccess' => 'Foto Profile Berhasil Diperbarui']);
    }

    public function editProfile($slug, Request $request)
    {
        $user = User::where('slug', Auth::user()->slug)->first();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username'   => 'required|string|unique:users,email,' . $user->id,
            'email' => 'required|string|max:255|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:13',
            'class'   => 'required|string|'
        ]);

        if ($request->file('image')) {
            $imagePath = 'profile/'.$user->profile;
            Storage::delete($imagePath);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = Auth::guard('student')->user()->slug.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('profile', $newName);
            $request['profile'] = $newName;
        }
        $user->slug = null;
        $user->update($request->all());
        
        return redirect('/profile')->with(['messageSuccess' => 'Profile Berhasil Diperbarui']);
    }

    public function changePassword(Request $request) 
    {
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
        ]);

        $user = Auth::guard('student')->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with(['message' => 'Password Lama Tidak Sesuai']);
        }
        if ($request->new_password != $request->repeat_password) {
            return redirect()->back()->with(['message' => 'Konfirmasi Password Tidak Sesuai']);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with(['messageSuccess' => 'Password Berhasil Diperbarui']);
    }

    public function requestRoleList() {
        $userRequest = User::where('status', 'Aktif-RequestPeran')->get();
        return view('Admin.requestRole', ['userRequest'=> $userRequest]);
    }

    public function approveRequest($slug) {
        $user = User::where('slug', $slug)->first();
        $user->status = 'Aktif';
        $user->role_id = 3;
        $user->save();
        return redirect()->back()->with(['messageSuccess' => 'Berhasil merubah peran menjadi Penulis']);
    }
}