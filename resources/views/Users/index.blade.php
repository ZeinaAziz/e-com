@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
                    <div class="container " style="position: fixed; right: 1500px;   bottom: 682px;    z-index: 5;">
                        <a class="btn btn-success mt-3" href="{{route('users.create')}}"> Add New user</a>
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

       <h2 style="display:flex;align-items:center; justify-content:center; margin-bottom: 40px;">Users List</h2>
       <h2 style="display:flex;align-items:center; justify-content:center; margin-bottom: 40px;">All users : {{count($users)}}</h2>
        <table class="container table table-striped " style="margin-right:40px">
            <thead >
                <tr style="height:50px;">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Block</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                    <tr>
                    <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if(!$user->isAdmin)
                            User
                        @endif
                        @if($user->isAdmin && !$user->isSuperAdmin )
                            Admin
                        @endif
                        @if($user->isSuperAdmin)
                            Super Admin
                        @endif
                    </td>
                    <td>
                        @if(!$user->isBlock)
                            Active
                        @endif
                        @if($user->isBlock)
                            Blocked
                        @endif
                    </td>
                    <td>
                        <a href="{{route('users.showproducts',$user->id)}}" class="btn btn-info"> Show Products</a>
                        @if(!$user->isBlock)
                            <a href="{{route('users.block',$user->id)}}" type="submit" class="btn btn-danger">Block</a>
                        @endif
                        @if($user->isBlock)
                            <a href="{{route('users.unblock',$user->id)}}" type="submit" class="btn btn-success">Un Block</a>
                        @endif
                        @if(!$user->isAdmin)
                            <a href="{{route('users.admin',$user->id)}}" type="submit" class="btn btn-light">Admin</a>
                        @endif
                        @if($user->isAdmin)
                            <a href="{{route('users.unadmin',$user->id)}}" type="submit" class="btn btn-primary">User</a>
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
