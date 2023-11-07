<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject_id',
        /* 'student_id', */
        'day',
        'date_start',
        'date_end',
        'room',
        'attendance_code',
        'academic_year',
        'semester',
        'created_by',
        'updated_by',
    ];

    //belongto
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function student(){
        return $this->belongsTo(User::class);
    }
}
