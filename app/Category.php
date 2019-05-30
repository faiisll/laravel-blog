<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'nama',
        'deskripsi',
        'header_image'
    ];

    public function article(){
        return $this->hasMany('App\Article');
    }
}
