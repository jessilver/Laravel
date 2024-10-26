<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'title',
        'valor',
        'description',
        'address_id',
        'user_id'
    ];

    protected $hidden = [
        'address_id',
        'user_id'
    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
