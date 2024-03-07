<?php

namespace App\Controllers;
use App\Models\KegiatanModel;
use App\Models\PegawaiModel;
use App\Models\PesertaModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function biodata($id)
    {
      $model = new KegiatanModel;

      $data['giat'] = $model->where(['kode' => $id,'is_active' => 1])->first();

      if (! $data['giat']) {
          throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }

      return view('biodata',$data);
    }

    public function biodatasuccess()
    {
      return view('biodata_success');
    }

    public function biodatasave($id)
    {
      if (! $this->validate([
          'nip' => "required",
          'nama' => "required",
          'jabatan' => "required",
          'pangkat' => "required",
          'golongan' => "required",
          'instansi' => "required",
          'alamatkantor' => "required",
          'alamatrumah' => "required",
        ])) {
            return redirect()->back()->with('message', 'Harap isi dengan lengkap.');
        }

        $model = new PesertaModel;

        $cek = $model->where(['kegiatan_id'=>$id,'nip'=>$this->request->getVar('nip')])->first();
        
        if($cek){
          return redirect()->back()->with('message', 'NIP Anda sudah terdaftar pada kegiatan ini.');
        }

        $param = [
          'kegiatan_id' => $id,
          'nip' => $this->request->getVar('nip'),
          'nama' => $this->request->getVar('nama'),
          'jabatan' => $this->request->getVar('jabatan'),
          'pangkat' => $this->request->getVar('pangkat'),
          'golongan' => $this->request->getVar('golongan'),
          'instansi' => $this->request->getVar('instansi'),
          'alamatkantor' => $this->request->getVar('alamatkantor'),
          'alamatrumah' => $this->request->getVar('alamatrumah'),
          'nohp' => $this->request->getVar('nohp'),
          'email' => $this->request->getVar('email'),
          'npwp' => $this->request->getVar('npwp'),
          'bank' => $this->request->getVar('bank'),
          'norek' => $this->request->getVar('norek'),
          'atasnama' => $this->request->getVar('atasnama'),
          'signature' => 'data:image/png;base64,'.$this->request->getVar('signpad'),
        ];

        $insert = $model->insert($param);

        if($insert){
          return redirect()->to('biodata/success');
        }else{
          return redirect()->back()->with('message', 'Biodata gagal tersimpan.');
        }
    }

    public function checkpegawai($nip)
    {
      $model = new PegawaiModel;
      $check = $model->find($nip);

      if($check){
        return $this->response->setJSON(['status'=>TRUE]);
      }else{
        return $this->response->setJSON(['status'=>FALSE]);
      }
    }

    public function getpegawai($nip,$password)
    {
      $model = new PegawaiModel;

      if($this->login($nip,$password)){
        $pegawai = $model->find($nip);

        $db = db_connect('simpeg');
        $lain = $db->query("SELECT * FROM TD_LAIN WHERE NIP='$pegawai->NIP'")->getRow();

        $pegawai = (array)$pegawai;
        $pegawai['lain'] = (array)$lain;

        $pegawai = (object)$pegawai;
        return $this->response->setJSON($pegawai);
      }else{
        $this->response->setStatusCode(404, 'NIP / Password tidak sesuai.');
      }
    }

    public function login($nip,$password)
    {
      $password = md5($password);
      $password = substr($password, 16,32).substr($password, 0,16);

      $db = db_connect('simpeg');
      $check = $db->query("SELECT * FROM TS_USER WHERE NIP='$nip' AND PWD='$password'")->getRow();

      if($check)
      {
        return true;
      }else{
        return false;
      }
    }
}
