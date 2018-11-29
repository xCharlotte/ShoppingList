<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ShoppingList;

class ProductController extends Controller
{

  public function index(ShoppingList $shopping_list) {
    Product::where('shopping_list_id', $shopping_list->id)->get();
    return view('lists.show', compact('shopping_lists', 'products'));
  }
  
  public function edit() {
    
  }
  
  public function store(Request $request, $id) {
    $this->validate($request, [
      'name' => 'required|max:20'
    ]);
    $product = new Product();
    $product->name = $request->name;
    $product->category_id = $request->category_id;
    $product->shopping_list_id = $id;
    $product->save();
    
    return redirect('/lists/'.$id)->with('success', 'succesvol toegevoegd');
  }
  
  public function update(Request $request, $shopping_list, $product) {
    $this->validate($request, [
      'name' => 'required|max:20'
    ]);
  
    $product = Product::find($product);
    $product->name = $request->name;
    $product->save();
  
    return $product;
  }
  
  public function destroy($shopping_list, $id) {
    $product = Product::find($id)->delete();
    return redirect('/lists/'.$shopping_list);
  }
}
