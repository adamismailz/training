<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maklumat extends Model
{
    use HasFactory;

    protected $fillable = ['nama' , 'desc'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    protected function desc(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
        );
    }

    protected function nama(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
        );
    }
}
