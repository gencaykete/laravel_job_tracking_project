<?php

namespace App\Http\Controllers\Customer;

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
        return view('customer.project.index');
    }

    public function create()
    {
        $customers = Customer::where('status', 1)->latest()->get();
        return view('customer.project.create', compact('customers'));
    }

    public function show(Project $project)
    {
        return view('customer.project.show', compact('project'));
    }

    public function datatable()
    {
        $project = Project::query()
            ->where('customer_id', auth('customer')->id())
            ->latest();

        return DataTables::of($project)
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
            ->addColumn('action', function ($q) {
                $html = "";

                $html .= create_show_button(route('customer.project.show', $q->id));

                return $html;
            })
            ->rawColumns(['action', 'phone'])
            ->make(true);
    }
}
