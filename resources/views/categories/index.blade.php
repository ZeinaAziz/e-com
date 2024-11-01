@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto ">
                    <div class="container" style="position: fixed; right: 1500px;   bottom: 650px;    z-index: 5;">
                        <button class="btn btn-success mt-3" data-toggle="modal" data-target="#commentModal"> Add New Category</button>
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
        @if(session()->has('messege'))
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('messege')}}
            </div>
        @endif
				<!-- row -->
       <div class="row container">
       <h2 style="display:flex;align-items:center; justify-content:center; margin-bottom: 40px;">Category List</h2>
        <table class="container table table-striped " style="margin-right:40px"  >
            <thead >
                <tr style="height:50px; " >
                    <th scope="col"><h4>#</h4></th>
                    <th scope="col"><h4>Category Name</h4></th>
                    <th scope="col"><h4>Action</h4></th>
                </tr>
            </thead>
            <tbody>
                    @foreach($categories as $category)
                    <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>
                         <a href="{{route('categories.showproducts',$category->id)}}" class="btn btn-info"> Show Products</a>
                         <a href="{{route('categories.edit',$category->id)}}" class="btn btn_light"> Edit</a>

                        @if(!$category->deleted_at)
                            <form action="" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning"> SoftDelete</button>
                            </form>
                        @endif
                        @if($category->deleted_at)
                            <a href="" class="btn btn-dark">Restore</a>
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


<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Add Category</h5>
                    <div style="width:300px "></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                <div class="form-group">
                <label for="content">Category</label>
                <input name="name" id="content" class="form-control" required>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

