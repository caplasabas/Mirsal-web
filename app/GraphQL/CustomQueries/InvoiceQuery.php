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

class InvoiceQuery
{
    public function __invoke($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $invoiceQuery = Invoice::query();
        $vetOfferQuery = VetOffer::query();
        $vetRequestQuery = VetRequest::query();
        // echo json_encode($args); exit;
        // id: ID @eq, 
        // client_id: ID @eq, 
        // vet_offer_id: ID @eq,
        // driver_offer_id: ID @eq, 
        // payment_status: InvoiceStatuses @eq, 
        // payment_for: PaymentFor @eq, 
        // reference_id: String @eq,
        if(isset($args['id'])){
            $invoiceQuery = $invoiceQuery->where('id',isset($args['id']));
        }

        if(isset($args['client_id'])){
            $invoiceQuery = $invoiceQuery->where("client_id", $args['client_id']);
        }

        if(isset($args['vet_offer_id'])){
            $invoiceQuery = $invoiceQuery->where("vet_offer_id", $args['vet_offer_id']);
        }

        if(isset($args['driver_offer_id'])){
            $invoiceQuery = $invoiceQuery->where("driver_offer_id", $args['driver_offer_id']);
        }

        if(isset($args['payment_status'])){
            $invoiceQuery = $invoiceQuery->where("driver_offer_id", $args['driver_offer_id']);
        }

        if(isset($args['payment_for'])){
            $invoiceQuery = $invoiceQuery->where("payment_for", $args['payment_for']);
        }

        if(isset($args['reference_id'])){
            $invoiceQuery = $invoiceQuery->where("reference_id", $args['reference_id']);
        }

        if(isset($args['created_with_vet'])){
            $acceptedVetOfferIds = $vetRequestQuery->where("created_with_vet", $args['created_with_vet'])->pluck("accepted_vet_offer_id");
            $invoiceQuery = $invoiceQuery->whereIn("vet_offer_id", $acceptedVetOfferIds);
        }

        return $invoiceQuery;
    }

}