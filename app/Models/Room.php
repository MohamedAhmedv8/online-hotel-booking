<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'total_rooms', 'amenities','size', 'total_beds', 'total_bathrooms', 'total_balconies', 'total_guests','featured_photo','video_id'];
    public function RoomPhotos()
    {
        return $this->hasMany(RoomPhoto::class);
    }
}
