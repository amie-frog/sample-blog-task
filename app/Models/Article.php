<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    //
     use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class,'categories_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFilter($q,$v)
    {
        if($v)
        {
            return $q->where('title','like' ,'%' . $v . '%')
                    ->orWhere('full_text','like','%'.$v.'%');
        }
        return $q;
    }
}
