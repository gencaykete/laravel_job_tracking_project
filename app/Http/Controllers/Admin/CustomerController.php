<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Project;
use App\Models\ProjectCustomerPayment;
use App\Models\ProjectDeveloperPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customer.index');
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', Rule::unique('customers', 'email')],
            'phone' => ['required', Rule::unique('customers', 'phone')],
            'password' => ['required', 'min:6']
        ], [], [
            'name' => 'Ad',
            'surname' => 'Soyad',
            'email' => 'E-posta',
            'phone' => 'Telefon',
            'password' => 'Parola'
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        $customer->status = $request->status;
        $customer->profile = $request->file('profile')->store('profile-images');

        if ($customer->save()) {
            return to_route('admin.customer.index')->with('response', [
                'status' => 'success',
                'message' => 'Yazılımcı başarıyla eklendi.'
            ]);
        }
        return to_route('admin.customer.index')->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function edit(Customer $customer)
    {
        $projects = Project::query()
            ->where('customer_id',$customer->id)
            ->latest()
            ->get();

        $projectCustomerPayments = ProjectCustomerPayment::query()
            ->whereHas('project', function ($q) use ($customer) {
                $q->where('customer_id', $customer->id);
            })
            ->latest()
            ->get();

        return view('admin.customer.show', compact('customer','projects','projectCustomerPayments'));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->surname = $request->surname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        if ($request->filled('password')) {
            $customer->password = Hash::make($request->password);
        }
        $customer->status = $request->status;

        if ($request->hasFile('profile')){
            $customer->profile = $request->file('profile')->store('profile-images');
        }

        if ($customer->save()) {
            return to_route('admin.customer.edit', $customer->id)->with('response', [
                'status' => 'success',
                'message' => 'Yazılımcı başarıyla güncellendi.'
            ]);
        }
        return to_route('admin.customer.index')->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function destroy(Customer $customer)
    {
        if ($customer->delete()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Yazılımcı başarıyla silindi.'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function datatable()
    {
        $customer = Customer::latest();

        return DataTables::of($customer)
            ->editColumn('status', function ($q) {
                if (!$q->status) {
                    return html()->span("Pasif")->class('badge badge-danger');
                }

                return html()->span("Aktif")->class('badge badge-success');
            })
            ->addColumn('action', function ($q) {
                $html = "";

                $html .= create_edit_button(route('admin.customer.edit', $q->id));
                $html .= create_delete_button(route('admin.customer.destroy', $q->id));

                return $html;
            })
            ->rawColumns(['action', 'phone'])
            ->make(true);
    }
}
