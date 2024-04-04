<?php

namespace App\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{

    public function transform(Post $model)
    {
        return [
            'id' => (int) $model->id,
            'title' =>  $model->title,
            'content' =>  $model->content,
            'date' =>  $model->date,
            'type' => $model->type,
        ];
    }
}
