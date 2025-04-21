<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'usuario_id',
        'fecha',
        'total',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pedido) {
            $pedido->id = (string) Str::uuid(); // ✅ Soluciona el error
            $pedido->usuario_id = auth()->id();
        });
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id_usuario');
    }

    public function detalles()
    {
    return $this->hasMany(DetallePedido::class, 'pedido_id');
    } 

}
