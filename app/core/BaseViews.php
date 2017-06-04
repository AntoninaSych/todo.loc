<?php
class BaseViewes{

    public function __construct()
    {
    }
    public function render($template,$page,$data)
    {
        include "app/views/".$template;
    }
}
