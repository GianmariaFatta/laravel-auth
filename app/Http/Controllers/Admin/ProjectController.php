<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderby('updated_at', 'DESC')->get();

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $project = new Project();
        return view('admin.projects.create',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->all();
        $request->validate([
        'title'=>'required|string|',
        'description'=>'required|string|',
        'thumb'=>'nullable|url|',
        
        ]);

        $project = new Project();
        
        $data['slug']=Str::slug($data['title'], '-');

        $project->fill($data);

       

        $project->save();

        return to_route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $project= Project::findorfail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data= $request->all();
        $request->validate([
        'title'=>['required', 'string', Rule::unique('projects')->ignore($project->id)],
        'description'=>'|string|',
        'thumb'=>'nullable|url|',
        
        ]);

      
        
        $data['slug']=Str::slug($data['title'], '-');

        $project->update($data);

        return to_route('admin.projects.show', $project->id)->with('type', 'success')->with('message','Progetto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return to_route('admin.projects.index')
            ->with('message', "Il progetto '$project->title' è stato eliminato con successo")
            ->with('type', 'success');
    }
}
