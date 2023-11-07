<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendenceSubjects extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'schedule_id',
        'student_id',
        'attendence_code',
        'academic_year',
        'semester',
        'pertemuan',
        'status',
        'keterangan',
        'latitude',
        'longitude',
        'nilai',
    ];

    //belongto
    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function student(){
        return $this->belongsTo(User::class);
    }
}
