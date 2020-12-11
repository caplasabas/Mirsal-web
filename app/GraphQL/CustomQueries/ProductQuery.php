<?php

namespace App\GraphQL\CustomQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\Product;

class ProductQuery
{
    public function __invoke($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $productQuery = Product::query();

        if(isset($args['seller_id'])){
            $productQuery = $productQuery->where("seller_id", $args['seller_id']);
        }

        if(isset($args['is_vip'])){
            $productQuery = $productQuery->where("is_vip", $args['is_vip']);  
        }

        if(isset($args['status'])){
            $productQuery = $productQuery->where("status",$args['status']);
        }

        if(isset($args['excludeSellerIds'])){
            $productQuery = $productQuery->whereNotIn('seller_id', $args['excludeSellerIds']);
        }

        if(isset($args['excludeProductIds'])){
            $productQuery = $productQuery->whereNotIn('id', $args['excludeProductIds']);
        }

        if(isset($args['vip_status'])){
            $productQuery = $productQuery->where("vip_status",$args['vip_status']);
        }

        if(isset($args['type'])){
            $productQuery = $productQuery->where("type",$args['type']);
        }

        if(isset($args['title'])){
            $productQuery = $productQuery->Where('title', 'like', '%'.$args['title'].'%');
        }
        
        return $productQuery;
    }

}