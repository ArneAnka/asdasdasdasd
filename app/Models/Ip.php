<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    use HasFactory;

    protected $table = 'users_ip';

    protected $fillable = ['address', 'agent'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
