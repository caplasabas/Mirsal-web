<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\ClientOffer;
use App\Model\Product;

class ProductsCustom
{
    public function excludes($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $buyer_id = $args['buyer_id'];
        $productIds = ClientOffer::where("buyer_id", $buyer_id)->pluck('product_id');
        
        $products = Product::whereNotIn('id',$productIds);

        return $products;
    }
}