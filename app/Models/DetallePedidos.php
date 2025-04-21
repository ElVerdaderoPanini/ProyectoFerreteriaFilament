<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class DetallePedidos extends Model
{
    use HasFactory;

    protected $table = 'detalle_pedidos';
    protected $primaryKey = 'id';
    public $incrementing = false; // Porque usamos UUID
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'pedido_id',
        'material_id',
        'cantidad',
    ];

    // Generar UUID automáticamente
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($detalle) {
            $detalle->id = (string) Str::uuid();
        });
    }

    // Relación con Pedido
    public function pedido()
    {
        return $this->belongsTo(Pedidos::class, 'pedido_id');
    }

    // Relación con Material
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
