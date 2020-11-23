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

class VetOfferResolver
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {   
        // vet_request_id: ID @eq, vet_id: ID @eq, status: VetOfferStatuses @eq, created_with_vet: Int @eq, orderBy: _ @orderBy(columns: ["created_at", "updated_at","id"])
        // $vet_id = $args['vet_id'];
        // $return = "";
        // $vetOfferQuery = VetOffer::query();
        // if(isset($args['vet_request_id'])){
        //     // $return .= "vet_request_id - not null, ";
        //     $vetOfferQuery = 
        // }
        // if(isset($args['vet_id'])){
        //     $return .= "vet_id - not null, ";
        // }
        // if(isset($args['status'])){
        //     $return .= "status - not null, ";
        // }
        // if(isset($args['created_with_vet'])){
        //     $return .= "created_with_vet - not null, ";
        // }
        // if(isset($args['orderBy'])){
        //     $return .= "orderBy - not null, ";
        // }

        // echo json_encode(array( 
        //     "return" => $return,
        //     "error" => ""
        // )); exit;
        return null;
    }
}
