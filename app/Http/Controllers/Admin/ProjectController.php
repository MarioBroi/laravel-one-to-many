<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Project::all());
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //dd($request->all());

        $validated = $request->validated();

        //dd($validated);
        $slug = Str::slug($request->title, '-');

        $validated['slug'] = $slug;

        //controllo se nella richiesta é presente una immagine, altrimenti skippo questo procedimento
        if ($request->has('project_img')) {

            //recupero in una variabile la project_img
            $image_path = Storage::put('uploads', $validated['project_img']);
            //dd($validated, $image_path);

            //salvo l'url dell'imagine sul validate
            $validated['project_img'] = $image_path;
            //dd($validated);
        }

        //dd($slug, $validated);

        Project::create($validated);

        return to_route('admin.projects.index')->with('message', "Project $request->title created successfully");
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
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $validated = $request->validated();
        $slug = Str::slug($request->title, '-');
        $validated['slug'] = $slug;

        //dd($validated);

        if ($request->has('project_img')) {

            if ($project->project_img) {
                // cancello la vecchia immagine
                Storage::delete($project->project_img);
            }

            $image_path = Storage::put('uploads', $validated['project_img']);

            //dd($validated, $image_path);
            $validated['project_img'] = $image_path;
        }

        $project->update($validated);

        return to_route('admin.projects.index', $project)->with('message', "Project $project->title update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->project_img) {
            Storage::delete($project->project_img);
        }

        $project->delete();

        return to_route('admin.projects.index')->with('message', "Project $project->title delete successfully");
    }
}
