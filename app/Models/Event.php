<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'image',
        'kategori',
        'kode_event',
        'email',
        'no_tlp',
    ];

    public function jenis()
    {
        return $this->hasMany('App\Jenis');
    }
}
