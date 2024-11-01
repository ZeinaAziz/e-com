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

       <h2 style="display:flex;align-items:center; justify-content:center; margin-bottom: 40px;">Orders Management</h2>
       <h2 style="display:flex;align-items:center; justify-content:center; margin-bottom: 40px;"># All Orders :{{count($orders)}} #</h2>
        <table class="container table table-striped " style="margin-right:40px">
            <thead >
                <tr style="height:50px;">
                    <th scope="col">Oreder_Id</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Product</th>
                    <th scope="col">State</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                    <tr>
                    <th>{{$order->id}}</th>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->state}}</td>
                    <td>{{$order->created_at}}</td>

                    <td>

                        <form action="{{route('orders.forceDelete',$order->id)}}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancel</button>
                        </form>
                        @if($order->state == 'Pending')
                            <a href="{{route('orders.shipped',$order->id)}}" type="submit" class="btn btn-info">Shipped</a>
                            <a href="{{route('orders.delivered',$order->id)}}" type="submit" class="btn btn-success">Delivered</a>
                        @endif
                        @if($order->state == 'Shipped')
                            <a href="{{route('orders.pending',$order->id)}}" type="submit" class="btn btn-warning">Pending</a>
                            <a href="{{route('orders.delivered',$order->id)}}" type="submit" class="btn btn-success">Delivered</a>
                        @endif
                        @if($order->state == 'Delivered')
                        <a href="{{route('orders.pending',$order->id)}}" type="submit" class="btn btn-warning">Pending</a>
                            <a href="{{route('orders.shipped',$order->id)}}" type="submit" class="btn btn-info">Shipped</a>

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
