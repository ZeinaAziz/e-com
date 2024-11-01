@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
                    <div class="container " style="position: fixed; right: 1500px;   bottom: 682px;    z-index: 5;">
                        <a class="btn btn-success mt-3" href="{{route('products.create')}}"> Add New Product</a>
                    </div>
						<div class="d-flex">

                                 <h6>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <button class="btn btn-danger">{{ __('Logout') }}</button>
                                    </a>
                                 </h6>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                </div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
   <div class="container">
   @if(session()->has('messege'))
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('messege')}}
            </div>
        @endif
   </div>
				<!-- row -->
       <div class="row container">
       <div class="container mt-5"  style=" display:flex;align-items:center;justify-content:center;">
            <div class="card mb-3 " style="width: 40rem;border-radius:30px;">
                <div class="card-body" style="direction :ltr ">
                <div class="mt-5 container">
                    <h1 class="text-center mb-3">Edit Product {{$product->id}} "{{$product->name}}"</h1>
                    <h5 class="card-body">
                        <form action="{{route('products.destroy',$product->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning"> SoftDelete</button>
                        </form>
                        @if(!$product->available)
                            <a href="{{route('products.ava',$product->id)}}" type="submit" class="btn btn-success">Available</a>
                        @endif
                        @if($product->available)
                            <a href="{{route('products.notAva',$product->id)}}" type="submit" class="btn btn-danger">Not Available</a>
                        @endif
                        <h5 class="card-title ">
                            @if(!$product->available)
                                    # Not Available
                                @endif
                                @if($product->available)
                                    # Available
                                @endif
                        </h5>
                    <form action="{{route('products.update',$product->id)}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title" class="form-label mt-3">Product Name :</label>
                            <input type="text" value="{{$product->name}}" name="name" class="form-control" id="name" >
                        </div>
                        <h5 class="card-title ">
                             <img style="width:300px; height:170px ; border-radius:15px" src="{{asset($product->image)}}" alt="img">
                        </h5>
                        
                        <div class="mb-3">
                            <label for="body" class="form-label">Product Description :</label>
                            <textarea type="text" name="description" class="form-control" id="description" >
                            {{$product->description}}
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Product Price :</label>
                            <input type="text" value="{{$product->price}}" name="price" class="form-control" id="price" >
                        </div>
                        <h6 class="card-text d-inline">Select categories :</h6>
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input name="categories[]" class="form-check-input" type="checkbox" value="{{$category->id}}" id="flexCheckChecked{{$category->id}}"
                                    @if(in_array($category->id, $product->categories->pluck('id')->toArray())) checked @endif>
                                <label class="form-check-label" for="flexCheckChecked{{$category->id}}">
                                    {{$category->name}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                        <h5 class="card-body ">Admin :{{$product->user->name}}</h5>
                        <div>
                            <input type="submit" class="btn btn-success"  value="Edit Product">
                        </div>
                    </form>
                    </h5>
                </div>
            </div>
       </div>




			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->


@endsection
@section('js')
@endsection

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

