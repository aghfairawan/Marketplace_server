<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['merchant_id', 'menu_id', 'office_id', 'quantity', 'delivery_date'];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}

