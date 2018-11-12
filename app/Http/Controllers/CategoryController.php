<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index() {
    $categories = Category::all();
    return view('categorylist', compact('categories'));
  }

  public function store(Request $request) {
    $this->validate($request, [
      'name' => 'required|max:20'
    ]);
    
    $category = new Category();
    $category->name = $request->name;
    $category->save();
    
    return redirect('/categories');
  }

  public function show(Category $category) {
      //
  }

  public function edit(Category $category) {
      //
  }

  public function update(Request $request, Category $category) {
      //
  }

  public function destroy($id) {
    $category = Category::find($id)->delete();
    return redirect('/categories');
  }
}
