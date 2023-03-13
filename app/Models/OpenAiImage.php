<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenAiImage extends Model
{
    use HasFactory;

    public $fillable = ['image', 'user_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
