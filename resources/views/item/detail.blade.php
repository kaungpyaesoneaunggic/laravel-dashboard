@extends('dashboard.index')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Create Item</h3>
                </div>
 
                <div class="card-body">
                    <form method="POST" action="{{ route('item.store') }}">
                        @csrf
 
                        <div class="form-group m-3 row">
                            <label for="name" class="col-sm-6 col-form-label">Item Name </label>
                            <div class="col-sm-6">
                              <input type="name" name="name" class="form-control" value="{{ $item->name}}">
                            </div>
                          </div>
                          <div class="form-group m-3 row">
                            <label for="price" class="col-sm-6 col-form-label">Item Price</label>
                            <div class="col-sm-6">
                              <input type="price" name="price" class="form-control"  value="{{ $item->price}}">
                            </div>
                          </div>
                          <div class="col-sm-6">">
                            <label for="category_id" class="col-sm-6 col-form-label">Category></label>
                            <select type="category" name="category_id" class="form-control inline">
                            <option  value="{{ old('category_id') ?? $item->category_id }}">{{ $item->category_id }}</option>
                        </select>
                      </div>
                          <!-- select date will be here -->
                          <!-- select image will be here -->

 
                          <div class="form-group m-3 row">
                            <div class="text-center mx-auto">
                              <a href="{{ route('item.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-arrow-left fa-lg"></i>
                              </a>
                              <button type="submit" class="btn btn-outline-primary">Create</button>
                            </div>
                          </div>
 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection