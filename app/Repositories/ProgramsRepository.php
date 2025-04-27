<?php

namespace App\Repositories;

use App\Models\Programs;
use App\Repositories\BaseRepository;

class ProgramsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Programs::class;
    }
}
