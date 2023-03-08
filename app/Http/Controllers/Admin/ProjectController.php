<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();

        $slug = Str::slug($request->title, '-');

        $form_data['slug'] = $slug;

        if($request->hasFile('cover_image')){
            $path = Storage::disk('public')->put('project_image', $request->cover_image);

            $form_data['cover_image'] = $path;
        }

        $new_project = Project::create($form_data);

        if($request->has('technologies')){
            $new_project->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.index')->with('message', 'Progetto creato correttamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();

        $slug = Str::slug($request->title, '-');

        $form_data['slug'] = $slug;

        if($request->hasFile('cover_image')){
            if($project->cover_image){
                Storage::delete($project->cover_image);     
            }
            $path = Storage::disk('public')->put('project_image', $request->cover_image);

            $form_data['cover_image'] = $path;
        }

        $project->update($form_data);

         if($request->has('technologies')){

            $project->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.projects.index')->with('message', 'Progetto aggiornato correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Progetto cancellato correttamente');
    }
}
