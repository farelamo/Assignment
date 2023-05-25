<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Transaction_Sale;
use DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $branches = Branch::select('id', 'name')->get();
        $data = Transaction_Sale::whereBetween(
                        'transaction_date', 
                        // ['2019-10-11 11:31:02', '2020-12-27 00:00:00']
                        [$request->start, $request->end]
                    )
                    ->with(['salesman' => function ($q) use ($request){
                        $q->where('branch_id', '=', $request->branch);
                        $q->select('id', 'name');
                        $q->groupBy('id', 'name');
                    }])
                    ->select(['transaction_date', 'salesman_id', 'customer_id'])
                    ->groupBy('transaction_date', 'salesman_id', 'customer_id')
                    ->orderBy('transaction_date', 'asc')
                    // ->get();
                    ->paginate(5)->withQueryString();

        
        // dd($data);
        // foreach ($data as $item) {
        //     dd($item->salesman);
        // }

        return view('index', compact('data', 'branches'));
    }
}
