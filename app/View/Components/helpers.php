<?php

use App\Models\FlashInfo;
use Carbon\Carbon;

    function flash_info(){
        $flash = FlashInfo::where('status', 'active')->get();

        if(count($flash)>0)
        {
            $contenu = $flash[0]->contenu;
            return $contenu;
        }  
    }

    function formatDate($date)
    {
        return Carbon::parse($date)->locale('fr_FR')->isoFormat('dddd Do MMMM YYYY');
    }