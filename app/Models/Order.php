<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'PEDIDO';
    protected $primaryKey = 'PEDIDO_ID';
    protected $fillable = ['USUARIO_ID', 'STATUS_ID', 'PEDIDO_DATA'];
    public $timestamps = false;
    protected $casts = [
        'PEDIDO_DATA' => 'date'
    ];
    

    public function User(){
        return $this->belongsTo('App\Models\User', 'USUARIO_ID', 'USUARIO_ID');
    }

    public function OrderStatus(){
        return $this->belongsTo('App\Models\OrderStatus', 'STATUS_ID', 'STATUS_ID');
    }

    public function OrderItems(){
        return $this->hasMany('App\Models\OrderItems', 'PEDIDO_ID', 'PEDIDO_ID');
    }
}
