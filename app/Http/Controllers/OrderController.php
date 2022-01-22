<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuList;
use App\Models\Order;
use App\Models\OrderByItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
       $categories = MenuCategory::get();
       $menu_lists = MenuList::get();
        // dd($menu_lists);
       $count = 1;
        $data = [
        "categories" => $categories,
        "menu_lists" => $menu_lists,
        "count" => $count,
        ];
    return view('order', $data);

    }
    public function save_order(Request $request)
    {
        // dd($request);
        $total_sales = 0;
        $all_menu_list = $request->input('menulistid');
            // dd($request->input('quantity' . $all_menu_list[0]));
        // FOR COMPUTING THE TOTAL SALES PER ORDER
        for ($i=0; $i < count($all_menu_list); $i++) { 
             $menu_list = MenuList::where('id', $all_menu_list[$i])->first();
             $sale_per_menu_list = $request->input('quantity' . $all_menu_list[$i]) * ($menu_list->price + $menu_list->tax);
             $total_sales = $total_sales + $sale_per_menu_list;
        }   
       $order = Order::create([
        'total_sales' => $total_sales,
        ]);  
            // dd($order->total_sales);

        for ($i=0; $i < count($all_menu_list); $i++) { 
             OrderByItem::create([
            'order_id' => $order->id,
            'menu_list_id' => $all_menu_list[$i],
            'quantity' => $request->input('quantity' . $all_menu_list[$i]),
            ]);   
        }

    }

    public function all_order()
    {
       $orders = Order::get();
       $order_by_items = OrderByItem::get();
        // dd($menu_lists);
       $count = 1;
        $data = [
        "orders" => $orders,
        "order_by_items" => $order_by_items,
        "count" => $count,
        ];
    return view('all_orders', $data);

    }
    public function get_by_order(Request $request)
    {
       $count = 1;
       $all_categories = [];
       $all_menu_lists = [];
       $all_quantity = [];
       $all_prices = [];
       $order = Order::where('id', $request->order_id)->first();
        foreach ($order->OrderByItem as $key => $value) {
            $all_categories[] = $value->MenuList->MenuCategory->name;          
            $all_menu_lists[] = $value->MenuList->name;          
            $all_quantity[] = $value->quantity;          
            $all_prices[] = $value->quantity * ($value->MenuList->price + $value->MenuList->tax);          
        }
        $total_sales = $order->total_sales;
       // $category = $order->id;
        $data = [
        "all_categories" => $all_categories,
        "all_menu_lists" => $all_menu_lists,
        "all_quantity" => $all_quantity,
        "all_prices" => $all_prices,
        "total_sales" => $total_sales,
        "loop_count" => count($all_categories),
        "order" => $order,
        ];
    return response()->json($data);

    }
}
