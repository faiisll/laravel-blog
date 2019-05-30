<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{   
    use SoftDeletes;
    protected $table = 'article';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'category_id',
        'user_id',
        'judul',
        'isi',
        'header_image',
        'status'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
