<?php
namespace App\Services\Widget;

use App\Models\Customer;
use App\Models\Post;
use App\Models\Ticket;
use App\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;

class MainService implements ServiceInterface
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $customer = new Customer($data);
            $customer->save();

            $ticket = new Ticket($data);
            $ticket->getCustomer()->associate($customer);

            $ticket->save();
            DB::commit();

        }
        catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return $ticket;
    }
}