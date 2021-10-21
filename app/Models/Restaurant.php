<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'description',
        'city',
        'phone',
        'category_id',
        'delivery',
        'schedule',
        'latitude',
        'longitude',
        'logo',
        'facebook',
        'twitter',
        'instagram',
        'youtube'
    ];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeOwned($query,$owner){
        return $query->where('user_id','=',$owner);
    }
}
