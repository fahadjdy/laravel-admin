<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\AdminModel;

class Brochure extends Controller
{
    public function downloadBrochure($category)
    {

        $header = $this->getHeaderContent();
        $footer = $this->getFooterContent();
        echo view('brochure.brochure',compact('category','header','footer'));   
    }

    public function getHeaderContent()
    {
        $adminDetail = AdminModel::find(session()->get('admin_id'))->toArray();

        $header = [];
        if(!empty($adminDetail)){
            $header =  [
                'name'      => $adminDetail['name'],
                'email_1'   => $adminDetail['email_1'],
                'email_2'   => $adminDetail['email_2'],
                'contact_1' => $adminDetail['contact_1'],
                'contact_2' => $adminDetail['contact_2'],
                'address_1' => $adminDetail['address_1'],
                'logo'      => $adminDetail['logo'],
                'favicon'   => $adminDetail['favicon'],
            ];   
        }
        return $header;
    }

    public function getFooterContent()
    {
        return $footer =  [
            'admin' => 'Fahad'
        ];   
    }

}
