@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
                    <div class="container" style="position: fixed; right: 1500px;   bottom: 650px;    z-index: 5;">

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
<div class="mt-5 container">
<h1 class="text-center mb-3">ADD A NEW PRODUCT</h1>
<form action="{{route('products.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Product Name :</label>
                <input type="text" name="name" class="form-control" id="name" >
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Product Description :</label>
                <input type="text" name="description" class="form-control" id="description" >
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Product Price :</label>
                <input type="text" name="price" class="form-control" id="price" >
            </div>

            <div class=" mb-3">
                <label class="form-label" for="image">Choose Photo</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group mb-3">
            <h6 class="card-text d-inline">Select categories :</h6>
            @foreach($categories as $category)
                <div class="form-check">
                <label class="form-check-label" for="flexCheckChecked{{$category->id}}">
                        {{$category->name}}
                    </label>
                    <input name="categories[]" class="form-check-input" type="checkbox" value="{{$category->id}}" id="flexCheckChecked{{$category->id}}">
                </div>
            @endforeach
            </div>
            <div>
                <input type="submit" class="btn btn-success" name="submit" value="Add Product">
            </div>
        </form>
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

