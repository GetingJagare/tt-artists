<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'release_year', 'artist_id'];

    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    public function tracks() {
        return $this->belongsToMany(Track::class, 'album_track')->withPivot('order');
    }
}
