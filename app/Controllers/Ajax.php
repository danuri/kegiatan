<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SimpegModel;

class Ajax extends BaseController
{
    public function getpegawai($nip)
    {
        $model = new SimpegModel;

        $pegawai = $model->getPegawai($nip);
        return $this->response->setJSON($pegawai);
    }
}
