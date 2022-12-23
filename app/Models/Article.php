<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable=['title','content'];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
