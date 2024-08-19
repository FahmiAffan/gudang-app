<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";
    protected $fillable = ["nama_barang", "kode", "kategori", "lokasi"];
    protected $primaryKey = "id_barang";

    public function mutasi(): HasMany
    {
        return $this->hasMany(Mutasi::class, 'id_barang', 'id_barang');
    }
}
