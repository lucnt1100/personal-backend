<?php

namespace App\Models;

use App\Traits\DynamicActivityLog;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use DynamicActivityLog;
    protected $fillable =
        [
            'post_id',
            'body'
        ];

    public function post()
    {
        $this->belongsTo(Post::class);
    }
}
