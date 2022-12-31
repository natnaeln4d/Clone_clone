<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;
    protected $fillable=['file','title','description','user_id'];
    public function user()
    {
       return $this->belongsTo(channel::class);
    }
     public function comment()
     {
     return $this->hasMany(Comment::class);
     }
    public static function makeDirectory()
    {

        $subFolder='videos/'.date('Y/m/d');
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }
    public static function getDimention($video)
    {
        [$width,$height]=getimagesize(Storage::path($video));
          return $width ."X". $height;

    }
   
    public function scopepublished($query)
    {
       return $query->where('is_published',true); // name implinces
    }
}
