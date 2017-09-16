<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Not_Found extends Controller
{
    public function index()
    {
        $this->view('not_found/index');
    }
}