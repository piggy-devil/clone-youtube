<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductCollection(request()->user()->products);
    }

    public function store()
    {
        $data = request()->validate([
            'name' => '',
            // 'buyprice' => '',
            // 'buyfrom' => '',
            // 'sellprice' => '',
            // 'sellto' => '',
        ]);

        $product = request()->user()->products()->create([
            'name'      => $data['name'],
            // 'buyprice'  => $data['buyprice'],
            // 'buyfrom'   => $data['buyfrom'],
            // 'sellprice' => $data['sellprice'],
            // 'sellto'    => $data['sellto'],
        ]);

        return new ProductResource($product);
    }
}
