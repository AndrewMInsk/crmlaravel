<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['phone', 'email', 'customer_name'];

    public function getTickets():BelongsToMany{
        return $this->hasMany(Ticket::class);
    }
    public function getNameAdd():string
    {
        return $this->name;
    }
}
