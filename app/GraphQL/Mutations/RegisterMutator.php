<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphqlException;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Str;

use App\User;
use App\Model\UserFile;
use App\Events\OnRegister;

class RegisterMutator
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

        $token = Str::random(60).uniqid();

        $user = new User();
        $user->role = $args['role'];
        $user->name = $args['name'];
        // $user->email = $args['email'];
        $user->phone = $args['phone'];
        $user->password = bcrypt($args['password']);
        $user->api_token = $token;
        $user->save();
        if(isset($args['avatar']))
        {
            $file = $args['avatar'];
            if($file)
            {
                $avatarName = $user->id.'_userAvatar'.time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('user_avatars',$avatarName);
                $user->avatar = $avatarName;
            }
        }

        if(isset($args['user_file']))
        {
            $file = $args['user_file'];
            if($file)
            {
                $filename = $user->id.'_userFile'.time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('user_files',$filename);
                $userFile = new UserFile();
                $userFile->user_id = $user->id;
                $userFile->name = $filename;
                $userFile->save();
            }
        }

        
        event(new WhenUserLogin($user));
        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
