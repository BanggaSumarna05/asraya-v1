<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressImage extends Model
{
    protected $fillable = ['construction_progress_id', 'image', 'order'];

    public function progress()
    {
        return $this->belongsTo(ConstructionProgress::class, 'construction_progress_id');
    }
}
