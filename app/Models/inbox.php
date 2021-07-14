<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inbox extends Model
{
    use HasFactory;
    // protected $fillable = ['id', 'content', 'content_type', 'meta_id', 'create_by', 'status', 'meta_data', 'send_to'];

    public function MetaInbox()
    {
        return $this->hasMany(metainbox::class);
    }

    public function User()
    {
        return $this->hasMany(User::class);
    }
}