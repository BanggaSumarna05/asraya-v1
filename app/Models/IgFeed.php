<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IgFeed extends Model
{
    protected $fillable = ['image', 'caption', 'link', 'order', 'is_active'];
}
