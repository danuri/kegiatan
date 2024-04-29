<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CrudModel;
use App\Models\PerjadinpesertaModel;

class Api extends BaseController
{
    public function index()
    {
        //
    }

    public function perjadin($nip)
    {
      // $nip = decrypt($nip);

      $db = db_connect();
      $builder = $db->table('tr_perjadin_peserta')
                    ->select('tr_perjadin_peserta.*,tr_perjadin.kegiatan,tr_perjadin.sasaran,
                              tr_perjadin.tahun_anggaran,
                              tr_perjadin.tgl_awal,
                              tr_perjadin.tgl_akhir,
                              tr_perjadin.nomor_surat,
                              tr_perjadin.surat_tugas,
                              tr_perjadin.created_at')
                    ->join('tr_perjadin', 'tr_perjadin.kode = tr_perjadin_peserta.kode_perjadin')
                    ->where(['tr_perjadin_peserta'=>$nip]);

      return DataTable::of($builder)->toJson(true);
    }

    public function perjadinx($nip)
    {
      // $nip = decrypt($nip);

      $pmodel = new CrudModel;

      $data = $pmodel->getPerjadin($nip);
      $jumlah = count($data);

      return $this->response->setJSON(['status'=>'success','jumlah'=>$jumlah,'data'=>$data]);
    }

    public function perjadindetail($id)
    {
      // $nip = decrypt($nip);

      $pmodel = new CrudModel;

      $data = $pmodel->getperjadinDetail($id);

      return $this->response->setJSON(['status'=>'success','data'=>$data]);
    }
}
