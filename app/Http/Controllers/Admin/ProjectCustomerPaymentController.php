<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCustomerPayment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectCustomerPaymentController extends Controller
{
    public function index()
    {
        $project = Project::find(\request('project_id'));
        return view('admin.project.customer.payment.index', compact('project'));
    }

    public function create()
    {
        return view('admin.project.customer.payment.create');
    }

    public function store(Request $request)
    {
        $projectCustomerPayment = new ProjectCustomerPayment();
        $projectCustomerPayment->project_id = $request->project_id;
        $projectCustomerPayment->type = $request->type;
        $projectCustomerPayment->amount = $request->amount;
        $projectCustomerPayment->description = $request->description;
        if ($request->hasFile('file')) {
            $projectCustomerPayment->file = $request->file('file')->store('project/customer/payment');
        }

        if ($projectCustomerPayment->save()) {
            return to_route('admin.project-customer-payment.index', ['project_id' => $projectCustomerPayment->project_id])->with('response', [
                'status' => 'success',
                'message' => 'Ödeme başarıyla eklendi.'
            ]);
        }
        return to_route('admin.project-customer-payment.index', ['project_id' => $projectCustomerPayment->project_id])->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function edit(ProjectCustomerPayment $projectCustomerPayment)
    {
        return view('admin.project.customer.payment.edit', compact('projectCustomerPayment'));
    }

    public function update(Request $request, ProjectCustomerPayment $projectCustomerPayment)
    {
        $projectCustomerPayment->type = $request->type;
        $projectCustomerPayment->amount = $request->amount;
        $projectCustomerPayment->description = $request->description;
        if ($request->hasFile('file')) {
            $projectCustomerPayment->file = $request->file('file')->store('project/customer/payment');
        }

        if ($projectCustomerPayment->save()) {
            return to_route('admin.project-customer-payment.index', ['project_id' => $projectCustomerPayment->project_id])->with('response', [
                'status' => 'success',
                'message' => 'Proje başarıyla güncellendi.'
            ]);
        }
        return to_route('admin.project-customer-payment.index', ['project_id' => $projectCustomerPayment->project_id])->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function destroy(ProjectDeveloperPayment $projectCustomerPayment)
    {
        if ($projectCustomerPayment->delete()) {
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
        $query = ProjectCustomerPayment::where('project_id', $request->project_id)->latest()->get();

        return DataTables::of($query)
            ->editColumn('type', function ($q) {
                if ($q->type == 0) {
                    return html()->span("Ödeme Alındı")->class('badge badge-success');
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

                $html .= create_edit_button(route('admin.project-customer-payment.edit', $q->id));
                $html .= create_delete_button(route('admin.project-customer-payment.destroy', $q->id));

                return $html;
            })
            ->rawColumns(['action', 'phone'])
            ->make(true);
    }
}
