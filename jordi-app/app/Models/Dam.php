<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dam extends Model
{
    protected $fillable = [
        "lenguajes_marcas_grade",
        "sistemas_informaticos_grade",
        "fol_student_count",
        "desarrollo_interfaces_status"
    ];
}
