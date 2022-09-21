<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examens = Examen::all();
        return view('admin.examen.listExamen', compact('examens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_examens = explode(';',env('TYPE_EXAMEN'));
        
        return view('admin.examen.addExamen', compact('type_examens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Examen::create($request->all());
        return redirect()->route('examens.index')->with('addedExamenMessage','Examen ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examen)
    {
        return view('admin.examen.editExamen', compact('examen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examen $examen)
    {
        $examen->update($request->all());
        $examens = Examen::all();
        return redirect()->route('examens.index')->with('editExamenMessage', 'Info de l\'examen modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examen)
    {
        $examen->delete();
        return back()->with('deletedExamenMessage', 'Examen supprimé avec sucès');
    }

    public function changeStateExamen($id){

       $currentExamen = Examen::findOrFail($id);

       $examens = Examen::all();

       foreach ($examens as $examen){

        if($examen->status=="active"){
            $examen->status="desactive";
            $examen->save();
        }
       }

       if($currentExamen->status=="active"){
        $currentExamen->status="desactive";
        $currentExamen->save();
       }else{
        $currentExamen->status="active";
        $currentExamen->save();
       }
       
       

        // if($examen->status == "active"){ 
        //     $examen->status = "desactive";
        //     $examen->save();
        // }
        // else{

        //     if(Examen::where('status','active')->exists()){
        //         $oldActiveExamen = Examen::where('status','active')->get();
        //         $oldActiveExamen->status ="desactive";
        //         $oldActiveExamen->save();                
        //     }
        //     $examen->status = "active";
        //     $examen->save();
        // }
        

        return back()->with('statusMessage', 'Status de l\'examen modifié avec succès');
        
    }
}
