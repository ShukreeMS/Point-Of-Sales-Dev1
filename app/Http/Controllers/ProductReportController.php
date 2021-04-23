<?php

namespace App\Http\Controllers;

use App\SellingDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $begin = date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')));
        $end = date('Y-m-d');
        // $products = SellingDetails::all('selling_details_id','product_code','total', 'created_at');
        $products = DB::table('selling_details')
            ->leftJoin('product', 'selling_details.product_code', '=', 'product.product_code')
            ->select('selling_details.selling_details_id as id', 'selling_details.product_code as product_code', 
                    'selling_details.total as quantity', 'selling_details.created_at as created_at', 'product.product_name as name')
            ->orderBy('created_at', 'DESC')        
            ->get();
        return view("product_report.index", ["products" => $products, $begin, $end]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
