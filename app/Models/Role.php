<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public static function where(string $string, string $string1)
    {
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
