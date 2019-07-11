<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function getFormattedStatusAttribute()
    {
        switch ($this->status) {
            case 'pending':
                return 'Pendente';
                break;
            case 'delivered':
                return 'Entregue';
                break;
            case 'cancel':
                return 'Cancelado';
                break;

            default:
                # code...
                break;
        }
    }

    public function getStatusPaidAttribute()
    {

        return $this->paid ? 'Pago' : 'Pendente';
    }

    public function setTrackCodeAttribute($value){

        $this->attributes['track_code'] = "#{$value}";
    }
}
