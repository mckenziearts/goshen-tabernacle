<?php

namespace App\Support;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection as BaseCollection;

final class Collection extends BaseCollection
{
    public function paginate(int $perPage, int $total = null, int $page = null, string $pageName = 'page'): LengthAwarePaginator
    {
        $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

        return new LengthAwarePaginator(
            $this->forPage($page, $perPage),
            $total ?: $this->count(),
            $perPage,
            $page,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ]
        );
    }
}
