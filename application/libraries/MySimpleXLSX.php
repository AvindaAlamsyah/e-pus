<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MySimpleXLSX
{
    public function __construct()
    {
        require_once APPPATH.'third_party/SimpleXLSX.php';
    }
}