<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Info_Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->query('search');
        $sort = $request->query('sort');
        $direction = $request->query('direction');
        if (!empty($search)) {
            $categories = Category::when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10)->onEachSide(1)->fragment('categories');
        } else {
            $categories = Category::paginate(10)->onEachSide(1)->fragment('cate$categories');
        }
        return view('admin.categories', ['categories' => $categories, 'sort' => $sort, 'direction' => $direction])->with(['categories'=> $categories, 'search'=> $search,]);
    }

    public function add(Request $request)
    {
        $name = Category::where('name', $request->name)->first();
        if ($name) {
            return redirect()->back()->with(['message' => 'Kategori Sudah Ada, Silahkan Coba Lagi!']);
        }

        $category = Category::create($request->all());
        return redirect()->back()->with(['messageSuccess' => 'Kategori Berhasil Ditambahkan']);
    }

    public function edit($slug, Request $request)
    {
    	$category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
		return redirect('category')->with(['messageSuccess' => 'Kategori Berhasil Diperbarui']);
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categoryInfo = Info_Category::where('category_id', $category->id)->first();
        if ($categoryInfo) {
            $categoryInfo->delete();
        }
        $category->delete();
		return redirect('category')->with(['messageSuccess' => 'Kategori Berhasil Dihapus']);
    }
}