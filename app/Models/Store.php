<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Testimonial;
class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'slug',
        'whatsapp',
        'phone',
        'address',
        'logo',
        'instagram_token',
        'facebook_url',
        'instagram_url',
        'tiktok_url',
        'youtube_url',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'instagram_token' => 'encrypted',
    ];    

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
