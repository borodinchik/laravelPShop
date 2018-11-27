<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Resources\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth')
//            ->except('showChildAndParentsCategoriesTree', 'getCategoryAndItsProducts', 'showCategoriesList');
//    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function showChildAndParentsCategoriesTree()
    {
        $categories = Category::with('childs')->get();
        return response()->json(
            [
                'category' => CategoryResource::collection($categories)
            ], Response::HTTP_OK);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function showCategoriesList()
    {
        $list = Category::pluck('name', 'id')->all();
        return response()->json(
            [
                'categories_list' => $list
            ], Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Category::create($input);
        return response()->json(['success' => 'New Category added successfully.'], Response::HTTP_CREATED);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoryAndItsProducts()
    {
        $data = Category::with('products')->get();
        return response()->json(CategoryProduct::collection($data), Response::HTTP_OK);
    }
}
