<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public $table = 'clients';

    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address'
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string'
    ];

    public static array $rules = [
        'first_name' => 'nullable|string|max:100',
        'last_name' => 'nullable|string|max:100',
        'email' => 'nullable|string|max:50',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function enrollments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Enrollment::class, 'client_id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
