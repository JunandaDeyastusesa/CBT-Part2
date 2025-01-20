<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCourseProgress extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel
    protected $table = 'user_course_progress';

    // Kolom yang boleh diisi
    protected $fillable = [
        'user_id',
        'course_id',
        'remaining_time',
        'status',
    ];

    // Status enum
    const STATUS_ONGOING = 'ongoing';
    const STATUS_FINISHED = 'finished';

    // Relasi ke User (banyak ke satu)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Course (banyak ke satu)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
