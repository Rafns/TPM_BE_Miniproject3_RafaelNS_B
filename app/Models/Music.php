<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $fillable = [
        "title","singer","publication_date", "duration", "category_id", "image"
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
