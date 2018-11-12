@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><h1>Boodschappenlijstjes</h1></div>
          <div class="card-body">
            <form method="post" action="/" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Naam"/>
                <div class="input-group-append">
                  <button type="submit" class="btn btn-success">Maak aan</button>
                </div>
              </div>
            </form>

          
            <div class="card-text">
              <table class="table table-sm">
              @foreach ($shopping_lists as $shopping_list)
                <tr>
                  <td class="col"><a href="{{ url('/lists', $shopping_list->id) }}">{{ $shopping_list->name }}</a></td>
                  <td><a href="{{ route('shopping_list_edit', ['shopping_list' => $shopping_list->id]) }}"
                    class="btn btn-sm btn-secondary"><i class="far fa-edit"></i></a></td>
                  <td>
                    <form action="{{ action ('ShoppingListController@destroy', $shopping_list->id)}}" method="post">
                     {{csrf_field()}}
                     <input name="_method" type="hidden" value="DELETE">
                     <button class="btn btn-sm btn-secondary" type="submit"><i class="far fa-trash-alt"></i></button>
                   </form>
                 </td>
                </tr>
              @endforeach
              </table>
            </div>
          </div>
          
      </div>
    </div>
  </div>
</div>

{{-- <example-component></example-component> --}}
<edit-product-component></edit-product-component>
@endsection





