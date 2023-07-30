<?php

class Model
{
    public object $request;

    public function __construct()
    {
        $this->request = (object) $_POST;
    }

    public function create()
    {
    }
    public function read()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
