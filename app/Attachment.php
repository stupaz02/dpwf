<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable =['post_id', 'file_name'];

    public function post() {
        return $this->belongsTo(Post::class);
     }
}
