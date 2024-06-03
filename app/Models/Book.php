<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\User;


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
    
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
