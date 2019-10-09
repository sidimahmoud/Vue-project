<?php

namespace App\Modules;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
interface BaseRepository
{
    public function get();
    public function paginate(): LengthAwarePaginator;
}
