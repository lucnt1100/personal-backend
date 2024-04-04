<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class SubjectTransformer extends TransformerAbstract
{
    public function transform($model)
    {
        return [
            'id' => (int) $model->id,
            'date' => $model->date,
        ];
    }
}
