<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Enrollments extends Model
{
    public $table = 'enrollments';

    public $fillable = [
        'client',
        'program',
        'enrolled_at'
    ];

    protected $casts = [
        'enrolled_at' => 'datetime'
    ];

    public static array $rules = [
        'client_id' => 'nullable',
        'program_id' => 'nullable',
        'enrolled_at' => 'required'
    ];

    public function program()
    {
        return $this->belongsTo(Programs::class, 'name');
    }

    public function client()
    {
        return $this->belongsTo(Clients::class, 'full_name');
    }

    public function getEnrolledDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
