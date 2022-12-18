<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccouchementPersonnesPrevues extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accouchement_personnes_prevues';
    protected $fillable =
        [
        'nom',

        ];
}
