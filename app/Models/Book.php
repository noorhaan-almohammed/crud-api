<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'auther',
        'description'
    ];
    public function scopeByAuther($query,$auther){
        return $query->where('auther',$auther);
    }

}
