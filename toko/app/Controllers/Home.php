<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        $diskonModel = new \App\Models\DiskonModel();
        // return view('welcome_message');
        $diskon = $diskonModel->findAll();
        return view('home',[
            'diskon' => $diskon,
        ]);
    }
    public function contact()
    {
        return view('contact');
    }
}
