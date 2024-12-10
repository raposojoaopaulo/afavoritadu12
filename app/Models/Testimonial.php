<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Store;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'person_name',
        'testimonial',
        'photo',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}