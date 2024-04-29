<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 $routes->get('auth', 'Auth::index');
 $routes->get('auth/login', 'Auth::login');
 $routes->get('auth/logout', 'Auth::logout');
 $routes->get('auth/callback', 'Auth::callback');

 $routes->get('api/perjadin/(:num)', 'Api::perjadin/$1');
 $routes->get('api/perjadin/detail/(:any)', 'Api::perjadindetail/$1');

 $routes->get('biodata/success', 'Home::biodatasuccess');
 $routes->get('biodata/(:any)', 'Home::biodata/$1');
 $routes->post('biodata/save/(:any)', 'Home::biodatasave/$1');

 $routes->get('/', 'Home::index', ["filter" => "auth"]);
 $routes->get('checkpegawai/(:num)', 'Home::checkpegawai/$1');
 $routes->get('getpegawai/(:num)/(:any)', 'Home::getpegawai/$1/$2');
 $routes->get('ajax/getpegawai/(:any)', 'Ajax::getpegawai/$1',["filter" => "auth"]);

 $routes->group("pengelola", ["filter" => "auth"], function ($routes) {
     $routes->get('kegiatan', 'Pengelola\Kegiatan::index');
     $routes->get('kegiatan/active/(:any)', 'Pengelola\Kegiatan::active/$1');
     $routes->get('kegiatan/deactive/(:any)', 'Pengelola\Kegiatan::deactive/$1');
     $routes->get('kegiatan/export/(:any)', 'Pengelola\Kegiatan::export/$1');
     $routes->get('kegiatan/peserta/(:any)', 'Pengelola\Kegiatan::peserta/$1');
     $routes->get('kegiatan/exportpdf/(:any)', 'Pengelola\Kegiatan::exportpdf/$1');
     $routes->get('kegiatan/topdf/(:any)', 'Pengelola\Kegiatan::topdf/$1');
     $routes->get('kegiatan/delete/(:any)', 'Pengelola\Kegiatan::delete/$1');
     $routes->get('kegiatan/delete/peserta/(:any)', 'Pengelola\Kegiatan::deletepeserta/$1');
     $routes->get('kegiatan/edit/(:any)', 'Pengelola\Kegiatan::edit/$1');
     $routes->post('kegiatan/edit/(:any)', 'Pengelola\Kegiatan::editsave/$1');
     $routes->get('kegiatan/(:any)', 'Pengelola\Kegiatan::detail/$1');
     $routes->post('kegiatan/save', 'Pengelola\Kegiatan::save');

     $routes->group("perjadin", function ($routes) {
         $routes->get('', 'Pengelola\Perjadin::index');
         $routes->post('save', 'Pengelola\Perjadin::save');
         $routes->get('detail/(:any)', 'Pengelola\Perjadin::detail/$1');
         $routes->get('edit/(:any)', 'Pengelola\Perjadin::edit/$1');
         $routes->post('peserta/save', 'Pengelola\Perjadin::savepeserta');
         $routes->get('deletepeserta/(:any)', 'Pengelola\Perjadin::deletepeserta/$1');

         $routes->get('active/(:any)', 'Pengelola\Perjadin::active/$1');
         $routes->get('deactive/(:any)', 'Pengelola\Perjadin::deactive/$1');
     });
 });
