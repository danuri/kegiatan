<?php

namespace App\Controllers\Pengelola;

use App\Controllers\BaseController;
use App\Models\PerjadinModel;

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
          'surat_tugas' => $file_name,
          'created_by' => session('nip'),
          'is_active' => 0,
        ];

      $model = new PerjadinModel;
      $model->insert($param);

      return redirect()->back()->with('message', 'Kegiatan Perjalanan Dinas telah ditambahkan.');
    }
}
