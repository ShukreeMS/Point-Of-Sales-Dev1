<?php

namespace App\Http\Controllers;

use App\SellingDetails;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

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
            ->rightJoin('product', 'selling_details.product_code', '=', 'product.product_code')
            ->select('selling_details.selling_details_id as id', 'selling_details.product_code as product_code', 
                    'selling_details.total as quantity', 'selling_details.created_at as created_at', 'product.product_name as name')
            ->orderBy('created_at', 'DESC')        
            ->get();
        return view("product_report.index", ["products" => $products, "begin" => $begin, "end"=> $end]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterdate(Request $request)
    {
        $begin = $request->input('begin');
        $end = $request->input('end');
        // $search = $request->input('searchid');

        if ($request->isMethod('post')) {
            # code...
            if ($request->has('searchdate')) {
                $query = DB::table('selling_details')
                ->rightJoin('product', 'selling_details.product_code', '=', 'product.product_code')
                ->select('selling_details.selling_details_id as id', 'selling_details.product_code as product_code', 
                        'selling_details.total as quantity', 'selling_details.created_at as created_at', 'product.product_name as name')
                ->whereBetween('selling_details.created_at', [$begin, $end])
                ->orderBy('created_at', 'DESC')         
                ->get();

                return view("product_report.index", ["products" => $query, "begin" => $begin, "end"=> $end]);
            }

            /* elseif ($request->has('search')) {
                $query = DB::table('selling_details')
                ->Join('product', 'selling_details.product_code', '=', 'product.product_code')
                ->select('selling_details.selling_details_id as id', 'selling_details.product_code as product_code', 
                        'selling_details.total as quantity', 'selling_details.created_at as created_at', 'product.product_name as name')
                ->where('selling_details.product_code', 'like', "%$search%")
                ->orWhere('product.product_name', 'like', "%$search%")
                ->orderBy('product.product_name', 'asc')

                ->get();

                return view("product_report.index", ["products" => $query, "begin" => $begin, "end"=> $end]);
            } */
        }

        
        
    }

    public function exportpdf($begin, $end)
    {
        
        $data = DB::table('selling_details')
        ->rightJoin('product', 'selling_details.product_code', '=', 'product.product_code')
        ->select('selling_details.selling_details_id as id', 'selling_details.product_code as product_code', 
                'selling_details.total as quantity', 'selling_details.created_at as created_at', 'product.product_name as name')
        ->whereBetween('selling_details.created_at', [$begin, $end])
        ->orderBy('created_at', 'DESC')         
        ->get();
        set_time_limit(300);
        $pdf = PDF::loadView('product_report.pdf', compact('begin', 'end', 'data', ));
        $pdf->setPaper('a4', 'potrait');
        
        return $pdf->stream();
            
    }

}
