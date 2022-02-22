<?php
return array(
    'product/([0-9]+)' => 'product/view/$1', //actionView in ProductControllers

    'catalog' => 'catalog/index', //actionIndex in CatalogController

    'category/([0-9+])/page-([0-9+])' => 'catalog/category/$1/$2', //actionCategory in CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory in CatalogController

    'cart/add/([0-9]+)' =>'cart/add/$1',  //actionAdd in CartController
    'cart/delete/([0-9]+)' => 'cart/delete',
    'cart/checkout' =>'cart/checkout',

    'cart/addAjax/([0-9]+)' =>'cart/addAjax/$1', //actionAdd in CartController
    'cart' => 'cart/index',  //actionIndex in CartController

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',


    '' => 'site/index', //actionIndex in SiteController
);
