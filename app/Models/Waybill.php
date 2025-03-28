<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Waybill extends Model
{
    //
    use HasFactory;

    protected $fillable =[
        'waybill_no',
        'consignee_id',
        'shipper_id',
        'user_id',
        'shipment',
        'price',
        'cbm',
        'status'
    ];
}
