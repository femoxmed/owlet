<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    
        public function index()
        {
    
            $category =  Category::all();
    
            return response()->json($category, 200);
        }
    
    
        public function create()
        {
    
        }
    
        public function store(CategoryCreateRequest $request)
        {
          $categoryData =  $request->validated();
          $category = Category::create($categoryData);
          return response()->json($category, 201);
    
        }
    
    
        public function show($id)
        {
    
            $category = Category::findOrFail($id);
            return response()->json($category, 200);
        }
    
    
        public function update(AuthorCreateRequest $request, $id)
        {
    
            $category = Category::findOrFail($id);
            $category->update($request->validated());
            return $category;
    
        }
    
        public function destroy($id)
        {
            $category = Category::where(['id' => $id ])->delete();
    
            if (!$category)  {
                 return response()->json(['message' => 'data not found'], 404);};
            return response()->json(['message' => 'data deleted'], 200);
        }
    
}
