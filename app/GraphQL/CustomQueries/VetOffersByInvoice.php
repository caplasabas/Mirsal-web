<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Invoice;
use App\Model\VetOffer;
use App\Model\VetRequest;

class VetOffersByInvoice
{
    public function byInvoice($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $vet_id = $args['vet_id'];
        $payment_status = $args['payment_status'];
        $vetOffersIds = VetOffer::where("vet_id", $vet_id)->pluck('id');
        $vetOffersIds = Invoice::where('payment_status', $payment_status)->whereIn('vet_offer_id', $vetOffersIds)->where('payment_for','VETERINARIAN')->pluck('vet_offer_id');
        $vetOffers = VetOffer::whereIn('id', $vetOffersIds);
        
        return $vetOffers;
    }
}