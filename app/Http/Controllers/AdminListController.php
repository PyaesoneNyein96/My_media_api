<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminListController extends Controller
{
    public function index(){
        return view('Admin.AdminList.admin_list');
    }
}