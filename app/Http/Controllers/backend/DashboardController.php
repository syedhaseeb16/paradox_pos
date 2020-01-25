<?php

namespace App\Http\Controllers\backend;
use DB;
use Carbon\Carbon;
use App\Models\Pettycash;
use App\Models\Preorder;
use App\Models\Product;
use App\Models\Productcategory;
use App\Models\Sale;
use App\Models\Salescart;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 

    public function index()
    {
        //$birthday = Sale::whereMonth('sales_date', '=', date('m'))->whereDay('sales_date', '=', date('d')+1)->get();
        $store_worth = Product::all();
        $totalstoreworth=0;
        if ($store_worth) {
            foreach ($store_worth as $sw) {
                $worth_single_product = $sw->b_price*$sw->stock;
                $totalstoreworth += $worth_single_product;
            }
        }
        $sales = Sale::whereDate('sales_date', Carbon::today())->get();
        //$sales = Sale::all();
        $totalrevenue = 0;
        $todayprofit=0;
        if ($sales) {
            foreach ($sales as $w) {
                $with = $w->price;
                $buying = DB::table('Products')->where('id', $w->product_id)->value('b_price');
                $totalrevenue += $with;
                $todayprofit=$todayprofit+($with-$buying);
            
            }
        }


        $ccategory = Productcategory::all();
        $cproduct = Product::all();
        $totalproduct = count($cproduct);
        $salescart = Salescart::all();
        return view('backend.dashboard.index', compact('totalrevenue', 'todayprofit', 'totalproduct', 'salescart','totalstoreworth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
