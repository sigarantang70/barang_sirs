<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helpdesk extends Model
{
    use HasFactory;

    protected $table = 'helpdesk_sirs';
    const CREATED_AT = 'waktu_pengajuan';
    const UPDATED_AT = 'date_updated';

    public $timestamp = false;
}
