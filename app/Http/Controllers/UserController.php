<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\UserModel;

class UserController extends Controller
{
    public function get(): String
    {
        return json_encode(UserModel::paginate(15));
    }

    public function index():View
    {
        return view('home');
    }
}
