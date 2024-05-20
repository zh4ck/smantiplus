<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->query('search');
        $sort = $request->query('sort');
        $direction = $request->query('direction');
        if (!empty($search)) {
            $types = Type::when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10)->onEachSide(1)->fragment('types');
        } else {
            $types = Type::paginate(10)->onEachSide(1)->fragment('cate$types');
        }
        return view('admin.types', ['types' => $types, 'sort' => $sort, 'direction' => $direction])->with(['types'=> $types, 'search'=> $search,]);
    }

    public function add(Request $request)
    {
        $name = Type::where('name', $request->name)->first();
        if ($name) {
            return redirect()->back()->with(['message' => 'Jenis Sudah Ada, Silahkan Coba Lagi!']);
        }

        $type = Type::create($request->all());
        return redirect()->back()->with(['messageSuccess' => 'Jenis Berhasil Ditambahkan']);
    }

    public function edit($slug, Request $request)
    {
    	$type = Type::where('slug', $slug)->first();
        $type->slug = null;
        $type->update($request->all());
		return redirect('type')->with(['messageSuccess' => 'Jenis Berhasil Diperbarui']);
    }

    public function delete($slug)
    {
        $type = Type::where('slug', $slug)->first();
        $type->delete();
		return redirect('type')->with(['messageSuccess' => 'Jenis Berhasil Dihapus']);
    }
}