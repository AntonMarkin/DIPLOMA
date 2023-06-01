<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kyslik\ColumnSortable\Sortable;

class Request extends Model
{
    use HasFactory,  Sortable;
    protected $fillable = [
        'user_id',
        'status_id',
        'name',
        'description',
        'technician_id',
        'comment'
    ];
    public $sortable = [
        'id',
        'status_id',
        'user_id',
        'name',
        'created_at',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function technician(): BelongsTo
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function equipment(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, 'request_equipment');
    }
}
