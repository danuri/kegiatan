<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Biodata Peserta</title>
    <style>
      /* @font-face {
        font-family: 'OpenSans-Regular';
        font-style: normal;
        font-weight: normal;
        src: url(http://" . $_SERVER['SERVER_NAME']."/dompdf/fonts/OpenSans-Regular.ttf) format('truetype');
      }
      @font-face {
        font-family: 'OpenSans-Bold';
        font-style: normal;
        font-weight: 700;
        src: url(http://" . $_SERVER['SERVER_NAME']."/dompdf/fonts/OpenSans-Bold.ttf) format('truetype');
      } */
      #table {
        font-family: "Calibri, sans-serif";
        border-collapse: collapse;
        width: 100%;
        font-size: 12px;
      }

      #table td, #table th {
        /* border: 1px solid #ddd; */
        padding: 8px;
      }

      #table tr:nth-child(even){background-color: #f2f2f2;}

      #table tr:hover {background-color: #ddd;}

      #table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }

      .table {
        font-family: "Calibri, sans-serif";
        font-size: 15px;
      }

      #biodata td, #biodata th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #header td {
        padding: 8px;
      }

      .kotak {
        border-style: double;
        padding: 5px;
        height: 1010px;
      }
      </style>
  </head>
  <body>
    <div class="kotak">
      <table class="table" width="100%" id="header">
        <tr>
          <td>
            <center>
              <img src="data:image/png;base64, <?= base64_encode($logo);?>" width="100px">
              <h2>BIODATA PESERTA</h2>
              <h3>KEGIATAN <?= strtoupper($kegiatan->kegiatan);?></h3>
              <h3><?= $kegiatan->lokasi;?><br><?= $kegiatan->kota.', '.local_date($kegiatan->waktu_awal);?></h3>
            </center>
          </td>
        </tr>
      </table>
      <table class="table" cellpadding="8">
        <tr>
          <td>NIP</td>
          <td>:</td>
          <td><?= $peserta->nip;?></td>
        </tr>
        <tr>
          <td>NAMA</td>
          <td>:</td>
          <td><?= $peserta->nama;?></td>
        </tr>
        <tr>
          <td>JABATAN</td>
          <td>:</td>
          <td><?= $peserta->jabatan;?></td>
        </tr>
        <tr>
          <td>PANGKAT, GOL/RUANG</td>
          <td>:</td>
          <td><?= $peserta->pangkat.', '.$peserta->golongan;?></td>
        </tr>
        <tr>
          <td>UNIT KERJA / INSTANSI</td>
          <td>:</td>
          <td><?= $peserta->instansi;?></td>
        </tr>
        <tr>
          <td>ALAMAT KANTOR</td>
          <td>:</td>
          <td><?= $peserta->alamatkantor;?></td>
        </tr>
        <tr>
          <td>ALAMAT RUMAH</td>
          <td>:</td>
          <td><?= $peserta->alamatrumah;?></td>
        </tr>
        <tr>
          <td>EMAIL</td>
          <td>:</td>
          <td><?= $peserta->email;?></td>
        </tr>
        <tr>
          <td>NO. HP</td>
          <td>:</td>
          <td><?= $peserta->nohp;?></td>
        </tr>
        <tr>
          <td>BANK</td>
          <td>:</td>
          <td><?= $peserta->bank;?></td>
        </tr>
        <tr>
          <td>NPWP</td>
          <td>:</td>
          <td><?= $peserta->npwp;?></td>
        </tr>
        <tr>
          <td>NOMOR REKENING</td>
          <td>:</td>
          <td><?= $peserta->norek;?></td>
        </tr>
        <tr>
          <td>ATAS NAMA</td>
          <td>:</td>
          <td><?= $peserta->atasnama;?></td>
        </tr>
      </table>

      <table class="table" width="100%">
        <tr>
          <td width="30%"></td>
          <td width="20%"></td>
          <td width="40%">
            <?= $kegiatan->kota.', '.date('d-m-Y', strtotime($kegiatan->tanggal_sign))?><br>
            <img src="<?= $peserta->signature;?>" width="150px" /><br>
            <u><?= $peserta->nama?></u><br>
            NIP <?= $peserta->nip?>
          </td>
        </tr>
      </table>
    </div>

  </body>
</html>
