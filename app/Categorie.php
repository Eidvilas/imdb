<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function user() {
        return $this->belongsTo('Blog\User');
    }
}
