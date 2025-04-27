<?php

namespace App\Repositories;

use App\Models\Clients;
use App\Repositories\BaseRepository;

class ClientsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Clients::class;
    }
}
