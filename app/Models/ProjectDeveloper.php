<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProjectDeveloper
 *
 * @property int $id
 * @property int $project_id
 * @property int $developer_id
 * @property float $price
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper whereDeveloperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectDeveloper whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Developer|null $developer
 * @property-read \App\Models\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProjectDeveloperPayment[] $payments
 * @property-read int|null $payments_count
 */
class ProjectDeveloper extends Model
{
    use HasFactory;

    protected $dates = ['start_date', 'end_date'];

    public function developer()
    {
        return $this->hasOne(Developer::class, 'id', 'developer_id');
    }

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function payments()
    {
        return $this->hasMany(ProjectDeveloperPayment::class, 'project_developer_id', 'id');
    }
}
