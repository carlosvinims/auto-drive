<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function veiculo(): HasMany
    {
        return $this->hasMany(Veiculo::class);
    }
}
