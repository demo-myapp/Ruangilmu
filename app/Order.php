<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $appends = ['status_label', 'ref_status_label', 'commission'];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-secondary">New</span>';
        } elseif ($this->status == 1) {
            return '<span class="badge badge-primary">Confirmed</span>';
        }
        return '<span class="badge badge-success">Done</span>';
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getRefStatusLabelAttribute()
    {
        if ($this->ref_status == 0) {
            return '<span class="badge badge-secondary">Pending</span>';
        }
        return '<span class="badge badge-success">Dicairkan</span>';
    }

    public function getCommissionAttribute()
    {
        $commission = ($this->subtotal * 5) / 100;

        return $commission > 10000 ? 10000:$commission;
    }


}
