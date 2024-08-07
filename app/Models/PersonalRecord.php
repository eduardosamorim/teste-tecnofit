<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    use HasFactory;

    protected $table = 'personal_record';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'user_id', 
        'movement_id', 
        'value', 
        'date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}