<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Collection;


class CategorieController extends Controller
{
    public function showCategories()
    {
        $categories = Category::paginate(10);
        return view('pages.category', ['categories' => $categories]);
    }

    public function home(Category $category)
    {
        $brands = Brand::where('category_id', $category->id)
        // ->orderBy('name')
        ->paginate(5);

        $name = "Robin";

        return view(
            'pages.homepage',
            ['brands' => $brands],
            ['name' => $name]
        );
    }

}
