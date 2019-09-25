<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Product::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:5',
                'price' => 'required|numeric|min:1',
            ],
            [
                'name.required' => 'Nhap day du ten',
                'name.min' => 'Ten ngan qua',
                'price.required' => 'Nhap day du gia',
                'price.numeric' => 'Nhap so',
                'price.min' => 'Nhap so > 0'
            ]
        );

        if ($validator->fails()) {
            return response(['success' => false, 'errors' => $validator->errors()], 200);
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return response([
            'success' => true,
            'data' => $product
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:5',
                'price' => 'required|numeric|min:1',
            ],
            [
                'name.required' => 'Nhap day du ten',
                'name.min' => 'Ten ngan qua',
                'price.required' => 'Nhap day du gia',
                'price.numeric' => 'Nhap so',
                'price.min' => 'Nhap so > 0'
            ]
        );

        if ($validator->fails()) {
            return response(['success' => false, 'errors' => $validator->errors()], 200);
        }
        
        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');

        $product->save();

        return response([
            'success' => true
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return response([
            'success' => true
        ], 200);
    }
}
