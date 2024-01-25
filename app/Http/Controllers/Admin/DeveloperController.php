<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\Project;
use App\Models\ProjectDeveloper;
use App\Models\ProjectDeveloperPayment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class DeveloperController extends Controller
{
    public function index()
    {
        return view('admin.developer.index');
    }

    public function create()
    {
        return view('admin.developer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', Rule::unique('developers', 'email')],
            'phone' => ['required', Rule::unique('developers', 'phone')],
            'password' => ['required', 'min:6']
        ], [], [
            'name' => 'Ad',
            'surname' => 'Soyad',
            'email' => 'E-posta',
            'phone' => 'Telefon',
            'password' => 'Parola'
        ]);

        $developer = new Developer();
        $developer->name = $request->name;
        $developer->surname = $request->surname;
        $developer->email = $request->email;
        $developer->phone = $request->phone;
        $developer->password = \Hash::make($request->password);
        $developer->status = $request->status;
        $developer->profile = $request->file('profile')->store('profile-images');

        if ($developer->save()) {
            return to_route('admin.developer.index')->with('response', [
                'status' => 'success',
                'message' => 'Yazılımcı başarıyla eklendi.'
            ]);
        }
        return to_route('admin.developer.index')->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function edit(Developer $developer)
    {
        $projects = Project::query()
            ->whereHas('developers', function ($q) use ($developer) {
                $q->where('developer_id', $developer->id);
            })
            ->latest()
            ->get();

        $projectDeveloperPayments = ProjectDeveloperPayment::query()
            ->whereHas('projectDeveloper', function ($q) use ($developer) {
                $q->where('developer_id', $developer->id);
            })
            ->latest()
            ->get();

        return view('admin.developer.show', compact('developer', 'projects', 'projectDeveloperPayments'));
    }

    public function update(Request $request, Developer $developer)
    {
        $developer->name = $request->name;
        $developer->surname = $request->surname;
        $developer->email = $request->email;
        $developer->phone = $request->phone;
        if ($request->filled('password')) {
            $developer->password = \Hash::make($request->password);
        }
        $developer->status = $request->status;

        if ($request->hasFile('profile')) {
            $developer->profile = $request->file('profile')->store('profile-images');
        }

        if ($developer->save()) {
            return to_route('admin.developer.edit', $developer->id)->with('response', [
                'status' => 'success',
                'message' => 'Yazılımcı başarıyla güncellendi.'
            ]);
        }
        return to_route('admin.developer.index')->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function destroy(Developer $developer)
    {
        if ($developer->delete()) {
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
        $developer = Developer::latest();

        return DataTables::of($developer)
            ->editColumn('status', function ($q) {
                if (!$q->status) {
                    return html()->span("Pasif")->class('badge badge-danger');
                }

                return html()->span("Aktif")->class('badge badge-success');
            })
            ->addColumn('action', function ($q) {
                $html = "";

                $html .= create_edit_button(route('admin.developer.edit', $q->id));
                $html .= create_delete_button(route('admin.developer.destroy', $q->id));

                return $html;
            })
            ->rawColumns(['action', 'phone'])
            ->make(true);
    }
}
