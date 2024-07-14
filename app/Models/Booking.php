<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'bookings';

    protected $appends = [
        'status_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'phone_number',
        'customer_name',
        'total_price',
        'status',
        'promotion.code',
    ];

    protected $filterable = [
        'id',
        'user.phone',
        'phone_number',
        'customer_name',
        'total_price',
        'status',
        'promotion.code',
    ];

    protected $fillable = [
        'phone_number',
        'customer_name',
        'total_price',
        'status',
        'promotion_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_RADIO = [
        [
            'label' => 'Pending',
            'value' => 'pending',
        ],
        [
            'label' => 'Confirmed',
            'value' => 'confirmed',
        ],
        [
            'label' => 'Completed',
            'value' => 'completed',
        ],
        [
            'label' => 'Cancelled',
            'value' => 'cancelled',
        ],
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function getStatusLabelAttribute()
    {
        return collect(static::STATUS_RADIO)->firstWhere('value', $this->status)['label'] ?? '';
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
