<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ShoppingList;

class ProductController extends Controller
{

  public function index(ShoppingList $shopping_list) {
    $products = Product::all();
    return view('lists.show', compact('shopping_lists', 'products'));

    // $products = Product::where('added', false)->orderBy('id', 'DEC')->get();
    // $added_product = Product::where('added', true)->get();
    // return view('products', compact('products', '$added_product'));
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
  
  public function destroy($shopping_list, $id) {
    $product = Product::find($id)->delete();
    return redirect('/lists/'.$shopping_list);
  }
}
