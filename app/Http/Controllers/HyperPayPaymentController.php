<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Invoice;
use App\Model\DriverOffer;
use App\Model\VetOffer;
use App\Helpers\HyperPayCopyAndPay;

class HyperPayPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

    public function payInvoice(Request $request)
    {
        $inv_id = $request->inv_id;
        $invoice = Invoice::find($inv_id);
        $data=array();
        $response = HyperPayCopyAndPay::request(str_replace(',', "", $invoice->amount_paid));
        $data['response'] = $response;
        $data['inv_id'] = $inv_id;
        $amount = $invoice->amount_paid;
        $data['amount_paid'] = str_replace(',', "", $invoice->amount_paid);
        // var_dump($data); exit;
        return view('pages.pay-invoice')->with(compact('data'));
    }

    public function returnUrl(Request $request)
    {
        $inv_id = $request->inv_id;
        $url = "mirsal://payment?invoiceId=".$inv_id;
        $response = \App\Helpers\HyperPayCopyAndPay::paymentStatus($request->resourcePath);
        $result_code = $response['result']['code'];
        if($result_code == "000.000.000"){
            $arr_result = array(
                "status" => 1,
                "code" => $result_code,
                "message" => $response['result']['description'],
            );

            $invoice = Invoice::find($inv_id);
            $invoice->reference_id = $response['id'];
            $invoice->payment_gateway = "HyperPay";
            $invoice->payment_status = "PAID";
            $invoice->save();

            if($invoice->payment_for ==  "VETERINARIAN"){
                $vet_offer = VetOffer::find($invoice->vet_offer_id);
                $vet_offer->status = "ACCEPTED";
                $vet_offer->save();
            }
            if($invoice->payment_for ==  "DRIVER"){
                $driver_offer = DriverOffer::find($invoice->driver_offer_id);
                $driver_offer->status = "ACCEPTED";
                $driver_offer->save();
            }

            return redirect()->away($url);
        } else {
            $arr_result = array(
                "status" => 0,
                "code" => $result_code,
                "message" => $response['result']['description'],
            );
            return json_encode($arr_result);
        }

        $arr_result = array(
            "status" => 0,
            "code" => "",
            "message" => $response['result']['description'],
        );
        // return json_encode($arr_result);
        

        return redirect()->away($url);
         
    
        // return view('pages.return-url')->with(compact('response'));
    }
}
