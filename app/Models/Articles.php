<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    public $table = 'articles';
    protected $fillable = [
        'title',
        'abstract',
        'content', 
        'category_id',
        'cover_image',
        'user_id'
    ];
}