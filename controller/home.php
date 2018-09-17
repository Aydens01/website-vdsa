<?php

class home extends Controller
{
    public function index($role = '')
    {
        $this->view('home',array('role' => $role));
    }
}