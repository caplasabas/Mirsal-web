<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Model\DriverOffer;
use App\Model\DriverRequest;
use App\Model\Invoice;
use App\Model\AdminSetting;

class DriverOfferMutator
{

    
    public function acceptDriverOffer($root, array $args)
    {
        $driver_offer_id = $args['driver_offer_id'];
        $admin_setting = AdminSetting::all()->first();
        $driver_offer = DriverOffer::find($driver_offer_id);
        $driver_request = DriverRequest::find($driver_offer->driver_request_id);
        
        if(isset($driver_offer_id)){

            $driver_offer->status = "ACCEPTED";
            $driver_request->status = "ACCEPTED";
            $invoice = Invoice::where('driver_offer_id', $driver_offer_id)->where('payment_for','DRIVER')->get();
            if($invoice->isEmpty()){
                $invoice = new Invoice;
                $invoice->client_id = $driver_offer->DriverRequest->client_id;
                $invoice->driver_offer_id = $driver_offer_id;
                // $invoice->offer_id = $driver_offer_id;
                $invoice->payment_for = "Driver";
                
                //Amount calculation FIRST PAYMENT
                $tax_price = $driver_offer->price * ($admin_setting->tax_perc/100);
                $invoice->amount_paid = $tax_price;

                
                $invoice->save();
                $invoice = Invoice::find($invoice->id);
                $driver_offer->save();
                $driver_request->save();
                return array(
                    'status' => 1,
                    'message' => "Success",
                    'invoice' => $invoice 
                );

            } else {

                return array(
                    'status' => 1,
                    'message' => "Success",
                    'invoice' => $invoice->first()
                );
            }
        }

        return array(
            'status' => 0,
            'message' => "Failed",

        );
        
    }


}
