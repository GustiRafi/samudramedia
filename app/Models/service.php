<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function detail() {
        return $this->hasMany(Detailservice::class, 'service_id', 'id');
    }

    public function paket() {
        return $this->hasMany(paketService::class, 'service_id', 'id');
    }
}
