<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Model\VetOffer;
use App\Model\VetRequest;
use App\Model\Invoice;
use App\Model\AdminSetting;

class VetOfferMutator
{

    
    public function acceptVetOffer($root, array $args)
    {
        $vet_offer_id = $args['vet_offer_id'];
        $admin_setting = AdminSetting::all()->first();
        $vet_offer = VetOffer::find($vet_offer_id);
        $vet_request = VetRequest::find($vet_offer->vet_request_id);
        
        if(isset($vet_offer_id)){

            $vet_offer->status = "ACCEPTED";
            $vet_request->status = "ACCEPTED";
            $invoice = Invoice::where('vet_offer_id', $vet_offer_id)->where('payment_for','VETERINARIAN')->get();
            if($invoice->isEmpty()){
                $invoice = new Invoice;
                $invoice->client_id = $vet_offer->vetRequest->client_id;
                $invoice->vet_offer_id = $vet_offer_id;
                // $invoice->offer_id = $vet_offer_id;
                $invoice->payment_for = "VETERINARIAN";
                
                //Amount calculation
                $invoice->amount_paid = $vet_offer->price; 
                $invoice->amount_paid += ($vet_offer->price * ($admin_setting->tax_perc/100));
                
                $invoice->save();
                $invoice = Invoice::find($invoice->id)->get();
                $vet_offer->save();
                $vet_request->save();
                return array(
                    'status' => 1,
                    'message' => "Success",
                    'invoice' => $invoice
                );
            }

            return array(
                'status' => 1,
                'message' => "Success",
                'invoice' => $invoice->first()
            );
        }

        return array(
            'status' => 0,
            'message' => "Failed",

        );
        

        // $user_id = $args['user_id'];
        // $exponent_token = $args['exponent_token'];
        // if(isset($args['user_id']))
        // {
        //     if(isset($args['exponent_token']))
        //     {
        //         $user = User::find($user_id);
        //         $userWithExpo = User::where('exponent_token',$exponent_token)->get()->first();

        //         if(isset($userWithExpo))
        //         {
        //             $userWithExpo->exponent_token = null;
        //             $userWithExpo->save();
        //         }
        //         $user->exponent_token = $args['exponent_token'];
        //         $user->save();

        //         return array(
        //             'message' => "Success",
        //             'status' => 1,
        //             'user' => $user,
        //         );
        //     }
        //     return array(
        //         'message' => "No exponent token",
        //         'status' => 0,
        //         'user' => $user,
        //     );
        // }

        // return array(
        //     'message' => "No user id",
        //     'status' => 0
        // );
    }


}
