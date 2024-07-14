<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Payment extends Model implements HasMedia
{
    use HasAdvancedFilter, SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'payments';

    protected $dates = [
        'payment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'receipt_image',
        'status_label',
        'payment_type_label',
        'payment_method_label',
    ];

    protected $orderable = [
        'id',
        'amount',
        'payment_date',
        'status',
        'payment_type',
        'payment_method',
    ];

    protected $fillable = [
        'amount',
        'payment_date',
        'status',
        'payment_type',
        'payment_method',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'id',
        'booking.phone_number',
        'amount',
        'payment_date',
        'status',
        'payment_type',
        'payment_method',
        'processed_by.email',
    ];

    public const STATUS_RADIO = [
        [
            'label' => 'Approved',
            'value' => 'approved',
        ],
        [
            'label' => 'Rejected',
            'value' => 'rejected',
        ],
        [
            'label' => 'Pending',
            'value' => 'pending',
        ],
    ];

    public const PAYMENT_TYPE_RADIO = [
        [
            'label' => 'Booking',
            'value' => 'booking',
        ],
        [
            'label' => 'Check-in',
            'value' => 'check-in',
        ],
        [
            'label' => 'Check-out',
            'value' => 'check-out',
        ],
    ];

    public const PAYMENT_METHOD_RADIO = [
        [
            'label' => 'cash',
            'value' => 'cash',
        ],
        [
            'label' => 'card',
            'value' => 'card',
        ],
        [
            'label' => 'bank_transfer',
            'value' => 'bank_transfer',
        ],
        [
            'label' => 'khqr_code',
            'value' => 'khqr_code',
        ],
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function booking()
    {
        return $this->belongsToMany(Booking::class);
    }

    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getReceiptImageAttribute()
    {
        return $this->getMedia('payment_receipt_image')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getStatusLabelAttribute()
    {
        return collect(static::STATUS_RADIO)->firstWhere('value', $this->status)['label'] ?? '';
    }

    public function getPaymentTypeLabelAttribute()
    {
        return collect(static::PAYMENT_TYPE_RADIO)->firstWhere('value', $this->payment_type)['label'] ?? '';
    }

    public function getPaymentMethodLabelAttribute()
    {
        return collect(static::PAYMENT_METHOD_RADIO)->firstWhere('value', $this->payment_method)['label'] ?? '';
    }

    public function processedBy()
    {
        return $this->belongsToMany(User::class);
    }
}
