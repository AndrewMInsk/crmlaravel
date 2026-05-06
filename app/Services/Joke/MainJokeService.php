<?php

namespace App\Services\Joke;

use App\Models\Customer;
use App\Models\Post;
use App\Models\Ticket;
use App\Services\ServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MainJokeService implements ServiceInterface
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $customer = Customer::where('email', $data['email'])->orWhere('phone', $data['phone'])->first();
            if ($customer) {
                $lastTicket = $customer->last_ticket_at;
                if ($lastTicket && Carbon::parse($lastTicket)->diffInHours(Carbon::now('Europe/Minsk')) < 24) {
                    throw new \Exception('Не нужно спамить');
                }
            }

            $customer = Customer::firstOrCreate(['email' => $data['email']], $data);

            $ticket = new Ticket($data);
            $ticket->getCustomer()->associate($customer);
            if (isset($data['image'])) {
                $ticket->addMedia($data['image'])->toMediaCollection('images');
            }

            $ticket->save();

            $customer->last_ticket_at = Carbon::now('Europe/Minsk');
            $customer->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        // что бы подтянулся статус

        return $ticket->fresh();
    }


}