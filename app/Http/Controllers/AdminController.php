<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;

function errorView($error_message) {
    return view("admin.modules.login", ["error_message" => $error_message]);
}

class AdminController extends Controller
{
    public function login ()
    {
         if(Admin::checkSession()) {
             return redirect("/admin/index");
         }
         else {
             return view("admin.modules.login");
         }
    }

    public function login_post (Request $req) {
        if(Admin::checkSession()) {
            return NULL;
        }
        else {
            $l = $req->login;
            $p = $req->password;
            $em = "Логин или пароль введены неправильно";

            $admin = Admin::where("login", "=", $l)->first();

            if($admin->login AND $admin->password AND $admin->name) {
                if(Hash::check($p, $admin->password)) {
                    session()->put("admin", $admin);

                    return redirect("/admin/index");
                }
                else {
                    return errorView($em);
                }
            }
            else {
                return errorView($em);
            }

        }
    }

    public function index_page () {
        if(Admin::checkSession()) {
            return view("admin.modules.index");
        }
        else {
            return redirect("/admin/login");
        }
    }


    public function render_page ($page) {
        if(Admin::checkSession()) {
            return view("admin.modules.system.".$page);
        }
        else {
            return redirect("/admin/login");
        }
    }
}
