<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Database\Eloquent\Collection;
use App\Model\VetOffer;
use App\Model\VetRequest;

class VetRequestCustom
{
    public function excludes($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $vet_id = $args['vet_id'];
        $vetRequestIds = VetOffer::where("vet_id", $vet_id)->pluck('vet_request_id');
        
        $vetRequest = VetRequest::whereNotIn('id',$vetRequestIds);

        return $vetRequest;
    }
}