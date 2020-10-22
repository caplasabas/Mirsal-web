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

class InvoicesByProvider
{
    public function byVet($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $vet_id = $args['vet_id'];
        // $status = $args['status'];
        $vetOffersIds = VetOffer::where("vet_id", $vet_id)->pluck('id');
        $invoices = Invoice::whereIn('vet_offer_id', $vetOffersIds);
        return $invoices;
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