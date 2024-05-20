<?php

namespace App\Http\Controllers;

use view;
use App\Models\Type;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\Info_Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SmantiPlusController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $info = Information::when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('title', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('categories', function ($categoryQuery) use ($search) {
                            $categoryQuery->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('type', function ($typeQuery) use ($search) {
                            $typeQuery->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('writer', function ($writerQuery) use ($search) {
                            $writerQuery->where('name', 'like', '%' . $search . '%')
                                        ->orWhere('username', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('writerAdmin', function ($writerAdminQuery) use ($search) {
                            $writerAdminQuery->where('name', 'like', '%' . $search . '%')
                                        ->orWhere('username', 'like', '%' . $search . '%');
                        });
                });
            })->whereIn('status', ['Penting', 'Biasa'])
            ->orderBy('status', 'desc') // Urutkan berdasarkan status (Penting terlebih dahulu)
            ->orderBy('updated_at', 'desc') // Kemudian urutkan berdasarkan updated_at terbaru
            ->get();        
        } else {
            $info = Information::whereIn('status', ['Penting', 'Biasa'])
            ->orderBy('status', 'desc') // Urutkan berdasarkan status (Penting terlebih dahulu)
            ->orderBy('updated_at', 'desc') // Kemudian urutkan berdasarkan updated_at terbaru
            ->get();
        }

        foreach ($info as $item) {
            if (Auth::guard('student')->user()) {
                $collection[$item->id] = Collection::where('info_id', $item->id)->where('user_id', Auth::guard('student')->user()->id)->first();
                $isSavedInfo[$item->id] = ($collection[$item->id] !== null);
            }
        }
        if (Auth::guard('student')->user()) {
            return view('niskala.info.smantiPlus', ['info' => $info, 'search' => $search, 'isSavedInfo' => $isSavedInfo]);
        }

        return view('niskala.info.smantiPlus', ['info' => $info, 'search' => $search]);
    }

    public function detail($slug) {
        $info = Information::where('slug', $slug)->first();
        $categories = Category::all();
        $type = Type::all();
        $comment = Comment::where('info_id', $info->id)->get();
        
        if (Auth::guard('student')->user()) {
            $collection[$info->id] = Collection::where('info_id', $info->id)->where('user_id', Auth::guard('student')->user()->id)->first();
            $isSavedInfo[$info->id] = ($collection[$info->id] !== null);
            return view('niskala.info.detail-info', ['info' => $info, 'categories' => $categories, 'type' => $type, 'comment' => $comment, 'isSavedInfo'=> $isSavedInfo]);
        }
        return view('niskala.info.detail-info', ['info' => $info, 'categories' => $categories, 'type' => $type, 'comment' => $comment, ]);
    }

    public function add() {
        $categories = Category::all();
        $type = Type::all();
        return view('niskala.info.add-info', ['categories' => $categories, 'type' => $type]);
    }

    public function store(Request $request)
    {
        if ($request->type_id == 1234567890) {
            Session::flash('message', 'Pilih Jenis Informasi');
            Session::flash('old_input', $request->input());
            return redirect()->back()->withInput();
        }
    
        if ($request->status == 'Pilih Status Informasi') {
            Session::flash('message', 'Pilih Status Informasi');
            Session::flash('old_input', $request->input());
            return redirect()->back()->withInput();
        }
        
        $newName = '';
        if ($request->hasFile('image')) {
            $fileSize = $request->file('image')->getSize(); // Mendapatkan ukuran file dalam bytes
            $maxFileSize = 20 * 1024 * 1024; // 20MB dalam bytes

            if ($fileSize > $maxFileSize) {
                Session::flash('message', 'Ukuran file tidak boleh melebihi 20MB');
                Session::flash('old_input', $request->input());
                return redirect()->back()->withInput();
            }

            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->slug.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('imgInfo', $newName);
        }
        $request['imgInfo'] = $newName;
        
        $request['writer_id'] = Auth::guard('student')->user()->id;
        $info = Information::create($request->all());
        $info->categories()->sync($request->categories);
        
        return redirect('/profile/created')->with(['messageSuccess' => 'Informasi Berhasil Ditambahkan']);
    }

    public function edit($slug) {
        $info = Information::where('slug', $slug)->first();
        $categories = Category::all();
        $type = Type::all();
        return view('niskala.info.edit-info', ['categories' => $categories, 'type' => $type, 'info' => $info]);
    }
    
    public function update(Request $request, $slug)
    {
        $info = Information::where('slug', $slug)->first();

        if ($request->hasFile('image')) {
            $fileSize = $request->file('image')->getSize(); // Mendapatkan ukuran file dalam bytes
            $maxFileSize = 20 * 1024 * 1024; // 20MB dalam bytes

            if ($fileSize > $maxFileSize) {
                Session::flash('message', 'Ukuran file tidak boleh melebihi 20MB');
                Session::flash('old_input', $request->input());
                return redirect()->back()->withInput();
            }

            $imgInfo = 'imgInfo/'.$info->imgInfo;
            Storage::delete($imgInfo);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->slug.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('imgInfo', $newName);
            $request['imgInfo'] = $newName;
        }
        $info->slug = null;
        $info->update($request->all());
        if ($request->categories) {
            $info->categories()->sync($request->categories);
        }
        return redirect('/edit-info/'.$info->slug)->with(['messageSuccess' => 'Informasi Berhasil Diperbarui']);
    }

    public function comment(Request $request) {
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->admin_id = $request->admin_id;
        $comment->info_id = $request->info_id;
        $comment->comment = $request->comment;
        $comment->save();
        
        return redirect()->back();
    }
    public function replyComment(Request $request) {
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->admin_id = $request->admin_id;
        $comment->info_id = $request->info_id;
        $comment->parent_id = $request->parent_id;
        $comment->replyFrom = $request->replyFrom;
        $comment->comment = $request->comment;
        $comment->save();
        
        return redirect()->back();
    }
    
    public function deleteComment(Request $request, $id) {
        $comment = Comment::where('id', $id)->first();
    
        // Periksa apakah ada relasi komentar
        $relatedComments = Comment::where('parent_id', $comment->id)->orWhere('replyFrom', $comment->id)->exists();
    
        if ($relatedComments) {
            // Jika ada relasi, hapus isi komentar saja
            $comment->comment = null;
            $comment->save();
        } else {
            // Jika tidak ada relasi, hapus komentar sepenuhnya
            $comment->delete();
        }
    
        return redirect()->back();
    }

    public function explore(Request $request) {
        $type = Type::all();
        $category = Category::all();
        $search = $request->query('search');
        return view('niskala.info.explore', ['type' => $type, 'category'=> $category, 'search' => $search]);
    }
    
    public function searchByType(Request $request, $slug) {
        $type = Type::where('slug', $slug)->first();
        $search = $request->query('search');
        if (!empty($search)) {
            $info = Information::where('type_id', $type->id)
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('title', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('categories', function ($categoryQuery) use ($search) {
                            $categoryQuery->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('writer', function ($writerQuery) use ($search) {
                            $writerQuery->where('name', 'like', '%' . $search . '%')
                                        ->orWhere('username', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('writerAdmin', function ($writerAdminQuery) use ($search) {
                            $writerAdminQuery->where('name', 'like', '%' . $search . '%')
                                             ->orWhere('username', 'like', '%' . $search . '%');
                        });
                });
            })->whereIn('status', ['Penting', 'Biasa'])
            ->orderBy('status', 'desc') // Urutkan berdasarkan status (Penting terlebih dahulu)
            ->orderBy('updated_at', 'desc') // Kemudian urutkan berdasarkan updated_at terbaru
            ->get();        
        } else {
            $info = Information::where('type_id', $type->id)
            ->whereIn('status', ['Penting', 'Biasa'])
            ->orderBy('status', 'desc') // Urutkan berdasarkan status (Penting terlebih dahulu)
            ->orderBy('updated_at', 'desc') // Kemudian urutkan berdasarkan updated_at terbaru
            ->get();
        }
        foreach ($info as $item) {
            if (Auth::guard('student')->user()) {
                $collection[$item->id] = Collection::where('info_id', $item->id)->where('user_id', Auth::guard('student')->user()->id)->first();
                $isSavedInfo[$item->id] = ($collection[$item->id] !== null);
            }
        }
        if (Auth::guard('student')->user()) {
            return view('niskala.info.searchByType', ['type' => $type, 'info'=> $info, 'search' => $search, 'slug' => $slug, 'isSavedInfo' => $isSavedInfo]);
        }
        return view('niskala.info.searchByType', ['type' => $type, 'info'=> $info, 'search' => $search, 'slug' => $slug]);
    }
    public function searchByTag(Request $request, $slug) {
        $category = Category::where('slug', $slug)->first();
        $search = $request->query('search');
        if (!empty($search)) {
            $info = Information::whereHas('categories', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('title', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('type', function ($typeQuery) use ($search) {
                            $typeQuery->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('writer', function ($writerQuery) use ($search) {
                            $writerQuery->where('name', 'like', '%' . $search . '%')
                                        ->orWhere('username', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('writerAdmin', function ($writerAdminQuery) use ($search) {
                            $writerAdminQuery->where('name', 'like', '%' . $search . '%')
                                            ->orWhere('username', 'like', '%' . $search . '%');
                        });
                });
            })->whereIn('status', ['Penting', 'Biasa'])
            ->orderBy('status', 'desc') // Urutkan berdasarkan status (Penting terlebih dahulu)
            ->orderBy('updated_at', 'desc') // Kemudian urutkan berdasarkan updated_at terbaru
            ->get();        
        } else {
            $info = Information::whereHas('categories', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })
            ->whereIn('status', ['Penting', 'Biasa'])
            ->orderBy('status', 'desc') // Urutkan berdasarkan status (Penting terlebih dahulu)
            ->orderBy('updated_at', 'desc') // Kemudian urutkan berdasarkan updated_at terbaru
            ->get();
        }
        foreach ($info as $item) {
            if (Auth::guard('student')->user()) {
                $collection[$item->id] = Collection::where('info_id', $item->id)->where('user_id', Auth::guard('student')->user()->id)->first();
                $isSavedInfo[$item->id] = ($collection[$item->id] !== null);
            }
        }
        if (Auth::guard('student')->user()) {
            return view('niskala.info.searchByTag', ['category' => $category, 'info'=> $info, 'search' => $search, 'slug' => $slug, 'isSavedInfo' => $isSavedInfo]);
        }
        return view('niskala.info.searchByTag', ['category' => $category, 'info'=> $info, 'search' => $search, 'slug' => $slug]);
    }

    public function searchResult(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)) {
            $info = Information::when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('title', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereHas('categories', function ($categoryQuery) use ($search) {
                            $categoryQuery->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('type', function ($typeQuery) use ($search) {
                            $typeQuery->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('writer', function ($writerQuery) use ($search) {
                            $writerQuery->where('name', 'like', '%' . $search . '%')
                                        ->orWhere('username', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('writerAdmin', function ($writerAdminQuery) use ($search) {
                            $writerAdminQuery->where('name', 'like', '%' . $search . '%')
                                            ->orWhere('username', 'like', '%' . $search . '%');
                        });
                });
            })->whereIn('status', ['Penting', 'Biasa'])
            ->orderBy('status', 'desc') // Urutkan berdasarkan status (Penting terlebih dahulu)
            ->orderBy('updated_at', 'desc') // Kemudian urutkan berdasarkan updated_at terbaru
            ->get();        
        } else {
            $info = Information::whereIn('status', ['Penting', 'Biasa'])
            ->orderBy('status', 'desc') // Urutkan berdasarkan status (Penting terlebih dahulu)
            ->orderBy('updated_at', 'desc') // Kemudian urutkan berdasarkan updated_at terbaru
            ->get();
        }

        foreach ($info as $item) {
            if (Auth::guard('student')->user()) {
                $collection[$item->id] = Collection::where('info_id', $item->id)->where('user_id', Auth::guard('student')->user()->id)->first();
                $isSavedInfo[$item->id] = ($collection[$item->id] !== null);
            }
        }
        if (Auth::guard('student')->user()) {
            return view('niskala.info.smantiPlus', ['info' => $info, 'search' => $search, 'isSavedInfo' => $isSavedInfo]);
        }

        return view('niskala.info.smantiPlus', ['info' => $info, 'search' => $search]);
    }
    
}
        
        
        
        
        
        
        
        