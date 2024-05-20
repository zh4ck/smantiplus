<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\Administrator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort');
        $direction = $request->query('direction');
        if (!empty($search)) {
            $admin = Administrator::where('status', 'Aktif')->where('role_id', 1)
                ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('role', function ($roleQuery) use ($search) {
                            $roleQuery->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->get();
            $osis = Administrator::where('status', 'Aktif')->where('role_id', 2)
                ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('role', function ($roleQuery) use ($search) {
                            $roleQuery->where('name', 'like', '%' . $search . '%');
                        });
                    });
                })
                ->get();
                $nonActive = Administrator::where('status', 'Nonaktif')
                ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('role', function ($roleQuery) use ($search) {
                            $roleQuery->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->get();    
        } else {
            $admin = Administrator::where('status', 'Aktif')->where('role_id', 1)->get();
            $osis = Administrator::where('status', 'Aktif')->where('role_id', 2)->get();
            $nonActive = Administrator::where('status', 'Nonaktif')->get();
        }
        return view('admin.admin-grid', ['admin' => $admin, 'osis' => $osis, 'nonActive' => $nonActive, 'sort' => $sort, 'direction' => $direction])->with(['admin'=> $admin, 'osis'=> $osis, 'nonActive'=> $nonActive, 'search'=> $search,]);
    }
    public function list(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort');
        $direction = $request->query('direction');
        if (!empty($search)) {
            $admin = Administrator::where('status', 'Aktif')->where('role_id', 1)
                ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('role', function ($roleQuery) use ($search) {
                            $roleQuery->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->paginate(10)->onEachSide(1)->fragment('admin');
            $osis = Administrator::where('status', 'Aktif')->where('role_id', 2)
                ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('role', function ($roleQuery) use ($search) {
                            $roleQuery->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->paginate(10)->onEachSide(1)->fragment('osis');
            $nonActive = Administrator::where('status', 'Nonaktif')
                ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('role', function ($roleQuery) use ($search) {
                            $roleQuery->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->paginate(10)->onEachSide(1)->fragment('nonActive');    
        } elseif($request->has('pdf')) {
            $admin = Administrator::where('status', 'Aktif')->where('role_id', 1)->get();
            $osis = Administrator::where('status', 'Aktif')->where('role_id', 2)->get();
            $nonActive = Administrator::where('status', 'Nonaktif')->get();
        } else {
            $admin = Administrator::where('status', 'Aktif')->where('role_id', 1)->paginate(10)->onEachSide(1)->fragment('admin');
            $osis = Administrator::where('status', 'Aktif')->where('role_id', 2)->paginate(10)->onEachSide(1)->fragment('osis');
            $nonActive = Administrator::where('status', 'Nonaktif')->paginate(10)->onEachSide(1)->fragment('nonActive');
        }

        return view('admin.admin-list', ['admin' => $admin, 'osis' => $osis, 'nonActive' => $nonActive, 'sort' => $sort, 'direction' => $direction])->with(['admin'=> $admin, 'osis'=> $osis, 'nonActive'=> $nonActive, 'search'=> $search,]);
    }

    public function add()
    {
        return view('admin.admin-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:administrators',
            'email' => 'required|string|max:255|email|unique:administrators',
            'phone' => 'required|string|max:13',
            'password' => 'required|string|max:255|min:8', 
        ]);

        $username = Administrator::where('username', $request->username)->first();

        if ($username) {
            return redirect()->back()->with(['message' => 'Username sudah terdaftar']);
        }
        
        $email = Administrator::where('email', $request->email)->first();

        if ($email) {
            return redirect()->back()->with(['message' => 'Email sudah terdaftar']);
        }
        
        $request['password'] = Hash::make($request->password);
        $admin = Administrator::create($request->all());

        return redirect('/admin-list')->with(['messageSuccess' => 'Akun pengurus berhasil dibuat']);
    }

    public function editRole($slug, Request $request)
    {
        $admin = Administrator::where('slug', $slug)->first();
        $admin->update($request->all());
        return redirect()->back()->with(['messageSuccess' => 'Peran Berhasil Diubah']);
    }

    public function editStatus($slug, Request $request)
    {
        $admin = Administrator::where('slug', $slug)->first();
        if ($admin->status == 'Aktif') {
            $admin->status = 'Nonaktif';
            $admin->save();
            return redirect()->back()->with(['messageSuccess' => 'Akun Berhasil Dinonaktifkan']);
        } else {
            $admin->status = 'Aktif';
            $admin->save();
		    return redirect()->back()->with(['messageSuccess' => 'Akun Berhasil Diaktifkan']);
        }
    }

    public function destroy(Request $request, $slug)
    {
        $admin = Administrator::where('slug', $slug)->first();
        $comment = Comment::where('admin_id', $admin->id)->first();
        $info = Information::where('administrator_id', $admin->id)->first();
        
        if ($info || $comment) {
            return redirect()->back()->with(['message' => 'Gagal menghapus akun tersebut karena jika terdapat informasi, komentar atau yang lainnya yang berhubungan dengan akun tersebut tidak bisa menghapusnya, Anda bisa menonaktifkan akun tersebut jika akun tersebut bermasalah!']);
        }

        $imagePath = 'profile/'.$admin->profile;
        Storage::delete($imagePath);
        $admin->delete();
		return redirect()->back()->with(['messageSuccess' => 'Akun berhasil terhapus secara permanen']);
    }

    public function updateProfileAdmin($slug, Request $request)
    {
        $admin = Administrator::where('slug', Auth::guard('administrator')->user()->slug)->first();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:administrators,username,' . $admin->id,
            'email' => 'required|string|max:255|email|unique:administrators,email,' . $admin->id,
            'phone' => 'required|string|max:13',
        ]);

        if ($request->file('image')) {
            $imagePath = 'profile/'.$admin->profile;
            Storage::delete($imagePath);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = Auth::guard('administrator')->user()->slug.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('profile', $newName);
            $request['profile'] = $newName;
        }
        $admin->slug = null;
        $admin->update($request->all());
        
        return redirect('/profile-admin')->with(['messageSuccess' => 'Profile Berhasil Diperbarui']);
    }
}