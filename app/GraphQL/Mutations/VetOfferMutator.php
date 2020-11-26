<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Model\VetOffer;
use App\Model\VetRequest;
use App\Model\Invoice;
use App\Model\VetTimeSlot;
use App\Model\AdminSetting;

class VetOfferMutator
{

    
    public function acceptVetOffer($root, array $args)
    {
        $vet_offer_id = $args['vet_offer_id'];
        $admin_setting = AdminSetting::get()->first();
        $vet_offer = VetOffer::find($vet_offer_id);
        $vet_request = VetRequest::find($vet_offer->vet_request_id);
        $vetTimeSlotQuery = VetTimeSlot::query();
        // echo json_encode($vet_request); exit;
        if($vet_request->type == "VISIT" && $vet_request->vet_time_slot_id != NULL){
            $vetTimeSlot = $vetTimeSlotQuery->find($vet_request->vet_time_slot_id);
            if($vetTimeSlot->taken == 1){
                return array(
                    'status' => 0,
                    'message' => __('lang.time_slot_taken')
                );
            } else {
                $vetTimeSlot->taken = 1;
                $vetTimeSlot->save();
            }
        }
        
        if(isset($vet_offer_id)){

            // $vet_offer->status = "ACCEPTED";
            // $vet_request->status = "ACCEPTED";
            $existingInvoice = Invoice::where('vet_offer_id', $vet_offer_id)->where('payment_for','VETERINARIAN')->get();
        
            if($existingInvoice->isEmpty()){
                
                $invoice = new Invoice;
                $invoice->client_id = $vet_offer->vetRequest->client_id;
                $invoice->vet_offer_id = $vet_offer_id;
                // $invoice->offer_id = $vet_offer_id;
                $invoice->payment_for = "VETERINARIAN";
                $price = str_replace(',', "", $vet_offer->price);
                //Amount calculation
                // $invoice->amount_paid = $price; 
                $tax_percentage = $admin_setting->tax_perc/100;
                $invoice->amount_paid = floatval($price) + ($price * $tax_percentage);
                
                $invoice->tax_price = $price * ($admin_setting->tax_perc/100);
                $invoice->tax_rate = $admin_setting->tax_perc;
                $vet_offer->tax_price = $invoice->tax_price;
                $vet_offer->total = $price + $vet_offer->tax_price;

                $invoice->save();
                $invoice = Invoice::find($invoice->id);
                $vet_offer->save();
                $vet_request->save();
                return array(
                    'status' => 1,
                    'message' => "Success",
                    'invoice' => $invoice
                );
            } else {

                return array(
                    'status' => 1,
                    'message' => "Success",
                    'invoice' => $existingInvoice->first()
                );
            }

            
        }

        return array(
            'status' => 0,
            'message' => "Failed",

        );
        

    }


}
