<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphqlException;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Auth\TokenGuard;

use App\User;

class LoginMutator
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

        if(Auth::attempt(['phone' => $args['phone'], 'password' => $args['password']])){

            $token = Str::random(60).uniqid();

            $user = Auth::user();
            $user->api_token = $token;
            $user->save();

            return [
                'user' => $user,
                'token' => $token
            ];
        }else{
            throw new GraphqlException(
                'Invalid Credentials',
                'Please check your phone and password'
            );
        }

    }
}
