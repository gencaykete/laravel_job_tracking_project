<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProjectCustomerPayment
 *
 * @property int $id
 * @property int $project_id
 * @property float $amount
 * @property int $type
 * @property string|null $description
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectCustomerPayment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectCustomerPayment extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
