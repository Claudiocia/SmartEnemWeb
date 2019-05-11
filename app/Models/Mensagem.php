<?php

namespace SmartEnem\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable =
        [
            'nome', 'emailcli', 'msg'
        ];
}
