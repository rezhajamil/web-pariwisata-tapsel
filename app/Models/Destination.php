<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function destType()
    {
        return $this->belongsTo(DestinationType::class, 'type');
    }

    public function reviews()
    {
        return $this->hasMany(DestinationReview::class, 'dest_id');
    }

    public function images()
    {
        return $this->hasMany(DestinationImage::class, 'dest_id');
    }
}
