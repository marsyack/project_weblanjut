<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
<<<<<<< HEAD
    //
}
=======
    protected $fillable = ['name'];

    // Kategori ini mencakup (belongsToMany) Campaign apa saja?
    public function campaigns()
    {
        // Parameter kedua adalah nama tabel pivot yang kita buat di migration
        return $this->belongsToMany(Campaign::class, 'campaign_category');
    }
}
>>>>>>> 0158a55ede74be15b11e3731810d53d6487a2851
