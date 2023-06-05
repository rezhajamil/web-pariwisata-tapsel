<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationReview extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'destination_reviews';

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'dest_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
