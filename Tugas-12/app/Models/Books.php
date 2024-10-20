<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = ["title", "summary", "image", "release_year", "stock", "category_id"];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function listBorrows()
    {
        return $this->hasMany(Borrows::class, 'book_id');
    }
}
