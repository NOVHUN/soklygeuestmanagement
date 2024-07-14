<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingService extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'booking_services';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'service.name',
        'quantity',
        'price',
    ];

    protected $filterable = [
        'id',
        'booking.phone_number',
        'service.name',
        'quantity',
        'price',
    ];

    protected $fillable = [
        'service_id',
        'quantity',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function booking()
    {
        return $this->belongsToMany(Booking::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
