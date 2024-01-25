<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCustomerPayment;
use App\Models\ProjectDeveloper;
use App\Models\ProjectDeveloperPayment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalPayment = Project::where('customer_id', auth('customer')->id())->sum('price');
        $paid = 0;
        $add = 0;
        $sub = 0;

        $payments = ProjectCustomerPayment::query()
            ->whereHas('project', function ($q) {
                $q->where('customer_id', auth('customer')->id());
            })
            ->get();

        foreach ($payments as $pd) {
            if ($pd->type == 0) {
                $paid += $pd->amount;
            } elseif ($pd->type == 1) {
                $add += $pd->amount;
            } elseif ($pd->type == 2) {
                $sub += $pd->amount;
            }
        }

        $activeProject = Project::query()
            ->where('customer_id', auth('customer')->id())
            ->where('status', 1)
            ->count();

        $completedProject = Project::query()
            ->where('customer_id', auth('customer')->id())
            ->where('status', 2)
            ->count();

        $canceledProject = Project::query()
            ->where('customer_id', auth('customer')->id())
            ->where('status', 3)
            ->count();

        $lastActions = ProjectCustomerPayment::latest()
            ->wherehas('project', function ($q) {
                $q->where('customer_id', auth('customer')->id());
            })
            ->take(10)
            ->get();

        return view('customer.home', compact('totalPayment', 'paid', 'add', 'sub', 'activeProject', 'completedProject', 'canceledProject', 'lastActions'));
    }
}
