<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class TerefdasQurum extends Model implements TranslatableContract
{
    use HasFactory;

    use Translatable;

    public $guarded=[];

    public $translatedAttributes = ['name'];

}
