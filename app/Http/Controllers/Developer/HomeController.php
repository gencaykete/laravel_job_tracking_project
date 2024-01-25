<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectDeveloper;
use App\Models\ProjectDeveloperPayment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $income = ProjectDeveloper::where('developer_id', auth('developer')->id())->sum('price');
        $remain = 0;

        foreach (ProjectDeveloperPayment::whereHas('projectDeveloper', function ($q) {
            $q->where('developer_id', auth('developer')->id());
        })->get() as $pd) {
            if ($pd->type == 0) {
                $remain += $pd->amount;
            } elseif ($pd->type == 1) {
                $income += $pd->amount;
            } elseif ($pd->type == 2) {
                $income -= $pd->amount;
            }
        }
        $activeProject = ProjectDeveloper::query()
            ->where('developer_id', auth('developer')->id())
            ->whereHas('project', function ($q) {
                $q->where('status', 1);
            })
            ->count();

        $completedProject = ProjectDeveloper::query()
            ->where('developer_id', auth('developer')->id())
            ->whereHas('project', function ($q) {
                $q->where('status', 2);
            })
            ->count();

        $canceledProject = ProjectDeveloper::query()
            ->where('developer_id', auth('developer')->id())
            ->whereHas('project', function ($q) {
                $q->where('status', 3);
            })
            ->count();

        $lastActions = ProjectDeveloperPayment::latest()
            ->wherehas('projectDeveloper', function ($q) {
                $q->where('developer_id', auth('developer')->id());
            })
            ->take(10)
            ->get();

        return view('developer.home', compact('income', 'remain', 'activeProject', 'completedProject', 'canceledProject', 'lastActions'));
    }
}
