<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Controllers\Controller; //NON BISOGNA DIMENTICARLO!!
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Str;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $form_data = $request->validated();

        $slug = Str::slug($request->name, '-');

        $form_data['slug'] = $slug;

        $new_type = Type::create($form_data);

        return redirect()->route('admin.types.index')->with('message', 'Tipologia creata correttamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $form_data = $request->validated();

        $slug = Str::slug($request->name, '-');

        $form_data['slug'] = $slug;

        //possso farlo perchè ho definito il fillable
        $type->update($form_data);

        return redirect()->route('admin.types.index')->with('message', 'Modifiche correttamente eseguite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('message', 'Categoria cancellata correttamente');
    }
}
