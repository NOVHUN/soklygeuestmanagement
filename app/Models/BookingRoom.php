<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingRoom extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'booking_rooms';

    protected $orderable = [
        'id',
        'check_in_date',
        'check_out_date',
        'actual_check_in_date',
        'actual_check_out_date',
        'price',
    ];

    protected $dates = [
        'check_in_date',
        'check_out_date',
        'actual_check_in_date',
        'actual_check_out_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'check_in_date',
        'check_out_date',
        'actual_check_in_date',
        'actual_check_out_date',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'id',
        'booking.phone_number',
        'room.description',
        'check_in_date',
        'check_out_date',
        'actual_check_in_date',
        'actual_check_out_date',
        'price',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function booking()
    {
        return $this->belongsToMany(Booking::class);
    }

    public function room()
    {
        return $this->belongsToMany(Room::class);
    }

    public function getCheckInDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setCheckInDateAttribute($value)
    {
        $this->attributes['check_in_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getCheckOutDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setCheckOutDateAttribute($value)
    {
        $this->attributes['check_out_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getActualCheckInDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setActualCheckInDateAttribute($value)
    {
        $this->attributes['actual_check_in_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getActualCheckOutDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setActualCheckOutDateAttribute($value)
    {
        $this->attributes['actual_check_out_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
