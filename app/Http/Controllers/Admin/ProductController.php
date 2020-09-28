<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

use App\Classes\Files;

use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $Request)
    {
        $products = Product::with('category')
            ->orderBy('sort', 'ASC')
            ->orderBy('id', 'DESC');

        if($Request->images){
            if($Request->images == '1'){
                $products->whereNotNull('images');
            } else {
                $products->whereNull('images');
            }
        }

        if($Request->name){
            $products->where('name', 'like', "%$Request->name%")
                ->orWhere('description', 'like', "%$Request->name%");
        }

        if($Request->amount){
            $products->where('amount', 'like', "%$Request->amount%")
                ->orWhere('amount_old', 'like', "%$Request->amount%");
        }

        if($Request->category_id){
            $products->where('category_id', $Request->category_id);
        }

        if($Request->sort){
            $products->where('sort', $Request->sort);
        }

        if($Request->status){
            $products->where('status', $Request->status);
        }

        return view('admin.product.index', [
            'products' => $products->paginate(50),
            'categories_select' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['amount'] = str_replace(',', '.', $request->amount);
        $request['amount_old'] = str_replace(',', '.', $request->amount_old);
        
        $validator = Validator::make($request->all(), [
            'image_files' => 'required|array',
            'image_files.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'name' => 'required',
            'amount' => 'required|numeric',
            'amount_old' => 'nullable|numeric',
            'status' => 'nullable|numeric',
            'sort' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $product = Product::create($request->all());

        $images = Files::upload($request, 'image_files', 'product', Product::$thumbs);
        if($images){
            $product->update([
                'images' => $images
            ]);
        }
 
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->amount){
            $request['amount'] = str_replace(',', '.', $request->amount);
        }
        if($request->amount_old){
            $request['amount_old'] = str_replace(',', '.', $request->amount_old);
        }

        $validator_arr = [];

        foreach([
            'image_files' => 'array',
            'image_files.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'name' => 'required',
            'amount' => 'required|numeric',
            'amount_old' => 'nullable|numeric',
            'status' => 'nullable|numeric',
            'sort' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
        ] as $key => $val){
            if($request->has($key)){
                $validator_arr[$key] = $val;
            }
        }

        $validator = Validator::make($request->all(), $validator_arr);

        if ($validator->fails()) {
            return $request->ajax() 
                ? ['errors' => $validator->errors()]
                : redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $product->update($request->all());

        $images = Files::upload($request, 'image_files', 'product', Product::$thumbs);
        if($images){
            Files::delete($product->images, Product::$thumbs);
            $product->update([
                'images' => $images
            ]);
        }

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Files::delete($product->images, Product::$thumbs);
        Product::destroy($product->id);
        return ['success' => true];
    }
}
