<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Product as ProductResource;
use App\Http\Requests\Product as ProductRequest;
use App\Product;
use App\Services\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @param Product $product
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Product $product)
    {
        return ProductResource::collection($product->paginate(10));
    }

    /**
     * @param Request $request
     * @param File $file
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, File $file)
    {

        $fileName = $file->getFulleName($request);
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = (int)$request->category_id;
        $product->img = $fileName;
        $product->price = $request->price;
        $product->save();

        return response()->json('New Product Created Successful',
            Response::HTTP_CREATED);
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
            $currenttProduct = new ProductResource($product);
            return response()->json(
                [
                    'data' => $currenttProduct
                ], Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param Product $product
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
