<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingList;
use App\Product;
use App\Category;

class ShoppingListController extends Controller
{
  public function index() {
    $shopping_lists = ShoppingList::all();
    return view('lists', compact('shopping_lists'));
  }

  public function edit() {
  }

  public function show(ShoppingList $shopping_list, Product $products) {
    $shopping_list = ShoppingList::find($shopping_list)->first();
    $categories = Category::all();
    $products = Product::where('shopping_list_id', $shopping_list->id)->orderBy('category_id')->get();
    return view('lists.show',compact('shopping_list', 'products', 'categories'));
  }
  
  public function store(Request $request) {
    $this->validate($request, [
      'name' => 'required|max:20'
    ]);
    
    $shoppinglist = new ShoppingList();
    $shoppinglist->name = $request->name;
    $shoppinglist->save();
  
    return redirect('/')->with('success', 'succesvol toegevoegd');
  }
  
  public function update() {
    
  }
  
  public function destroy($id) {
    $shopping_list = ShoppingList::find($id)->delete();
    return redirect('/')->with('success','successvol verwijderd');
  }
}