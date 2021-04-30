<?php

namespace App\Transformers\Users;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class PublicUserTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user): array
    {
        return ['user' => [
            'id' => $user->id,
            'joined' => date_format($user->created_at, 'Y-m-d'),
            'name' => $user->name
        ]];
    }
}
