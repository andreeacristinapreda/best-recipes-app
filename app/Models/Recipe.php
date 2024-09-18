<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
              ->orWhere('ingredients', 'like', '%' . request('search') . '%')
              ;
        }
    }

    public function user () {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function favoritedBy()
    {
      return $this->belongsToMany(User::class, 'favorite_recipe', 'recipe_id', 'user_id')->withTimestamps();
    }
}
