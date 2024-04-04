<?php

namespace App\Http\Controllers;

use App\Transformers\ActivityTransformer;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Models\Activity;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ActivitiesController extends Controller
{
    public function index()
    {
        $data = QueryBuilder::for(Activity::class)
            ->allowedFilters([
                AllowedFilter::scope('in_log'),
                AllowedFilter::callback('subject_type', function (Builder $query, $value) {
                    $query->where('subject_type', $value);
                }),
            ])
            ->get();

        return responder()->success($data, ActivityTransformer::class)->respond();
    }
}
