<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFormation extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_formations';
    protected $fillable = [
        'file',
    ];

    public function photo(){

        return $this->belongsTo('App\Models\Photo');
    }
}

