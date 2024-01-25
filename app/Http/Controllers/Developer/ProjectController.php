<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectDeveloper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return view('developer.project.index');
    }

    public function create()
    {
        $customers = Customer::where('status', 1)->latest()->get();
        return view('developer.project.create', compact('customers'));
    }

    public function show(Project $project)
    {
        $developer = ProjectDeveloper::query()
            ->where('project_id', $project->id)
            ->where('developer_id', auth('developer')->id())
            ->first();

        return view('developer.project.show', compact('project', 'developer'));
    }

    public function datatable()
    {
        $project = ProjectDeveloper::query()
            ->where('developer_id', auth('developer')->id())
            ->latest();

        return DataTables::of($project)
            ->addColumn('customer', function ($q) {
                return $q->project->customer ? $q->project->customer->name . ' ' . $q->project->customer->surname : 'Silinmiş Müşteri';
            })
            ->editColumn('status', function ($q) {
                if (!$q->status) {
                    return html()->span("Pasif")->class('badge badge-danger');
                }

                return html()->span("Aktif")->class('badge badge-success');
            })
            ->editColumn('price', function ($q) {
                return number_format($q->price) . ' ₺';
            })
            ->editColumn('start_date', function ($q) {
                return $q->start_date->translatedFormat('d F Y');
            })
            ->editColumn('end_date', function ($q) {
                return $q->end_date->translatedFormat('d F Y');
            })
            ->addColumn('day', function ($q) {
                if (now() > $q->end_date) {
                    return '<b class="text-danger">-' . now()->diffInDays($q->end_date) . ' Gün</b>';
                }

                if (now()->diffInDays($q->end_date) <= 15){
                    return '<b class="text-info">'.now()->diffInDays($q->end_date) . ' Gün !</b>';
                }

                return '<b>'.now()->diffInDays($q->end_date) . ' Gün</b>';
            })
            ->addColumn('action', function ($q) {
                $html = "";

                $html .= create_show_button(route('developer.project.show', $q->project_id));

                return $html;
            })
            ->rawColumns(['action', 'phone','day'])
            ->make(true);
    }
}
