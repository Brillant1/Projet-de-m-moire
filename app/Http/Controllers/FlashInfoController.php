<?php

namespace App\Http\Controllers;

use App\Models\FlashInfo;
use Illuminate\Http\Request;
use App\Http\Requests\FlashInfoRequest;

class FlashInfoController extends Controller
{
    public function index()
    {
        $flashs_infos = FlashInfo::all();
        return view('admin.flashInfo.listFlashInfo')->with('allflashs', $flashs_infos);
    }

    public function create(){
        return view('admin.flashInfo.addFlashInfo');
    }

    public function store(FlashInfoRequest $request)
    {
        $info = new FlashInfo();
        $info->date_debut = $request->date_debut;
        $info->date_fin = $request->date_fin;
        $info->contenu = $request->contenu;
        $info->save();

        return back()->with('addFlashMessage', 'Le flash info a été enrégistré avec succès');
    }

    public function show($id)
    {
        $flash_info = FlashInfo::find($id);
        if($flash_info->status == "active"){

            $flash_info->status = "inactive";
            $flash_info->save();
            return back()->with("statusMessage","Le flash info a été désactivé avec succès");
        }

        if($flash_info->status == "inactive"){

            if(FlashInfo::where("status","active")->exists()){
                $flash_active = FlashInfo::where("status","active")->first();
                $flash_active->status = "inactive";
                $flash_active->save();
            }
            $flash_info->status = "active";
            $flash_info->save();
            return back()->with("statusMessage","Le flash info a été activé avec succès");
        }

    }

    public function edit($id)
    {
        $flash_info = FlashInfo::find($id);
        return view('admin.flashInfo.editFlashInfo')->with('flash_info', $flash_info);
    }

    public function update(FlashInfoRequest $request, $id)
    {
        $upadted_flash = FlashInfo::find($id);
        $upadted_flash->date_debut = $request->date_debut;
        $upadted_flash->date_fin = $request->date_fin;
        $upadted_flash->contenu = $request->contenu;
        $upadted_flash->save();

        return redirect()->route('flashInfos.index')->with('editFlashMessage', 'Le flash info a été modifié avec succès');
    }

    public function destroy($id)
    {
        FlashInfo::destroy($id);
        return back()->with('deletedFlashMessage', 'Le flash info a été suprimé avec succès');
    }

    
}
