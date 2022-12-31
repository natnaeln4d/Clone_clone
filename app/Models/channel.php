<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function FunctionName()
    {
        return $this->belongsTo(User::class);
    }
}
