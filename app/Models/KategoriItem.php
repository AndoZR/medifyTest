<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriItem extends Model
{
    use HasFactory;

    protected $table = 'kategori_items';

    protected $fillable = ['kode', 'nama'];

    protected static function booted()
    {
        static::created(function ($kategori) {
            // update kode dengan id kalau belum ada
            if (!$kategori->kode) {
                $kategori->kode = $kategori->id;
                $kategori->save();
            }
        });
    }

    public function masterItems()
    {
        return $this->belongsToMany(MasterItem::class, 'kategori_master_item', 'kategori_item_id', 'master_item_id');
    }
}
