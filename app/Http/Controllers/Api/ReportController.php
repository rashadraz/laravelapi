<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function purchaseReport(Request $request)
    {
        // we are building the query and joining the relation table
        $query = OrderItem::query()
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
        //we are selecting only the data which is required for reports (product name , category name , user name , no of purchases count )
            ->select('products.name as product_name', 'categories.name as category', 'users.name as user_name', \DB::raw('COUNT(order_items.product_id) as no_of_purchases'))
            ->groupBy('products.name', 'categories.name', 'users.name');

        // if there is start_date and end_date is provided we are fetching the datas between these days
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('orders.created_at', [$request->start_date, $request->end_date]);
        }
        // if category_id is provided we are fetching the dataswith that category only
        if ($request->has('category_id')) {
            $query->where('products.category_id', $request->category_id);
        }

        // paginating with 10 records per page
        $reports = $query->paginate(10);

        // finally returning the response
        return response()->json($reports);
    }
}
