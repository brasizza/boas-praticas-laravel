<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('status', function(Builder $builder){

            $builder->where('status', '<>','cancel');
        });
    }
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
 /*
 * @param Builder $query
 * return Builder
 */
    public function scopePending( $query){
        return $query->where('status','pending');
    }

    public function scopeDelivered($query){
        return $query->where('status', 'delivered');
    }

    public function scopePaid($query){
        return $query->where('paid', true);
    }

    public function scopeStatus($query,$status){
        return $query->where('status', '=', $status);
    }
}
