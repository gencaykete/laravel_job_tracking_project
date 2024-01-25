<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\ProjectDeveloper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class ProjectDeveloperController extends Controller
{
    public function create()
    {
        $developers = Developer::where('status', 1)->latest()->get();
        return view('admin.project.developer.create', compact('developers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'developer_id' => ['required', Rule::exists('developers', 'id')],
            'project_id' => ['required', Rule::exists('projects', 'id')],
            'price' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ], [], [
            'developer_id' => 'Yazılımcı',
            'project_id' => 'Proje',
            'price' => 'Fiyat',
            'start_date' => 'Başlangıç Tarihi',
            'end_date' => 'Bitiş Tarihi',
        ]);

        $projectDeveloper = new ProjectDeveloper();
        $projectDeveloper->project_id = $request->project_id;
        $projectDeveloper->developer_id = $request->developer_id;
        $projectDeveloper->price = $request->price;
        $projectDeveloper->start_date = $request->start_date;
        $projectDeveloper->end_date = $request->end_date;
        $projectDeveloper->notes = $request->notes;

        if ($projectDeveloper->save()) {
            return to_route('admin.project.edit', $projectDeveloper->project_id)->with('response', [
                'status' => 'success',
                'message' => 'Yazılımcı başarıyla eklendi.'
            ]);
        }
        return to_route('admin.project.edit', $projectDeveloper->project_id)->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function edit(ProjectDeveloper $projectDeveloper)
    {
        $developers = Developer::where('status', 1)->latest()->get();
        return view('admin.project.developer.edit', compact('projectDeveloper', 'developers'));
    }

    public function update(Request $request, ProjectDeveloper $projectDeveloper)
    {
        $projectDeveloper->developer_id = $request->developer_id;
        $projectDeveloper->price = $request->price;
        $projectDeveloper->start_date = $request->start_date;
        $projectDeveloper->end_date = $request->end_date;
        $projectDeveloper->notes = $request->notes;

        if ($projectDeveloper->save()) {
            return to_route('admin.project.edit', $projectDeveloper->project_id)->with('response', [
                'status' => 'success',
                'message' => 'Yazılımcı başarıyla güncellendi.'
            ]);
        }
        return to_route('admin.project.edit', $projectDeveloper->project_id)->with('response', [
            'status' => 'error',
            'message' => 'Sistemde oluşan bir hata nedeniyle işleminiz yapılamadı !'
        ]);
    }

    public function destroy(ProjectDeveloper $projectDeveloper)
    {
        if ($projectDeveloper->delete()) {
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

}
