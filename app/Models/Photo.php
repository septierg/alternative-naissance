<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $uploads = '/images/';
    protected $table = 'photo';
    protected $fillable = [
        'file',
    ];

    //create function to get the directory of the picture
    public function getFileAttribute($photo){
        return $this->uploads .$photo;
    }
}
