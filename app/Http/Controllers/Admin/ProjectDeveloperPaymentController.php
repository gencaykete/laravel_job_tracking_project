<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\ProjectDeveloper;
use App\Models\ProjectDeveloperPayment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectDeveloperPaymentController extends Controller
{
    public function index()
    {
        $projectDeveloper = ProjectDeveloper::find(\request('project_developer_id'));
        return view('admin.project.developer.payment.index',compact('projectDeveloper'));
    }

    public function create()
    {
        $developers = Developer::where('status', 1)->latest()->get();
        return view('admin.project.developer.payment.create', compact('developers'));
    }

    public function store(Request $request)
    {
        $projectDeveloperPayment = new ProjectDeveloperPayment();
        $projectDeveloperPayment->project_developer_id = $request->project_developer_id;
        $projectDeveloperPayment->type = $request->type;
        $projectDeveloperPayment->amount = $request->amount;
        $projectDeveloperPayment->description = $request->description;
        if ($request->hasFile('file')) {
            $projectDeveloperPayment->file = $request->file('file')->store('project/developer/' . $projectDeveloperPayment->project_developer_id . '/payment');
        }

        if ($projectDeveloperPayment->save()) {
            return to_route('admin.project-developer-payment.index',['project_developer_id' => $projectDeveloperPayment->project_developer_id])->with('response', [
                'status' => 'success',
                'message' => 'Ödeme başarıyla eklendi.'
            ]);
        }
        return to_route('admin.project-developer-payment.index',['project_developer_id' => $projectDeveloperPayment->project_developer_id])->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function edit(ProjectDeveloperPayment $projectDeveloperPayment)
    {
        $developers = Developer::where('status', 1)->latest()->get();
        return view('admin.project.developer.payment.edit', compact('projectDeveloperPayment', 'developers'));
    }

    public function update(Request $request, ProjectDeveloperPayment $projectDeveloperPayment)
    {
        $projectDeveloperPayment->project_developer_id = $request->project_developer_id;
        $projectDeveloperPayment->type = $request->type;
        $projectDeveloperPayment->amount = $request->amount;
        $projectDeveloperPayment->description = $request->description;
        if ($request->hasFile('file')) {
            $projectDeveloperPayment->file = $request->file('file')->store('project/developer/' . $projectDeveloperPayment->project_developer_id . '/payment');
        }

        if ($projectDeveloperPayment->save()) {
            return to_route('admin.project-developer-payment.index',['project_developer_id' => $projectDeveloperPayment->project_developer_id])->with('response', [
                'status' => 'success',
                'message' => 'Proje başarıyla güncellendi.'
            ]);
        }
        return to_route('admin.project-developer-payment.index',['project_developer_id' => $projectDeveloperPayment->project_developer_id])->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function destroy(ProjectDeveloperPayment $projectDeveloperPayment)
    {
        if ($projectDeveloperPayment->delete()) {
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

    public function datatable(Request $request)
    {
        $query = ProjectDeveloperPayment::where('project_developer_id', $request->project_developer_id)->latest()->get();

        return DataTables::of($query)
            ->addColumn('developer', function ($q) {
                return $q->projectDeveloper ? $q->projectDeveloper->developer->name . ' ' . $q->projectDeveloper->developer->surname : 'Silinmiş Yazılımcı';
            })
            ->editColumn('type', function ($q) {
                if ($q->type == 0) {
                    return html()->span("Ödeme Yapıldı")->class('badge badge-success');
                }

                if ($q->type == 1) {
                    return html()->span("Ekleme Yapıldı")->class('badge badge-info');
                }

                if ($q->type == 2) {
                    return html()->span("Kesinti Yapıldı")->class('badge badge-danger');
                }
            })
            ->editColumn('amount', function ($q) {
                return number_format($q->amount) . ' ₺';
            })
            ->addColumn('action', function ($q) {
                $html = "";

                $html .= create_edit_button(route('admin.project-developer-payment.edit', $q->id));
                $html .= create_delete_button(route('admin.project-developer-payment.destroy', $q->id));

                return $html;
            })
            ->rawColumns(['action', 'phone'])
            ->make(true);
    }
}
