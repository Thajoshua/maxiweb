<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['balance', 'deposits', 'withdrawals', 'total_profit', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
