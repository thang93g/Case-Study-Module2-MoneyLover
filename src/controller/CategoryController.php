<?php


namespace Wallet\controller;


use Wallet\model\CategoryModel;

class CategoryController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }
}