<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UkuranBahan extends Model
{
    protected $table = 'ukuran_bahan';

    protected $fillable = [
        'nama','jenis_bahan_id'
    ];
}