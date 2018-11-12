@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header"><h1>Categorieën</h1></div>
            <div class="card-body">
              <form method="post" action="/categories" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                  <input type="text" name="name" class="form-control" placeholder="Naam"/>
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-success">Maak aan</button>
                  </div>
                </div>
              </form>
            </div>
            
            <div class="card-text">
              <table>
              @foreach ($categories as $category)
                <tr>
                  <td><a class="col" href="{{ url('/categories', $category->id) }}">{{ $category->name }}</a></td>
                  <td><a href="{{ route('category_edit', ['category' => $category->id]) }}"
                    class="btn btn-sm btn-secondary"><i class="far fa-edit"></i></a></td>
                  <td>
                    <form action="{{ action ('CategoryController@destroy', $category->id)}}" method="post">
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

@endsection