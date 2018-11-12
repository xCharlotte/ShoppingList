@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><h1>{{ $shopping_list->name }}</h1></div>
          <div class="card-body">
            <form method="post" action='/lists/{{$shopping_list->id}}' enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Naam" required>
              </div>
              <div class="form-group">
                <select name="category_id" class="form-control form-control-sm" required>
                  <option value="" selected disabled>Kies een categorie...</option>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success">Voeg product toe</button>
              </div>
            </form>

          
            <div class="card-text">
              
                @foreach($category_list as $category)
                  <h3>{{$category->name}}</h3>
                  <table class="table table-sm">
                    @foreach($category->products as $product)
                      <tr>
                        <td class="col">{{ $product->name }}</td>
                        <td>
                          <a href="{{ route('shopping_list_edit', ['shopping_list' => $product->id]) }}"
                          class="btn btn-sm btn-secondary">
                            <i class="far fa-edit"></i>
                          </a>
                        </td>
                        <td>
                          <form action="{{ route('product_delete', ['shopping_list' => $shopping_list->id, 'product' => $product->id]) }}" method="post">
                             {{csrf_field()}}
                             <input name="_method" type="hidden" value="DELETE">
                             <button class="btn btn-sm btn-secondary" type="submit"><i class="far fa-trash-alt"></i></button>
                           </form>
                         </td>
                      </tr>
                    @endforeach
                  </table>
                @endforeach
              <div class="col">
                <a href="{{ url('/') }}">Ga terug naar lijsten</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<edit-product-component></edit-product-component>
@endsection