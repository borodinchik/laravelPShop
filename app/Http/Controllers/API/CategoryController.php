<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{

    public function showChildAndParentsCategoriesTree()
    {
        $categories = Category::with('childs')->paginate(3);
        return response()->json(
            [
                'category' => CategoryResource::collection($categories)
            ], Response::HTTP_OK);
    }

    public function showCategoriesList()
    {
        $list = Category::pluck('name', 'id')->all();
        return \response()->json(
            [
                'categories_list' => $list
            ], Response::HTTP_OK);
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Category::create($input);
        return back()->with('success', 'New Category added successfully.');
    }
}
