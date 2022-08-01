<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maklumat extends Model
{
    use HasFactory;

    protected $fillable = ['nama' , 'desc'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
