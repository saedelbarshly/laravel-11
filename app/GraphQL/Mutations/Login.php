<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final readonly class Login
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = User::where('email',$args['email'])->first();
        if(! $user || Hash::check($args['password'],$user->password)){
            return false;
        }

        return $user->createToken($args['device'])->plainTextToken();
    }
}
