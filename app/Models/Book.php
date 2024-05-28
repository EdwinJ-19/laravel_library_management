<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'author',
        'publisher',
        'status',
        'image',
    ];
    
    // public function student(){
    //     return $this->belongsTo(Student::class);
    // }
}
