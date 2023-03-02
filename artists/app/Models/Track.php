<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = ['title', 'album_id'];

    use HasFactory;

    public function albums() {
        return $this->belongsToMany(Album::class, 'album_track')->withPivot([]);
    }
}
