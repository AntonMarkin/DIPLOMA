<?php

namespace App\Models;

use App\Models\Scopes\NotDeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class EquipmentType extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
        'name',
        'is_deleted',
    ];
    public $sortable = [
        'name',
        'is_deleted',
        'created_at'
    ];
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new NotDeletedScope);
    }
    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class, 'equipment_type_id');
    }
}
