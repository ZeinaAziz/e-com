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
                    <h1 class="text-center mb-3">Edit Category {{$category->id}} "{{$category->name}}"</h1>
                    <h5 class="card-body">



                    <form action="{{route('categories.update',$category->id)}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title" class="form-label mt-3">category Name :</label>
                            <input type="text" value="{{$category->name}}" name="name" class="form-control" id="name" >
                        </div>

                        </div>

                        <div>
                            <input type="submit" class="btn btn-success"  value="Edit Category">
                        </div>
                    </form>
                    <form action="{{route('categories.destroy',$category->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning"> SoftDelete</button>
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

