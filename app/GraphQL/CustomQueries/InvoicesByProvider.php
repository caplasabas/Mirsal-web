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
use App\Model\DriverOffer;
use App\Model\DriverRequest;

class InvoicesByProvider
{
    public function byVet($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $vet_id = $args['vet_id'];
        // $status = $args['status'];
        $vetOfferQuery = VetOffer::query();
        $vetRequestQuery = VetRequest::query();
        $invoiceQuery = Invoice::query();
        $vetOfferQuery = $vetOfferQuery->where("vet_id", $vet_id);
        $vetOffersIds = $vetOfferQuery->pluck("id");
        
        if(isset($args['created_with_vet'])){
            $vetRequestIds = $vetRequestQuery->where("created_with_vet", $args['created_with_vet'])->pluck("id");
            $vetOffersIds = $vetOfferQuery->whereIn("vet_request_id", $vetRequestIds)->pluck("id");
            // echo json_encode($vetOffersIds); exit;
        } 
        $invoiceQuery = $invoiceQuery->whereIn("vet_offer_id", $vetOffersIds);

        return $invoiceQuery;
    }

    public function byDriver($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $driver_id = $args['driver_id'];
        // $status = $args['status'];
        $driverOffersId = DriverOffer::where("driver_id", $driver_id)->pluck('id');
        $invoices = Invoice::whereIn('driver_offer_id', $driverOffersId);
        return $invoices;
    }
}