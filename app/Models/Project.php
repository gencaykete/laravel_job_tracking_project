<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Project
 *
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property float $price
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Customer|null $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProjectDeveloper[] $developers
 * @property-read int|null $developers_count
 */
class Project extends Model
{
    use HasFactory;

    protected $dates = ['start_date', 'end_date'];
    const STATUS_LIST = [
        1 => [
            'html' => '<span class="badge badge-light-success fw-bolder px-4 py-3">Aktif</span>',
            'text' => 'Aktif'
        ],
        2 => [
            'html' => '<span class="badge badge-light-warning fw-bolder px-4 py-3">Tamamlandı</span>',
            'text' => 'Tamamlandı'
        ],
        3 => [
            'html' => '<span class="badge badge-light-danger fw-bolder px-4 py-3">İptal Edildi</span>',
            'text' => 'İptal Edildi'
        ]
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function developers()
    {
        return $this->hasMany(ProjectDeveloper::class, 'project_id', 'id');
    }

    public function status($type = 'text')
    {
        return self::STATUS_LIST[$this->status][$type];
    }

    public function customerPaymentList()
    {
        return $this->hasMany(ProjectCustomerPayment::class, 'project_id', 'id');
    }

    public function payments($type)
    {
        $remain = 0;
        $paid = 0;

        foreach ($this->developers as $developer) {
            $remain += $developer->price + $developer->payments->where('type', 1)->sum('amount') - $developer->payments->where('type', 0)->sum('amount');
            $paid += $developer->payments->where('type', 0)->sum('amount');
        }

        return [
            'remain' => $remain,
            'paid' => $paid,
        ][$type];
    }

    public function customerPayments($type)
    {
        $received = $this->customerPaymentList()->where('type', 0)->sum('amount');
        $add = $this->customerPaymentList()->where('type', 1)->sum('amount');
        $cut = $this->customerPaymentList()->where('type', 2)->sum('amount');
        $remain = $this->price + $add - $cut - $received;

        return [
            'add' => $add,
            'cut' => $cut,
            'received' => $received,
            'remain' => $remain,
        ][$type];
    }

    public function calculateDeveloperPrice($developer_id)
    {
        $prices = [
            'total' => 0,
            'paid' => 0,
            'remain' => 0,
            'added' => 0,
            'cut' => 0
        ];

        $projectDeveloper = ProjectDeveloper::query()
            ->where('project_id', $this->id)
            ->where('developer_id', $developer_id)
            ->first();

        foreach ($projectDeveloper->payments as $payment) {
            switch ($payment->type) {
                case 0:
                    $prices['paid'] += $payment->amount;
                    break;
                case 1:
                    $prices['added'] += $payment->amount;
                    break;
                case 2:
                    $prices['cut'] += $payment->amount;
                    break;
            }
        }

        $prices['total'] = $projectDeveloper->price + $prices['added'] - $prices['cut'];
        $prices['remain'] = $prices['total'] - $prices['paid'];

        return $prices;
    }

    public function calculateCustomerPrice()
    {
        $prices = [
            'total' => 0,
            'paid' => 0,
            'remain' => 0,
            'added' => 0,
            'cut' => 0
        ];

        foreach ($this->customerPaymentList as $payment) {
            switch ($payment->type) {
                case 0:
                    $prices['paid'] += $payment->amount;
                    break;
                case 1:
                    $prices['added'] += $payment->amount;
                    break;
                case 2:
                    $prices['cut'] += $payment->amount;
                    break;
            }
        }

        $prices['total'] = $this->price + $prices['added'] - $prices['cut'];
        $prices['remain'] = $prices['total'] - $prices['paid'];

        return $prices;
    }

}
