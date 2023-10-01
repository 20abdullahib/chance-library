<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $fillable = [
        // '_token',
        'subject_name',
        'description',
        'academic_subject_code',
        'department_id',
        'category_id',
        'professor_id'
        ] ;
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
