<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphqlException;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Auth\TokenGuard;

use App\User;

use Kreait\Firebase\Factory;

class FirebaseCustomToken
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
        $factory = (new Factory)->withServiceAccount(public_path().'mirsal-c162c-firebase-adminsdk-65ru1-d51b1fe76d.json');
        $factory = $factory->withDatabaseUri('https://mirsal-c162c.firebaseio.com/');
        $authFirebase = $factory->createAuth();
    
        $uid = "".$args['user_id'];
        $customToken = $authFirebase->createCustomToken($uid);

        return [
            'fireBaseCustomToken' => $customToken,
        ];

    }
}
