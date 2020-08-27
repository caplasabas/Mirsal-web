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

        $vet_offer = VetOffer::find($vet_offer_id)->first();
        
        if(isset($vet_offer_id)){

            $vet_offer->status = "ACCEPTED";
            $invoice = new Invoice;
            $invoice->client_id = $vet_offer->vetRequest->client_id;
            $invoice->offer_id = $vet_offer_id;
            $invoice->payment_for = "VETERINARIAN";
            $invoice->amount_paid = $vet_offer->price; // NEED to remake
            $invoice->save();

            return array(
                'status' => 1,
                'message' => "Success",
                'invoice' => $invoice
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
