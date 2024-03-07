<?php

namespace App\Controllers\Pengelola;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\KegiatanModel;
use App\Models\PesertaModel;
use Dompdf\Dompdf;

class Kegiatan extends BaseController
{
    public function index()
    {
        $model = new KegiatanModel;
        $data['giats'] = $model->where(['kode_satker' => session('kelola')])->findAll();
        return view('pengelola/kegiatan/index', $data);
    }

    public function save()
    {
      if (! $this->validate([
          'kegiatan' => "required",
          'lokasi' => "required",
          'tahun_anggaran' => "required",
          'waktu_awal' => "required",
          'kota' => "required",
          'tanggal_sign' => "required",
          'rekening' => "required",
        ])) {
            return redirect()->back()->with('message', 'Harap isi dengan lengkap.');
        }

        $param = [
          'kode_satker' => session('kelola'),
          'satker' => session('satker4'),
          'kode' => service('uuid')->uuid4(),
          'kegiatan' => $this->request->getVar('kegiatan'),
          'lokasi' => $this->request->getVar('lokasi'),
          'tahun_anggaran' => $this->request->getVar('tahun_anggaran'),
          'waktu_awal' => $this->request->getVar('waktu_awal'),
          'waktu_akhir' => $this->request->getVar('waktu_akhir'),
          'kota' => $this->request->getVar('kota'),
          'tanggal_sign' => $this->request->getVar('tanggal_sign'),
          'rekening' => $this->request->getVar('rekening'),
          'jenis' => $this->request->getVar('jenis'),
          'created_by' => session('nip'),
          'is_active' => 0,
        ];

      // Jika Pra Register
      if($this->request->getVar('praregister') == 1){

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

      }

      $model = new KegiatanModel;
      $model->insert($param);

      return redirect()->back()->with('message', 'Kegiatan telah ditambahkan.');
    }

    public function edit($id)
    {
      $model = new KegiatanModel;
      $id = decrypt($id);
      $data['giat'] = $model->find($id);

      return view('pengelola/kegiatan/edit', $data);
    }

    public function editsave($id)
    {
      if (! $this->validate([
          'kegiatan' => "required",
          'lokasi' => "required",
          'tahun_anggaran' => "required",
          'waktu_awal' => "required",
          'waktu_akhir' => "required",
          'kota' => "required",
          'tanggal_sign' => "required",
          'rekening' => "required",
        ])) {
            return redirect()->back()->with('message', 'Harap isi dengan lengkap.');
        }

      $id = decrypt($id);

      $param = [
        'kode' => $id,
        'kegiatan' => $this->request->getVar('kegiatan'),
        'lokasi' => $this->request->getVar('lokasi'),
        'tahun_anggaran' => $this->request->getVar('tahun_anggaran'),
        'waktu_awal' => $this->request->getVar('waktu_awal'),
        'waktu_akhir' => $this->request->getVar('waktu_akhir'),
        'kota' => $this->request->getVar('kota'),
        'tanggal_sign' => $this->request->getVar('tanggal_sign'),
        'rekening' => $this->request->getVar('rekening'),
        'jenis' => $this->request->getVar('jenis'),
      ];

      $model = new KegiatanModel;
      $model->save($param);

      return redirect()->back()->with('message', 'Kegiatan telah diubah.');
    }

    public function detail($id)
    {
      $model = new KegiatanModel;
      $id = decrypt($id);
      $data['giat'] = $model->find($id);

      $peserta = new PesertaModel;
      $data['peserta'] = $peserta->where('kegiatan_id',$id)->findAll();
      return view('pengelola/kegiatan/detail', $data);
    }

    public function peserta($id)
    {
      $peserta = new PesertaModel;

      $id = decrypt($id);
      $data['peserta'] = $peserta->find($id);

      $model = new KegiatanModel;
      $data['kegiatan'] = $model->find($data['peserta']->kegiatan_id);

      return view('pengelola/kegiatan/biodata', $data);
    }

    public function active($id)
    {
      $model = new KegiatanModel;
      $update = $model->update($id,['is_active'=>1]);

      return redirect()->back()->with('message', 'Form telah aktif.');
    }

    public function deactive($id)
    {
      $model = new KegiatanModel;
      $update = $model->update($id,['is_active'=>0]);

      return redirect()->back()->with('message', 'Form telah aktif.');
    }

    public function delete($id)
    {
      $model = new PesertaModel;
      $id = decrypt($id);
      $update = $model->delete($id);

      return redirect()->back()->with('message', 'Peserta telah dihapus.');
    }

    public function exportpdf($id)
    {
      $pmodel = new PesertaModel;
      $peserta = $pmodel->where('kegiatan_id',$id)->findAll();

      $model = new KegiatanModel;
      $data['kegiatan'] = $model->find($id);

      $dompdf = new Dompdf();
      $dompdf->set_option('isRemoteEnabled', true);
      $dompdf->set_option('defaultFont', 'Courier');

      $dompdf->setPaper('A4', 'potrait');

      $data['pesertas'] = $pmodel->where('kegiatan_id',$id)->findAll();

      $data['logo'] = file_get_contents('https://ropeg.kemenag.go.id/apps/kegiatan/assets/images/logo_kemenag_black.png');

      $dompdf->loadHtml(view('pengelola/kegiatan/pdf', $data ));

      $dompdf->render();
      $dompdf->stream();
    }

    public function topdf($id)
    {
      $dompdf = new Dompdf();
  		$dompdf->set_option('isRemoteEnabled', true);
      $dompdf->set_option('defaultFont', 'Courier');

      $dompdf->setPaper('A4', 'potrait');

      $peserta = new PesertaModel;

      $id = decrypt($id);
      $data['pesertas'] = $peserta->where('id',$id)->findAll();

      $model = new KegiatanModel;
      $data['kegiatan'] = $model->find($data['pesertas'][0]->kegiatan_id);

      $data['logo'] = file_get_contents('https://ropeg.kemenag.go.id/apps/kegiatan/assets/images/logo_kemenag_black.png');

      $dompdf->loadHtml(view('pengelola/kegiatan/pdf', $data ));

      $dompdf->render();
      $dompdf->stream();
    }

    public function export($id)
    {
      // $id = decrypt($id);

      $model = new KegiatanModel;
      $giat= $model->find($id);

      $peserta = new PesertaModel;
      $peserta = $peserta->where('kegiatan_id',$id)->findAll();

      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      $sheet->setCellValue('A1', 'Biodata Kegiatan '.$giat->kegiatan);
      $sheet->setCellValue('A2', 'NIP');
      $sheet->setCellValue('B2', 'NAMA');
      $sheet->setCellValue('C2', 'JABATAN');
      $sheet->setCellValue('D2', 'PANGKAT');
      $sheet->setCellValue('E2', 'GOLONGAN');
      $sheet->setCellValue('F2', 'INSTANSI');
      $sheet->setCellValue('G2', 'ALAMAT KANTOR');
      $sheet->setCellValue('H2', 'ALAMAT RUMAH');
      $sheet->setCellValue('I2', 'NO HP');
      $sheet->setCellValue('J2', 'EMAIL');
      $sheet->setCellValue('K2', 'NPWP');
      $sheet->setCellValue('L2', 'REKENING_BANK');
      $sheet->setCellValue('M2', 'REKENING_NOMOR');
      $sheet->setCellValue('N2', 'REKENING_ATASNAMA');
      $sheet->setCellValue('O2', 'SIGN_AT');

      $i = 3;
      foreach ($peserta as $row) {
        $sheet->getCell('A'.$i)->setValueExplicit($row->nip,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        $sheet->setCellValue('B'.$i, $row->nama);
        $sheet->setCellValue('C'.$i, $row->jabatan);
        $sheet->setCellValue('D'.$i, $row->pangkat);
        $sheet->setCellValue('E'.$i, $row->golongan);
        $sheet->setCellValue('F'.$i, $row->instansi);
        $sheet->setCellValue('G'.$i, $row->alamatkantor);
        $sheet->setCellValue('H'.$i, $row->alamatrumah);
        $sheet->setCellValue('I'.$i, $row->nohp);
        $sheet->setCellValue('J'.$i, $row->email);
        $sheet->setCellValue('K'.$i, $row->npwp);
        $sheet->setCellValue('L'.$i, $row->bank);
        $sheet->getCell('M'.$i)->setValueExplicit($row->norek,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        $sheet->setCellValue('N'.$i, $row->atasnama);
        $sheet->setCellValue('O'.$i, $row->created_at);

        $i++;
      }

      $writer = new Xlsx($spreadsheet);
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="Biodata Kegiatan.xlsx"');
      $writer->save('php://output');
      exit();
    }
}
