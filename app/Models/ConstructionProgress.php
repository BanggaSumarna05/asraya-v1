<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConstructionProgress extends Model
{
    protected $table = 'construction_progress';
    protected $fillable = ['period', 'order', 'is_active'];

    public function images()
    {
        return $this->hasMany(ProgressImage::class)->orderBy('order');
    }
}
