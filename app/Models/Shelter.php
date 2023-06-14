<?php

namespace App\Models;

use App\Enums\ShelterStatusEnum;
use App\Observers\ShelterObserver;
use App\Traits\ClearsResponseCache;
use Database\Factories\ShelterFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Shelter.
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $street
 * @property string $house
 * @property string $zipcode
 * @property string $city
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property Collection|Cat[] $cats
 * @property Collection|Employee[] $employees
 */
class Shelter extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ClearsResponseCache;

    /**
     * @inheritdoc
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'status' => ShelterStatusEnum::class,
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['cats', 'employees'];

    protected static function booted(): void
    {
        self::observe(ShelterObserver::class);
    }

    protected static function newFactory(): Factory
    {
        return ShelterFactory::new();
    }

    public function cats(): HasMany
    {
        return $this->hasMany(Cat::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    protected function cacheForgetUrls(): array|string
    {
        return [
            'api/shelters',
            "api/shelters/{$this->id}",
        ];
    }
}
