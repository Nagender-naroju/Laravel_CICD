<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpModel extends Model
{
    protected $table="otp_verifications";

    protected $fillable = [
        'number',
        'otp',
        'expries_at'
    ];
}
