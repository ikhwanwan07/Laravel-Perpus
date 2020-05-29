<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
