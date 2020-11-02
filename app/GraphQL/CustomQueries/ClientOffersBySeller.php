<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Invoice;
use App\Model\ClientOffer;
use App\Model\Product;

class ClientOffersBySeller
{
    public function bySeller($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $seller_id = $args['seller_id'];
        $status = $args['status'];
        $products = Product::where("seller_id", $seller_id)->where("status", $status);
        if($products->get()->isEmpty())
            return $products;
        $productIds = $products->pluck('id');
        $clientOffers = ClientOffer::whereIn('product_id', $productIds);
        return $clientOffers;
    }
}