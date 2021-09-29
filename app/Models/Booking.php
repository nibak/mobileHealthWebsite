<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

/*    protected $casts = [
        'dob' => 'date'
    ];*/

    public function coursedate() {
        return $this->belongsTo(Coursedate::class);
    }
}
