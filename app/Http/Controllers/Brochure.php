<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Brochure extends Controller
{
    public function downloadBrochure($category)
    {

        $header = $this->getHeaderContent();
        $footer = $this->getFooterContent();
        echo view('brochure.main',compact('category','header','footer'));   
    }

    public function getHeaderContent()
    {
        return $header =  [
            'admin' => 'Fahad'
        ];   
    }

    public function getFooterContent()
    {
        return $footer =  [
            'admin' => 'Fahad'
        ];   
    }

}
