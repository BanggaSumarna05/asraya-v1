<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'managements';
    protected $fillable = ['name', 'position', 'photo', 'bio', 'url_ref', 'url_ref_text', 'order', 'is_active'];
}
