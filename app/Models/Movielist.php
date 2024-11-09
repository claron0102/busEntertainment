<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movielist extends Model
{
    protected $table = 'moviesdb';

    protected $fillable = [
       
     'tmdb_id','title','tagline','path_movie','release_date','overview','poster_path','background_path','vote_average','genre_ids','runtime	subtitle_link','vote_count' 
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $casts = [
        'subtitle_link' => 'array',
        'genre_ids' => 'array',
    ];
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
    
}
