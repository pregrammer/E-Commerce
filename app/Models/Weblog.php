<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weblog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'groupKind',
        'image',
        'description',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
