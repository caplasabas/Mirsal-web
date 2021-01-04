<?php

namespace App\GraphQL\Mutations;

use App\Model\UserToken;
use App\User;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Auth;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LogoutMutator
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
        // TODO implement the resolver
        $user = Auth::user();
        auth()->logout();
        $user->api_token = null;
        $user->save();
        $AuthToken = $_SERVER['HTTP_AUTHORIZATION'];

        $AuthToken = substr($AuthToken, 7);
        $deletedRows = UserToken::where('api_token', $AuthToken)->where('user_id', $user->id)->delete();

        return [
            'status' => true,
            'message' => 'success',
        ];

    }
}