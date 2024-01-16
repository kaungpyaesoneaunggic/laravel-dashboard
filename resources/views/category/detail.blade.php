@extends('dashboard.index')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Category Detail</h3>
                </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">{{ $category->id }}</td>
                          <td>{{ $category->name }}</td>
                          </tr>
                      </tbody>
                    </table>
                </div>
                <div class="form-group m-3 row">
                  <div class="text-center mx-auto">
                    <a href="{{ route('category.index') }}" class="btn btn-outline-dark">
                      <i class="fa fa-arrow-left fa-lg"></i>
                    </a>
                  </div>
                </div>
          </div>
    </div>
</div>
@endsection