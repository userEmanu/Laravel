<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'attraction_id',
        'cantidad_boletos',
        'precio',
    ];

    public function attraction()
    {
        return $this->belongsTo(Attraction::class);
    }
}
