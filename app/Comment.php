<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = [
        'article_id',
        'nama',
        'email',
        'status',
        'komentar'
    ];

    public function article(){
        return $this->belongsTo('App\Article');
    }
}
