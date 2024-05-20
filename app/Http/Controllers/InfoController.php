<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Info_Category;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index(Request $request) 
    {
        $categories = Category::all();
        $type = Type::all();

        $search = $request->query('search');
        $direction = $request->query('direction');
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
            })
            ->paginate(10)->onEachSide(1)->fragment('Info');        
        } else {
            $info = Information::paginate(10)->onEachSide(1)->fragment('Info');
        }

        return view('Admin.info', ['info' => $info, 'categories' => $categories, 'type' => $type, 'direction' => $direction])->with(['info'=> $info,'search'=> $search,]);
    }
    public function infoArchived(Request $request) 
    {
        $categories = Category::all();
        $type = Type::all();

        $search = $request->query('search');
        $direction = $request->query('direction');
        if (!empty($search)) {
            $info = Information::where('status', 'Diarsipkan')->when($search, function ($query) use ($search) {
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
            })
            ->paginate(10)->onEachSide(1)->fragment('Info');        
        } else {
            $info = Information::where('status', 'Diarsipkan')->paginate(10)->onEachSide(1)->fragment('Info');
        }

        return view('Admin.info-archived', ['info' => $info, 'categories' => $categories, 'type' => $type, 'direction' => $direction])->with(['info'=> $info,'search'=> $search,]);
    }
    
    public function add()
    {
        $categories = Category::all();
        $type = Type::all();
        return view('admin.info-add', ['categories' => $categories, 'type' => $type]);
    }

    public function store(Request $request)
    {
        if ($request->type_id == 'Pilih Jenis Informasi') {
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
        
        $request['administrator_id'] = Auth::guard('administrator')->user()->id;
        $info = Information::create($request->all());
        $info->categories()->sync($request->categories);
        
        return redirect('/info')->with(['messageSuccess' => 'Informasi Berhasil Ditambahkan']);
    }

    public function detail($slug) 
    {
        $info = Information::where('slug', $slug)->first();
        $categories = Category::all();
        $type = Type::all();
        
        return view('admin.info-detail', ['info' => $info, 'categories' => $categories, 'type' => $type]);
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

        if($request->categories) {
            $info->categories()->sync($request->categories);
        }
		return redirect('/info-detail/'.$info->slug)->with(['messageSuccess' => 'Informasi Berhasil Diperbarui']);
    }

    public function deleteCommentAndReplies($comment)
{
    $replies = $comment->replies()->with(['replies', 'replyFrom'])->get();
    $replyFroms = $comment->replyFrom()->with(['replies', 'replyFrom'])->get();

    // Debugging: cek apakah relasi diambil dengan benar
    logger()->info('Replies: ' . $replies->count());
    logger()->info('ReplyFroms: ' . $replyFroms->count());

    foreach ($replies as $reply) {
        $this->deleteCommentAndReplies($reply);
    }

    foreach ($replyFroms as $replyFrom) {
        $this->deleteCommentAndReplies($replyFrom);
    }

    $comment->delete();
}


    
public function destroy($slug, Request $request)
{
    $info = Information::where('slug', $slug)->first();

    if ($info) {
        $comments = Comment::where('info_id', $info->id)
                           ->with(['replies', 'replyFrom'])
                           ->get();

        foreach ($comments as $comment) {
            $this->deleteCommentAndReplies($comment);
        }

        $categoryInfo = Info_Category::where('info_id', $info->id)->get();
        if ($categoryInfo) {
            $categoryInfo->each->delete();
        }

        $collection = Collection::where('info_id', $info->id)->get();
        if ($collection) {
            $collection->each->delete();
        }

        $imgInfo = 'imgInfo/' . $info->imgInfo;
        Storage::delete($imgInfo);
        $info->delete();
    }

    // Cek referer untuk menentukan halaman redirect
    $referer = $request->headers->get('referer');
    if (strpos($referer, '/info') !== false) {
        return redirect('/info')->with(['messageSuccess' => 'Informasi berhasil terhapus secara permanen']);
    } elseif (strpos($referer, '/edit-info/' . $info->slug) !== false) {
        return redirect('/profile/created')->with(['messageSuccess' => 'Informasi berhasil terhapus secara permanen']);
    }

    // Default redirect jika tidak ada referer yang cocok
    return redirect('/info')->with(['messageSuccess' => 'Informasi berhasil terhapus secara permanen']);
}




    public function archive($slug, Request $request) {
        $info = Information::where('slug', $slug)->first();
        $info->status = 'Diarsipkan';
        $info->save();

        $referer = $request->headers->get('referer');
        if (strpos($referer, '/info') !== false) {
            return redirect('/info-archived')->with(['messageSuccess' => 'Informasi berhasil diarsipkan']);
        } elseif (strpos($referer, '/edit-info/'.$info->slug) !== false) {
            return redirect()->back()->with(['messageSuccess' => 'Informasi berhasil diarsipkan']);
        }
        
        return redirect()->back()->with(['messageSuccess' => 'Informasi berhasil diarsipkan']);
    }
    
    public function publish(Request $request, $slug) {
        $info = Information::where('slug', $slug)->first();
        $info->status = $request->status;
        $info->save();

        $referer = $request->headers->get('referer');
        if (strpos($referer, '/info-archived') !== false) {
            return redirect('/info')->with(['messageSuccess' => 'Informasi berhasil dipulihkan']);
        } elseif (strpos($referer, '/edit-info/'.$info->slug) !== false) {
            return redirect()->back()->with(['messageSuccess' => 'Informasi berhasil dipulihkan']);
        }
        
        return redirect()->back()->with(['messageSuccess' => 'Informasi berhasil dipulihkan']);
    }
}