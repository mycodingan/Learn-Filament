<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomorModel extends Model
{
    use HasFactory;
    protected $table = 'cutomer';
    protected $guarded = [];

    public function detail(){
        return $this->hasMany(DetailFaktur::class);
    }
}
