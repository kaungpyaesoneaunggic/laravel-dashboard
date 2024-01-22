@extends('dashboard.index')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>item List</h3>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            {{ session('success') }}
                            <button class="close alert-dismissible" data-dismiss="alert"><i class="fa fa-x"></i></button>
                        </div>
                        @endif
                    @if(session('update'))
                        <div class="alert alert-primary alert-dismissible">
                            {{ session('update') }}
                            <button class="close alert-dismissible" data-dismiss="alert"><i class="fa fa-x"></i></button>
                        </div>
                        @endif
                    @if(session('delete'))
                        <div class="alert alert-danger alert-dismissible">
                            {{ session('delete') }}
                            <button class="close alert-dismissible" data-dismiss="alert"><i class="fa fa-x"></i></button>
                        </div>
                        @endif
                </div class='container'>
                    <table class="table" class="mx-5">
                      <thead>
                        @php
                          $num=1
                        @endphp
                        
                        <tr>
                          <th>#</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Category</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($items as $item)
                        <tr class="text-center">
                          <th>{{ $num++ }}</th>
                          <th scope="row">id - {{ $item->id }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->category->name }}</td>
                          <td><img src="{{asset('storage/gallery/' . $item->image) }}" width="80px" height="40px" style="object-fit: contain"></td>
                          <td>{{ $item->expdate }}</td>
                          <td>
                            <a type="button" href="{{ route('item.edit',$item->id) }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            <a type="button" href="{{ route('item.show',$item->id)  }}" class="btn btn-outline-info btn-sm">&nbsp;<i class="fa-solid fa-info"></i>&nbsp;</a>
                            <form id ='deleteForm' action="{{ route('item.destroy', $item->id)}}" method="post"  class="d-inline-block">
                              @method('delete')
                              @csrf
                            </form>
                            <button type="submit" class="btn btn-outline-danger btn-sm"  onclick="confirmDelete()"><i class="fa fa-trash"></i></button>
                          </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                </div>
          </div>
    </div>
</div>
<script>
  function confirmDelete() {
      var result = confirm("Are you sure you want to delete?");
      if (result) {
          // If user clicks OK, submit the form
          document.getElementById('deleteForm').submit();
      } else {
          // If user clicks Cancel, do nothing
      }
  }
  setTimeout(function() {
        $(".alert").alert('close');
    }, 4000);
  
</script>
@endsection