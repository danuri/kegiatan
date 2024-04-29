<?php

namespace App\Controllers\Pengelola;

use App\Controllers\BaseController;
use Aws\S3\S3Client;
use App\Models\PerjadinModel;
use App\Models\PerjadinpesertaModel;
use App\Models\PaguModel;

class Perjadin extends BaseController
{
    public function index()
    {
      $model = new PerjadinModel;
      $data['giats'] = $model->where(['kode_satker' => session('kelola')])->findAll();
      return view('pengelola/perjadin/index', $data);
    }

    public function save()
    {
      if (! $this->validate([
          'kegiatan' => "required",
          'sasaran' => "required",
          'nomor_st' => "required",
          'tgl_awal' => "required",
          'tgl_akhir' => "required",
        ])) {
            return redirect()->back()->with('message', 'Harap isi dengan lengkap.');
        }

        $file_name = $_FILES['lampiran']['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        $file_name = 'hrmsst.'.session('niplama').'-'.time().'.'.$ext;
        $temp_file_location = $_FILES['lampiran']['tmp_name'];

        $s3 = new S3Client([
          'region'  => 'us-east-1',
          'endpoint' => 'https://ropeg.kemenag.go.id:9000/',
          'use_path_style_endpoint' => true,
          'version' => 'latest',
          'credentials' => [
            // 'key'    => "118ZEXFCFS0ICPCOLIEJ",
            // 'secret' => "9xR+TBkYyzw13guLqN7TLvxhfuOHSW++g7NCEdgP",
            'key'    => "PkzyP2GIEBe8z29xmahI",
            'secret' => "voNVqTilX2iux6u7pWnaqJUFG1414v0KTaFYA0Uz",
          ],
          'http'    => [
              'verify' => false
          ]
        ]);

        $result = $s3->putObject([
          'Bucket' => 'presensi',
          'Key'    => 'ketidakhadiran/'.$file_name,
          'SourceFile' => $temp_file_location,
          'ContentType' => 'application/pdf'
        ]);

        $param['surat_tugas'] = $file_name;

        $param = [
          'kode_satker' => session('kelola'),
          'satker' => session('satker4'),
          'kode' => service('uuid')->uuid4(),
          'kegiatan' => $this->request->getVar('kegiatan'),
          'sasaran' => $this->request->getVar('sasaran'),
          'tahun_anggaran' => $this->request->getVar('tahun_anggaran'),
          'tgl_awal' => $this->request->getVar('tgl_awal'),
          'tgl_akhir' => $this->request->getVar('tgl_akhir'),
          'nomor_surat' => $this->request->getVar('nomor_st'),
          'surat_tugas' => $file_name,
          'created_by' => session('nip'),
          'is_active' => 0,
        ];

      $model = new PerjadinModel;
      $model->insert($param);

      return redirect()->back()->with('message', 'Kegiatan Perjalanan Dinas telah ditambahkan.');
    }

    public function detail($kode)
    {
      $model = new PerjadinModel;
      $mpeserta = new PerjadinpesertaModel;
      $mpagu = new PaguModel;
      $data['giat'] = $model->find($kode);
      $data['tujuan'] = $mpagu->findAll();
      // $data['peserta'] = $mpeserta->where('kode_perjadin',$kode)->findAll();

      $db      = \Config\Database::connect();
      $data['peserta'] = $db->table('tr_perjadin_peserta')->select('tr_perjadin_peserta.*,tm_pagu.satker')->join('tm_pagu','tm_pagu.id = tr_perjadin_peserta.tujuan')->where('tr_perjadin_peserta.kode_perjadin',$kode)->get()->getResult();
      return view('pengelola/perjadin/detail', $data);
      // dd($data);
    }

    public function savepeserta()
    {
      if (! $this->validate([
          'nip' => "required",
          'nama' => "required",
          'jabatan' => "required",
          'pangkat' => "required",
          'tgl_awal' => "required",
          'tgl_akhir' => "required",
          'tujuan' => "required",
        ])) {
            return redirect()->back()->with('message', 'Harap isi dengan lengkap.');
        }

        $pagumodel = new PaguModel;
        $tujuan = $pagumodel->find($this->request->getVar('tujuan'));

        $param = [
          'nip' => $this->request->getVar('nip'),
          'nama' => $this->request->getVar('nama'),
          'jabatan' => $this->request->getVar('jabatan'),
          'pangkat' => $this->request->getVar('pangkat'),
          'tanggal_mulai' => $this->request->getVar('tgl_awal'),
          'tanggal_akhir' => $this->request->getVar('tgl_akhir'),
          'tujuan_id' => $this->request->getVar('tujuan'),
          'tujuan' => $tujuan->satker,
          'kode_perjadin' => $this->request->getVar('kode')
        ];

      $model = new PerjadinpesertaModel;
      $model->insert($param);

      return redirect()->back()->with('message', 'Peserta Kegiatan telah ditambahkan.');
    }

    public function deletepeserta($id)
    {
      $model = new PerjadinpesertaModel;
      $model->delete(decrypt($id));
      return redirect()->back()->with('message', 'Peserta Kegiatan telah ditambahkan.');
    }

    public function active($id)
    {
      $model = new PerjadinModel;
      $update = $model->update($id,['is_active'=>1]);

      return redirect()->back()->with('message', 'Form telah aktif.');
    }

    public function deactive($id)
    {
      $model = new PerjadinModel;
      $update = $model->update($id,['is_active'=>0]);

      return redirect()->back()->with('message', 'Form telah Non aktif.');
    }
}
