<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ProjectDeveloperPayment
 *
 * @property int $id
 * @property int $project_developer_id
 * @property float $amount
 * @property int $type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment whereProjectDeveloperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $file
 * @property-read \App\Models\Developer|null $developer
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloperPayment whereFile($value)
 * @property-read \App\Models\ProjectDeveloper|null $projectDeveloper
 */
class ProjectDeveloperPayment extends Model
{
    use HasFactory;

    public function projectDeveloper()
    {
        return $this->hasOne(ProjectDeveloper::class, 'id', 'project_developer_id');
    }
}
