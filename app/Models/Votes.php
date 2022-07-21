<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    use HasFactory;

    protected $table = 'votes';
    protected $fillable = ['created_at'];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
