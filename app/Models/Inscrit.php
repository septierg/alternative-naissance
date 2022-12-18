<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inscrits';

    protected $fillable = ['nom'];

    public function accompagnement()
    {
        return $this->belongsTo(Accompagnement::class, 'uid');
    }
}
