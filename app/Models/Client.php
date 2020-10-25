<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = ['name', 'phone', 'adress'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function delivery()
    {
        return $this->hasMany(Delivery::class);
    }
}
