<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public $fillable = [
        'pdf_file_link',
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
