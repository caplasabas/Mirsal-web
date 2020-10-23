<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Invoice;
use App\Model\DriverOffer;
use App\Model\DriverRequest;

class DriverOffersByInvoice
{
    public function byInvoice($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $driver_id = $args['driver_id'];
        $payment_status = $args['payment_status'];
        $driverOffersIds = DriverOffer::where("driver_id", $driver_id)->pluck('id');
        $driverOffersIds = Invoice::where('payment_status', $payment_status)->whereIn('driver_offer_id', $driverOffersIds)->where('payment_for','DRIVER')->pluck('driver_offer_id');
        $driverOffers = DriverOffer::whereIn('id', $vetOffersIds);
        
        return $driverOffers;
    }
}