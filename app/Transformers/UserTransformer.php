<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;


class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'             => $user->id,
            'name'           => $user->name,
            'email'          => $user->email,
            'avatar'         => $user->avatar,
            'introduction'   => $user->introduction,
            'bound_phone'    => $user->phone ? true : false,
            'bound_wechat'   => ($user->wexin_unionid || $user->weixin_openid) ? true : false,
            'last_actived_at'=> $user->last_actived_at->toDateTimeString(),
            'created_at'     => (string)$user->created_at,
            'updated_at'     => (string)$user->updated_at,
        ];
    }
}
