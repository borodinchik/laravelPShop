<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Product as ProductResource;
use App\Http\Requests\Product as ProductRequest;
use App\Product;
use App\Services\File;
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
     * @param ProductRequest $request
     * @param File $file
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request, File $file)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = (int)$request->category_id;
        $product->img = $file->getFileName($request);
        $product->price = $request->price;
        $product->save();

        return response()->json(['massage' => 'New Product Created Successful'],
            Response::HTTP_CREATED);
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
            $currentProduct = new ProductResource($product);
            return response()->json(
                [
                    'data' => $currentProduct
                ], Response::HTTP_OK);
    }

    /**
     * @param ProductRequest $request
     * @param $id
     * @param Product $product
     * @param File $file
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductRequest $request, $id,Product $product, File $file)
    {
        $product = $product->find($id);
        if (!empty($product)) {
            $product->title = $request->title;
            $product->description = $request->description;
            $product->img = $file->getFileName($request);
            $product->category_id = (int)$request->category_id;
            $product->price = $request->price;
            $product->update();
        }

        return response()->json(
            [
                'massage' => "Product id = {$id} Updated!"
            ], Response::HTTP_CREATED
        );
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
