@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
                    <div class="container" style="position: fixed; right: 1500px;   bottom: 650px;    z-index: 5;">
                        <button class="btn btn-success mt-3" href="{{route('products.create')}}"> Add New Product</button>
                    </div>
						<div class="d-flex">
                        <li class="nav-item dropdown">
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
                            </li>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {{session()->get('messege')}}
            </div>
        @endif
				<!-- row -->
       <div class="row container">
       <h2 style="display:flex;align-items:center; justify-content:center; margin-bottom: 40px;"> # Product List  # {{$user->name}}  </h2>
        <table class="container table table-striped " style="margin-right:40px">
            <thead >
                <tr style="height:50px;">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Available</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                    <tr>
                    <th>{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        @if(!$product->available)
                            Not Available
                        @endif
                        @if($product->available)
                            Available
                        @endif
                    </td>
                    <td>
                    <button type="submit" class="btn btn-info">View</button>
                    <button type="submit" class="btn btn-dark">Edit</button>
                        @if(!$product->deleted_at)
                            <form action="" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning"> SoftDelete</button>
                            </form>
                        @endif
                        @if($product->deleted_at)
                            <a href="" class="btn btn-dark">Restore</a>
                        @endif
                        @if(!$product->available)
                            <button type="submit" class="btn btn-success">Available</button>
                        @endif
                        @if($product->available)
                            <button type="submit" class="btn btn-danger">Not Available</button>
                        @endif

                    </td>
                    </tr>
                    @endforeach


            </tbody>
        </table>
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

