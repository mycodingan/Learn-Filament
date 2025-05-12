<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FakturModel extends Model
{
    // penamabahan sebuah soft delet  untuk menagani error berikut
    //Call to undefined method Illuminate\Database\Eloquent\Builder::withoutTrashed()

    use HasFactory, SoftDeletes;

    protected $table =  'faktur';

    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(CustomorModel::class, 'cutomer_id');
    }
    public function detail()
    {
        return $this->hasMany(DetailFaktur::class, 'faktur_id'); // foreign key yg benar
    }
}
