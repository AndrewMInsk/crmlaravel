<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ticket extends Model implements HasMedia

{
    use SoftDeletes;
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['theme', 'text'];
    public function getCustomer():BelongsTo{
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function scopeCreatedBetween(Builder $query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }
}
