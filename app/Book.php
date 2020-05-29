<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guard = [];
    protected $fillable = ['author_id', 'title', 'description', 'cover', 'qty'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function getCover()
    {
        if (substr($this->cover, 0, 5) == "https") {
            return $this->cover;
        }
        if ($this->cover) {
            return asset($this->cover);
        }
    }
    public function borrowed()
    {
        return $this->belongsToMany(User::class, 'borrow_history')->withTimestamps();
    }
}
