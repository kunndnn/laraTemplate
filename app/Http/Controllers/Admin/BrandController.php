<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandList()
    {
        return view('admin.brand.brand-list');
    }

    public function addBrand(Request $request){
        if($request->method('get')){
            return view('admin.brand.add-brand');
        }else{

        }
    }

}
