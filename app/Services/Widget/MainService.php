<?php

namespace App\Services\Widget;

use App\Models\Customer;
use App\Models\Post;
use App\Models\Ticket;
use App\Services\ServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MainService implements ServiceInterface
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $customer = Customer::firstOrCreate(['email' => $data['email']], $data);

            $ticket = new Ticket($data);
            $ticket->getCustomer()->associate($customer);
            $ticket->addMedia($data['image'])->toMediaCollection('images');

            $ticket->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        // что бы подтянулся статус

        return $ticket->fresh();
    }

    public function dateFilter($period): Collection
    {
        switch ($period) {
            case 'day':
                $startDate = Carbon::now()->subDays(1);
                $endDate = Carbon::now();
                break;
            case 'week':
                $startDate = Carbon::now()->subDays(7);
                $endDate = Carbon::now();
                break;
            case 'month':
                $startDate = Carbon::now()->subDays(30);
                $endDate = Carbon::now();
                break;
            default:
                $startDate = Carbon::now()->subDays(365);
                $endDate = Carbon::now();
        }
        return Ticket::createdBetween($startDate, $endDate)->get();
    }
}