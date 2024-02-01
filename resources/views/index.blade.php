@extends('layouts.app')

@section('content')
<div class="justify-content-center">
    <div class="" style="max-height: 100vh, overflow-hidden">
        <h4 class="text-center">Shopping Cart</h4>
    </div>
    <div class="container card text-center">
        <div class="row text-center">
            {{-- col 1 and col 2 container start --}}
            <div class="col-sm-8 mb-2" style="overflow-y: scroll; max-height: 80vh;">
                <div class="row  justify-content-between">
                    @foreach($shoppings as $shopping)
                    <div class="col-sm-4 border" style="margin:20px">
                        <h5 class="my-1">Coffee</h5>
                        <div class="card">
                            <div class="card-body text-center">
                                <img style="width: 150px; heigth:200px" name='image' src="{{asset('storage/gallery/' . $shopping->image) }}">
                                <div class="m-1">
                                    <p class="" name='name' >{{ $shopping->name }}</p>
                                    <p class="" name='price' >{{ $shopping->price }} MMK</p>
                                </div>
                                <div class="d-flex justify-content-end align-items-end">
                                    <form method="post" action='{{ route('shopping.store',$shopping->id) }}' enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $shopping->id }}">
                                        <input type="hidden" name="name" value="{{ $shopping->name }}">
                                        <input type="hidden" name="price" value="{{ $shopping->price }}">
                                        <input type="hidden" name="category_id" value="{{ $shopping->category->id }}">
                                        <input type="hidden" name="image" value="{{ $shopping->image }}">
                                        <input type="hidden" name="expdate" value="{{ $shopping->expdate }}">
                                        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-add"></i></button>
                                    
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    @if ($loop->iteration % 2 == 0)
                  </div><div class="row justify-content-between">
              @endif
                    @endforeach
                    <div style="margin-bottom: 20px" ></div>
                </div>
            </div>

            {{-- Col 3 container start --}}
            <div class="col-sm-4 border" style="position: sticky; max-height: 100vh;">
                <h5 class="my-1">Testing</h5>
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                                @php
                                  $num=1;
                                  $price=0;
                                @endphp
                            </thead>
                            <tbody>
                              @foreach ($shoppings as $shopping )
                              <tr>
                                <th>{{$num++ }}</th>
                                <th scope="row">{{ $shopping->name }}</td>
                                <th>{{ $shopping->price }}</th>
                                @php
                                  $price+=$shopping->price
                                @endphp
                              </tr>
                              @endforeach<tr>
                                <th> </th>
                                <th scope="row">Total</td>
                                <th>{{ $price }}</th>
                              </tr>
                                
                                <!-- More rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Col 3 container end --}}
        </div>
        {{-- col 1 and col 2 container end --}}
    </div>
</div>
@endsection
