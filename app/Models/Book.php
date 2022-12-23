<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // name table
    protected $table = 'books';

    // the primary key of the books table
    protected $primaryKey = 'id';

    // use timestamp
    protected $timestamp = true;

    // the column that fillable
    protected $fillable = ['title', 'author', 'publish_date', 'publisher', 'total_pages', 'synopsis', 'cover', 'availability', 'genre_id'];
}
