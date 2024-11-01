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
       <h2 style="display:flex;align-items:center; justify-content:center; ">Product {{$product->name}}</h2>
       <div class="container mt-5"  style=" display:flex;align-items:center;justify-content:center;">
            <div class="card mb-3 " style="width: 40rem;border-radius:30px;">
                <div class="card-body" style="direction :ltr ">
                    <h5 class="card-title ">ID :{{$product->id}}</h5>
                    <h5 class="card-title ">Name :{{$product->name}}</h5>
                    <h5 class="card-title ">
                        <img style="width:300px; height:170px ; border-radius:15px" src="{{asset($product->image)}}" alt="img">
                    </h5>
                    <h5 class="card-title ">
                    @if(!$product->available)
                            Not Available
                        @endif
                        @if($product->available)
                            Available
                        @endif
                    </h5>
                    <h5 class="card-title ">Price :{{$product->price}}</h5>
                    <h5 class="card-body ">Description :{{$product->description}}</h5>
                    <h5 class="card-body ">Admin :{{$product->user->name}}</h5>
                    <h5 class="card-body ">Categories :
                    @foreach($product->categories as $cat)
                            {{$cat->name}}-
                        @endforeach
                    </h5>
                    <h5 class="card-body ">
                    <a type="submit" class="btn btn-light">Edit</a>
                        <a type="submit"  href="{{route('products.show',$product->id)}}" class="btn btn-info">View</a>
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

