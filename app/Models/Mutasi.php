<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mutasi extends Model
{
    use HasFactory;

    protected $table = 'mutasi';
    protected $fillable = ["tanggal", "jenis_mutasi", "jumlah", "id_user", "id_barang"];
    protected $primaryKey = "id_mutasi";

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'id_user', 'id_user');
    }
}
