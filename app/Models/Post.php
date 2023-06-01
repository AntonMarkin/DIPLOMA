<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Testing\Fluent\Concerns\Has;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Ui\UiServiceProvider;

class Post extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
         'name',
    ];
    public $sortable = [
        'name',
        'created_at'
    ];
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
