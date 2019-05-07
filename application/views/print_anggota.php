<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    body{
      margin:0;
      padding: 0;
      font-family: arial;
    }
    .head{
      text-align: center;
      font-size: 16px;
      border-bottom: 1px solid black;
    }
    .card{
      border: 1px solid black;
      display: inline-block;
      width: 400px;
      height: 250px;
    }
    .pp{
      max-width: 100%;
      height: 90px;
    }
    .pp_col{
      padding-top: 10px;
      text-align: center;
    }
    table{
      width: 100%;
      font-size: 12px;
    }
    .qr{
      text-align: center;
    }
    .jarak{
      padding: 5px;
    }
    .bc{
      padding: 10px;
    }
  .bc a{
    padding: 5px 10px;
    background-color: #757575;
    color: white;
    text-decoration: none;
  }
    @media print{
      body{
        margin:0;
        padding: 0;
        font-family: arial;
      }
      .head{
        text-align: center;
        font-size: 16px;
        border-bottom: 1px solid black;
      }
      .card{
        border: 1px solid black;
        display: inline-block;
        width: 400px;
        height: 250px;
      }
      .pp{
        max-width: 100%;
        height: 90px;
      }
      .pp_col{
        padding-top: 10px;
        text-align: center;
      }
      table{
        width: 100%;
        font-size: 12px;
      }
      .qr{
        text-align: center;
      }
      .jarak{
        padding: 5px;
      }
      .bc{
        display: none;
      }
    }
    </style>
  </head>
  <body>
    <div class="card">
      <table>
        <tr>
          <td colspan="4" class="head">
            <h3>Kartu Perpustakaan</h3>
          </td>
        </tr>
        <tr>
          <td colspan="4" class="jarak"></td>
        </tr>
        <tr>
          <td rowspan="5" class="pp_col"><img src="<?= base_url().'assets/img/'.$anggota->photo_anggota ?>" alt="" class="pp"></td>
          <td>Nama</td>
          <td>: Aditya</td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>: Laki-Laki</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>: Aditya@gmail.com</td>
        </tr>
        <tr>
          <td>Tlp</td>
          <td>: 089211432</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>: jl.persahabant</td>
        </tr>
        <tr>
          <td colspan="1" class="qr">
            <img src="https://chart.googleapis.com/chart?chs=60x60&cht=qr&chl=<?= $anggota->id_anggota ?>&choe=UTF-8" title="Link to Google.com" />
          </td>
        </tr>
      </table>
    </div>
    <div class="bc">
        <a href="<?= base_url() ?>admin/anggota">Back</a>
    </div>

    <script type="text/javascript">
      window.print();
    </script>
      </body>
</html>
