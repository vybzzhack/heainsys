<?php

namespace App\Repositories;

use App\Models\Enrollments;
use App\Repositories\BaseRepository;

class EnrollmentsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'client_id',
        'program_id',
        'enrolled_at'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Enrollments::class;
    }
}
