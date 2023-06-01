<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class Office extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
        'name',
        'department_id',
    ];
    public $sortable = [
        'name',
        'department_id',
        'created_at'
    ];
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class, 'equipment_id');
    }
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
