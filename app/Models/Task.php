<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Definindo os atributos que podem ser preenchidos em massa
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];
}
