<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class TicketsFilter extends AbstractFilter
{
    public const PHONE = 'phone';
    public const EMAIL = 'email';
    public const STATUS = 'status';


    protected function getCallbacks(): array
    {
        return [
            self::PHONE => [$this, 'phone'],
            self::EMAIL => [$this, 'email'],
            self::STATUS => [$this, 'status'],
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
}