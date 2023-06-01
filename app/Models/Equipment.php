<?php

namespace App\Models;

use App\Models\Scopes\NotDeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kyslik\ColumnSortable\Sortable;

class Equipment extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
        'name',
        'equipment_type_id',
        'office_id',
        'description',
        'is_deleted'
    ];
    public $sortable = [
        'name',
        'equipment_type_id',
        'office_id',
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
    public function type(): BelongsTo
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_type_id');
    }
    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }
    public function requests(): BelongsToMany
    {
        return $this->belongsToMany(Request::class);
    }

}
