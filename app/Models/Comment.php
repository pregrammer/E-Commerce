<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'email',
        'name',
        'product_id',
        'weblog_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function weblog()
    {
        return $this->belongsTo(Weblog::class);
    }

}
