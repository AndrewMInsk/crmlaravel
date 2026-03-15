<?php

namespace App\Http\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class TicketsFilter extends AbstractFilter
{
    public const PHONE = 'phone';
    public const EMAIL = 'email';
    public const STATUS = 'status';
    public const DATE = 'date_from';


    protected function getCallbacks(): array
    {
        return [
            self::PHONE => [$this, 'phone'],
            self::EMAIL => [$this, 'email'],
            self::STATUS => [$this, 'status'],
            self::DATE => [$this, 'date'],
        ];
    }

public function phone(Builder $query, $value)
    {
        $query->whereHas('getCustomer', function ($q) use ($value) {
            $q->where('phone', 'like', '%'.$value.'%');
        });
    }

    public function email(Builder $query, $value)
    {
        $query->whereHas('getCustomer', function ($q) use ($value) {
            $q->where('email', 'like', '%'.$value.'%');
        });
    }
    public function status(Builder $query, $value)
    {
        $query->where('status', $value);
    }
    public function date(Builder $query, $value)
    {
        $query->whereDate('created_at', '>', Carbon::parse($value));
    }
}