<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metainbox extends Model
{
    use HasFactory;
    public function Inboxs()
    {
        return $this->belongsTo(inbox::class);
    }
}