<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        $status = \request('status');
        return view('admin.project.index', compact('status'));
    }

    public function create()
    {
        $customers = Customer::where('status', 1)->latest()->get();
        return view('admin.project.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'customer_id' => ['required', Rule::exists('customers', 'id')],
            'price' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ], [], [
            'name' => 'Proje Adı',
            'customer_id' => 'Müşteri',
            'price' => 'Fiyat',
            'start_date' => 'Başlangıç Tarihi',
            'end_date' => 'Bitiş Tarihi',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->customer_id = $request->customer_id;
        $project->price = $request->price;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->status = $request->status;

        if ($project->save()) {
            return to_route('admin.project.index')->with('response', [
                'status' => 'success',
                'message' => 'Proje başarıyla eklendi.'
            ]);
        }
        return to_route('admin.project.index')->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function show(Project $project)
    {
        $customers = Customer::where('status', 1)->latest()->get();
        return view('admin.project.show', compact('project', 'customers'));
    }

    public function edit(Project $project)
    {
        $customers = Customer::where('status', 1)->latest()->get();
        return view('admin.project.edit', compact('project', 'customers'));
    }

    public function update(Request $request, Project $project)
    {
        $project->name = $request->name;
        $project->customer_id = $request->customer_id;
        $project->price = $request->price;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->status = $request->status;

        if ($project->save()) {
            return to_route('admin.project.show', $project->id)->with('response', [
                'status' => 'success',
                'message' => 'Proje başarıyla güncellendi.'
            ]);
        }
        return to_route('admin.project.show', $project->id)->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function destroy(Project $project)
    {
        if ($project->delete()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Proje başarıyla silindi.'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function changeProjectStatus(Project $project, $status)
    {
        $project->status = $status;
        $project->save();

        return back()->with('response', [
            'status' => 'success',
            'message' => 'Proje başarıyla güncellendi.'
        ]);
    }

    public function datatable()
    {
        $project = Project::where('status', \request('status'))->with('customer')->latest();

        return DataTables::of($project)
            ->addColumn('customer', function ($q) {
                return $q->customer ? $q->customer->name . ' ' . $q->customer->surname : 'Silinmiş Müşteri';
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

                $html .= create_show_button(route('admin.project.show', $q->id));
                $html .= create_delete_button(route('admin.project.destroy', $q->id));

                return $html;
            })
            ->rawColumns(['action', 'phone', 'day'])
            ->make(true);
    }
}
