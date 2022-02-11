<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    public $table="blog_translations";
    public $timestamps = false;
    public $guarded=[];
}