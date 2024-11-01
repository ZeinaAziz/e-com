<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{

    public function index()
    {
        $orders=Order::get();
        return view('orders.index',compact('orders'));
    }
    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->back()->with('messege','Deleted');
    }

    public function forceDelete($id){
        $order=Order::findOrFail($id);

        // صاحب المنتج و السوبر ادمن فقط من يمكنه الحذف
        if( Auth::user()->id == $order->product->user_id || Auth::user()->isSuperAdmin){{}
            Order::withTrashed()->where('id',$id)->forceDelete();
            return redirect()->back()->with('messege','Deleted');
        }
        return redirect()->back()->with('messege','  لا يمكنك الحذف فقط صاحب المنتج و السوبر ادمن');
    }
    public function restore($id){
        Order::withTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('messege','Restored');
    }


    public function shipped($id)
    {
        $order=Order::findOrFail($id);

        if( Auth::user()->id == $order->product->user_id || Auth::user()->isSuperAdmin){{}
            $order->state = 'Shipped';
            $order->save();
            return redirect()->back()->with('messege','Modified');
        }
        return redirect()->back()->with('messege','  لا يمكنك التعديل فقط صاحب المنتج و السوبر ادمن');

    }
    public function delivered($id)
    {
        $order=Order::findOrFail($id);

        if( Auth::user()->id == $order->product->user_id || Auth::user()->isSuperAdmin){{}
            $order->state = 'Delivered';
            $order->save();
            return redirect()->back()->with('messege','Modified');
        }
        return redirect()->back()->with('messege','  لا يمكنك التعديل فقط صاحب المنتج و السوبر ادمن');

    }
    public function pending($id)
    {
        $order=Order::findOrFail($id);

        if( Auth::user()->id == $order->product->user_id || Auth::user()->isSuperAdmin){{}
            $order->state = 'Pending';
            $order->save();
            return redirect()->back()->with('messege','Modified');
        }
        return redirect()->back()->with('messege','  لا يمكنك التعديل فقط صاحب المنتج و السوبر ادمن');

    }

    public function store(Request $request)
    {
        //
    }


    public function show(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }


}
