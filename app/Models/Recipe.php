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

        if($filters['cathegory'] ?? false) {

          if($filters['cathegory'] == 'my-recipes') {
           $query->where('user_id', auth()->user()->id);
          }

          if($filters['cathegory'] == 'favorites') {
            $query->join('favorite_recipe', 'recipes.id', '=', 'favorite_recipe.recipe_id')
              ->where('favorite_recipe.user_id', auth()->user()->id)
              ->select('recipes.*');
          }
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
              ->orWhere('ingredients', 'like', '%' . request('search') . '%')
              ;
        }

        return $query->distinct();
    }

    public function user () {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function favoritedBy()
    {
      return $this->belongsToMany(User::class, 'favorite_recipe', 'recipe_id', 'user_id')->withTimestamps();
    }

    public function ratings()
    {
      return $this->hasMany(UserRecipeRating::class, 'recipe_id');
    }
}
