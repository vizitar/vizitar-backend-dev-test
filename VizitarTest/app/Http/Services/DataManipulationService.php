<?php

namespace App\Http\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DataManipulationService
{

    public function filterSortAndPaginate(Model $model, Request $request): LengthAwarePaginator
    {
        $query = $model::query();

        $tableColumns = Schema::getColumnListing($model->getTable());

        foreach ($tableColumns as $column) {
            if ($request->has($column)) {
                $query->where($column, 'like', '%' . $request->input($column) . '%');
            }
        }

        if ($request->has('sort_by') && $request->has('sort_order')) {
            $query->orderBy($request->input('sort_by'), $request->input('sort_order'));
        }

        return $query->paginate(10);
    }
}
