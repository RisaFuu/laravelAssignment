<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::oldest()->paginate(5);

        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imageName = time().'.'.$request->images->extension();

        $request->images->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('image',$imageName);
        // dd($request->all());
        $data = $request->all();
        $data['images'] = $imageName;
        Product::create($data);

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    public function display()
    {
        $displayProduct = Product::all();

        return view('products.clothing',compact('displayProduct'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
        $image = $request->file('images');
        $data = $request->all();
        $data['images'] = $product->images;
        if(isset($image)){
            $imageName = time().'.'.$request->images->extension();
            $request->images->move(public_path('images'), $imageName);
            $data['images'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

}
