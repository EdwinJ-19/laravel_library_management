<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'title',
        'author',
        'r_status',
        'publisher',
        'image',
    ];

    public function alloted_books():BelongsToMany{
        return $this->belongsToMany(Book::class,'students');
    }
    // public function alloted_books():HasMany{
    //     return $this->hasMany(Book::class,'students');
    // }
}
