<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignAccount extends Model
{
<<<<<<< HEAD
    //
=======
    // Mass Assigment: kolom yang boleh diisi melalu form
    protected $fillable = [
        'campaign_id',
        'bank_name',
        'account_number',
        'account_holder'
    ];

    //Relasi kebalikan: Rekening ini milik (belongsTo) Campaign apa?
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
>>>>>>> 0158a55ede74be15b11e3731810d53d6487a2851
}
