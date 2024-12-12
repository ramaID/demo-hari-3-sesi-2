<?php

namespace App\Traits;

use App\Models\User;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait UserRelationshipTrait
{
    public function user()
    {
        return $this->belongsTo(User::class)->where('is_active', true);
    }
}
