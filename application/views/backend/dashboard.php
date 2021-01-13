<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Suhu Ruangan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id="suhu"></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-temperature-low fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-8 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-2">Waktu Penetasan</div>

              <span class="h5 mb-0 font-weight-bold text-gray-800" id="bulan"><?= $bulan; ?></span>
              <span class="h5 mb-0 font-weight-bold text-gray-800">bulan, </span>
              <span class="h5 mb-0 font-weight-bold text-gray-800" id="hari"><?= $hari; ?></span>
              <span class="h5 mb-0 font-weight-bold text-gray-800">hari - </span>
              <span class="h5 mb-0 font-weight-bold text-gray-800" id="jam"><?= $jam; ?></span>
              <span class="h5 mb-0 font-weight-bold text-gray-800">jam, </span>
              <span class="h5 mb-0 font-weight-bold text-gray-800" id="menit"><?= $menit; ?></span>
              <span class="h5 mb-0 font-weight-bold text-gray-800">menit, </span>
              <span class="h5 mb-0 font-weight-bold text-gray-800" id="detik"><?= $detik; ?></span>
              <span class="h5 mb-0 font-weight-bold text-gray-800">detik</span>
              <br>
              <span class="h6 mb-0 font-weight-bold text-gray-800" id="keterangan"></span>
            </div>
            <div class="col-auto">
              <i class="fas fa-clock fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  window.setTimeout("waktu()", 1000);

  function waktu() {
    let bulan = parseInt($('#bulan').text());
    let hari = parseInt($('#hari').text());
    let jam = parseInt($('#jam').text());
    let menit = parseInt($('#menit').text());
    let detik = parseInt($('#detik').text());

    setTimeout("waktu()", 1000);
    detik += 1;
    if (detik == 60) {
      detik = 0;
      menit += 1;
    }
    if (menit == 60) {
      menit = 0;
      jam += 1;
    }
    if (jam == 24) {
      jam = 0;
      hari += 1;
    }
    $('#hari').text(hari);
    $('#jam').text(jam);
    $('#menit').text(menit);
    $('#detik').text(detik);
  }

  function tampil() {
    $.ajax({
      url: "<?= base_url('Dashboard/dashboard_realtime') ?>",
      dataType: 'json',
      success: function(result) {

        $('#suhu').text(result["data"][0]["suhu"]);

        $('#suhu').append('<sup style="font-size: 20px">o</sup>');

        $('#keterangan').text(result["keterangan"]);

        setTimeout(tampil, 2000);
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    tampil();
  });
</script>