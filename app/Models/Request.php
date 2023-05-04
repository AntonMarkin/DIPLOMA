<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status_id',
        'name',
        'description',
    ];

    static public function changeStatus($id, $statusId)
    {
        return Request::where('id', $id)->update(['status_id' => $statusId]);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
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
