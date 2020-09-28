<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Files;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('category')
            ->orderBy('sort', 'ASC')
            ->orderBy('id', 'DESC');

        return view('admin.category.index', [
            'categories' => $categories->paginate(50),
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
        return view('admin.category.create', [
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
        $validator = Validator::make($request->all(), [
            'image_files' => 'required|array',
            'image_files.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required',
            'title' => 'required',
            'status' => 'nullable|numeric',
            'sort' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $category = Category::create($request->all());

        $images = Files::upload($request, 'image_files', 'category', Category::$thumbs);
        if($images){
            $category->update([
                'images' => $images
            ]);
        }
 
        return redirect()->route('admin.category.index');
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
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
    public function update(Request $request, Category $category)
    {
        $validator_arr = [];

        foreach([
            'image_files' => 'array',
            'image_files.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required',
            'title' => 'required',
            'status' => 'nullable|numeric',
            'sort' => 'required|numeric',
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

        $category->update($request->all());

        $images = Files::upload($request, 'image_files', 'category', Category::$thumbs);
        if($images){
            Files::delete($category->images, Category::$thumbs);
            $category->update([
                'images' => $images
            ]);
        }

        return $request->ajax() ? ['success' => true] : redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Files::delete($category->images, Category::$thumbs);
        Category::destroy($category->id);
        return ['success' => true];
    }
}
