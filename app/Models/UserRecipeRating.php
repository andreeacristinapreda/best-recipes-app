<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRecipeRating extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'recipe_id', 'rating'];
    public $incrementing = false;
    protected $primaryKey = ['user_id', 'recipe_id'];

    protected function setKeysForSaveQuery($query)
    {
      return $query->where('user_id', $this->getAttribute('user_id'))
        ->where('recipe_id', $this->getAttribute('recipe_id'));
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function recipe()
    {
      return $this->belongsTo(Recipe::class);
    }
}
