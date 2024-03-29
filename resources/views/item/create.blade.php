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
                    <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                        @csrf
 
                        <div class="form-group m-3 row">
                            <label for="name" class="col-sm-6 col-form-label">Item Name <small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                              <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                              @error('name')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group m-3 row">
                            <label for="price" class="col-sm-6 col-form-label">Item Price <small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                              <input type="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                              @error('price')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group m-3 row">
                            <label for="category_id" class="col-sm-6 col-form-label">Category<small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                            <select type="category" name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            <option  value="none">None</option>
                            </select>
                            </div>
                            </div>

                            <div class="form-group m-3 row">
                              <label for="expdate" class="col-sm-6 col-form-label">Date<small class="text-danger">*</small></label>
                              <div class="col-sm-6">
                                <input class="form-control" type="date" id="expdate" name="expdate">
                              </div>
                              </div>  
                          
                            <div class="form-group m-3 row">
                              <label for="imgInput" class="col-sm-6 col-form-label @error('image') is-invalid @enderror" value="{{ old('image') }}" >Image<small class="text-danger">*</small></label>
                              <div class="col-sm-6">
                                <input class="form-control" type="file" id="formFile" name="image">
                              </div>
                              </div>  


 
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