<?php

namespace App\Models;

use App\Traits\DynamicActivityLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use DynamicActivityLog;

    protected $fillable =
        [
            'title',
            'content',
            'date',
            'type',
        ];
}
