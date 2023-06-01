<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class Department extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name',
    ];
    public $sortable = [
        'name',
        'created_at'
    ];
    public function offices(): HasMany
    {
        return $this->hasMany(Office::class);
    }
}
