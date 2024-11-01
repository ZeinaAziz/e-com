<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;

// Order Controller Api
// كي يتمكن اليوزر من ستخدام اي فانكشن هنا يجب ادخال التوكن الخاص به
class OrderController extends Controller
{
    // يعرض الطلبات التي قد طلبها اليوزر الذي قام بتسجيل الدخول حاليا
    public function index()
    {
        $id = Auth::id();
        // $user= User::faindOrfail($id);
        // $ordersForOneUser=$user->orders();
        $ordersForOneUser=Order::where('user_id',$id)->get();
        return response()->json(["Orders" =>OrderResource::collection($ordersForOneUser),
        'messege' => 'success'],200);
    }
    // يقوم بتتخزين الطلب الذي يطلبه اليوزر بشرط ان يكون اليوزر قد قام بتسيجل الدخول
    // حيث يقوم اليوزر بادخال التوكن الخاص به و ادخال معرف البروداكت الذي يريد طلبه

    public function store(OrderRequest $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->user_id =  Auth::id();
        $order->save();
        //سنعيد فقط رقم الطلب في حالة اراد المستخدم رؤية طلبه لاحقا
        return response()->json($order->id,201);
    }
    //  url بعد ان ارسلنا رقم الطلب لليوزر ان الراد اليوزر رؤية طلبه يقوم اليوزر بارسال رقم طلبه بال

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json(["Order" =>new OrderResource($order),
        'messege' => 'success'],200);
    }
    // لتعديل طلب اليوزر
    // يقوم بادخال :
    // التوكن الخاص به
    // product_id الجديد
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->product_id = $request->product_id;
        $order->user_id =  Auth::id();
        $order->save();
        return response()->json($order);
    }
    // لالغاء الطلب

    public function destroy($id)
    {
        $order=Order::findOrFail($id);
        $del =$order->delete();
        return response()->json($del);
    }
}
