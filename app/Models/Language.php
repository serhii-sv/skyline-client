<?php
/**
 * Copyright. "NewGen" investment engine. All rights reserved.
 * Any questions? Please, visit https://newgen.company
 */

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Language
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string|null $original_name
 * @property bool $default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reviews[] $reviews
 * @property-read int|null $reviews_count
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Language extends Model
{
    use Uuids;

    /** @var bool $incrementing */
    public $incrementing = false;
    public $keyType      = 'string';
    /** @var array $fillable */
    protected $fillable = [
        'name',
        'code',
        'original_name',
        'default'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'lang_id');
    }

    /**
     * @return mixed
     */
    public static function getDefault()
    {
        return self::where('default', 1)->first();
    }

    /**
     * @return void
     */
    public function createTranslation()
    {
        if (Storage::disk('lang')->exists('ru.json')) {
            $translations = Storage::disk('lang')->exists('ru.json');

            Storage::disk('lang')->put($this->code . '.json', $translations);
        }

        if (Storage::disk('lang')->exists('ru_manual.json')) {
            $translations = Storage::disk('lang')->exists('ru_manual.json');

            Storage::disk('lang')->put($this->code . '_manual.json', $translations);
        }

        try {
            $response = Http::post(env('CLIENT_SITE_URL') . 'translations/create-translations?api_token=' . auth()->user()->api_token, [
                'language_id' => $this->id
            ])->json();
        } catch (\Exception $exception) {

        }
    }
}
