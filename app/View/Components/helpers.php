<?php

use App\Models\FlashInfo;

    function flash_info(){
        $flash = FlashInfo::where('status', 'active')->get();

        if(count($flash)>0)
        {
            $contenu = $flash[0]->contenu;
            return $contenu;
        }
        
       
    }