<?php

namespace App\Transformers;

use App\Models\Comment;
use App\Models\Post;
use League\Fractal\TransformerAbstract;
use Spatie\Activitylog\Models\Activity;

class ActivityTransformer extends TransformerAbstract
{

//    protected array $defaultIncludes = [
//        'subject',
//        'causer',
//    ];

    public function transform(Activity $model)
    {
        return [
            'id' => (int) $model->id,
            'log_name' => $model->log_name,
            'code_type' => $this->mapCodeType($model->subject_type, $model->subject),
            'description' => data_get($model, 'subject.content', $model->description),
            'subject_type' => $this->mapSubjectType($model->subject_type, $model->subject),
            'subject_id' => $model->subject_id,
            'date' => data_get($model, 'subject.date', $model->subject->created_at),
            'causer_name' => optional($model->causer)->name,
            'causer_id' => $model->causer_id,
        ];
    }

    public function mapSubjectType($type, $subject)
    {
        return match (true) {
            $type === Post::class && $subject->type == 1 => 'post 2',
            $type === Post::class => 'post',
            $type === Comment::class => 'comment',
            default => $type
        };
    }

    public function mapCodeType($type, $subject)
    {
        return match (true) {
            $type === Post::class && $subject->type == 1 => 'PO1',
            $type === Post::class => 'PO',
            $type === Comment::class => 'CMT',
            default => $type
        };
    }
}
