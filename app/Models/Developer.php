<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * App\Models\Developer
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string|null $bank
 * @property int $status
 * @property string|null $profile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Developer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Developer extends Authenticatable
{
    use HasFactory;
}
