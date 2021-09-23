<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
    'title',
    'description',
    'category',
    'ingredients',
    'steps'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ingredients' => 'array',
        'steps' => 'array'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function scopeSearch($query, $keywords)
    {
        return $query->where('title', 'LIKE', '%'.$keywords.'%')->orWhere('description', 'LIKE', '%'.$keywords.'%');
    }
}
