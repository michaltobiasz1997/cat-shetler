<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Propaganistas\LaravelPhone\Casts\RawPhoneNumberCast;

/**
 * Class Employee.
 * @property int $id
 * @property int $shelter_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $country
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property Shelter $shelter
 */
class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ClearsResponseCache;

    /**
     * @inheritdoc
     */
    protected $guarded = ['id'];

    /**
     * @inheritdoc
     */
    protected $casts = [
        'phone' => RawPhoneNumberCast::class.':country',
    ];

    protected static function newFactory(): Factory
    {
        return EmployeeFactory::new();
    }

    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }

    protected function cacheForgetUrls(): array|string
    {
        return [
            'api/employees',
            "api/employees/{$this->id}",
        ];
    }
}
