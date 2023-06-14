<?php

namespace App\Models;

use App\Enums\CatGenderEnum;
use App\Enums\CatStatusEnum;
use Database\Factories\CatFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Cat.
 * @property int $id
 * @property int $shelter_id
 * @property string $name
 * @property string $chip_number
 * @property string $gender
 * @property Carbon|null $birthday
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property Shelter $shelter
 */
class Cat extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @inheritdoc
     */
    protected $guarded = ['id'];

    /**
     * @inheritdoc
     */
    protected $casts = [
        'birthday' => 'date:Y-m-d',
        'gender' => CatGenderEnum::class,
        'status' => CatStatusEnum::class,
    ];

    protected static function newFactory(): Factory
    {
        return CatFactory::new();
    }

    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }
}
