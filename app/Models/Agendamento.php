<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable=
    [
        'data',
        'horario',
        'cliente_id',
        
    ];
    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

}
