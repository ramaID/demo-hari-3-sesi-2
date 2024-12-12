<?php

namespace App\Models;

use App\Traits\UserRelationshipTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use UserRelationshipTrait;
}
