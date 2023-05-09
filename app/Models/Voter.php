<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'vote_date_time' => 'datetime'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
