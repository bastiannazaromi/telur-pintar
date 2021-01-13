<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ; ?></h1>

    <div class="row">
	    <div class="col-xl-3 mb-4">
            <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header <?php echo $kontrol[0]['lampu1'] == 1 ? 'bg-warning' : 'bg-danger' ;?> text-center text-white">
                    Lampu 1
                </div>
                <div class="card-body">
                    <p class="card-text">Tekan tombol dibawah ini untuk mengontrol lampu incubator</p>
                </div>
                <div class="card-footer bg-light text-center">
                    <label class="card-text text-dark">Tombol &nbsp</label>
                    <input type="checkbox" data-toggle="toggle" id="lampu1" name="lampu1" value="<?= $kontrol[0]['lampu1'] ; ?>" <?php if($kontrol[0]['lampu1'] == 1) echo "checked" ;?>>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 mb-4">
            <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header <?php echo $kontrol[0]['lampu2'] == 1 ? 'bg-warning' : 'bg-danger' ;?> text-center text-white">
                    Lampu 2
                </div>
                <div class="card-body">
                    <p class="card-text">Tekan tombol dibawah ini untuk mengontrol lampu incubator</p>
                </div>
                <div class="card-footer bg-light text-center">
                    <label class="card-text text-dark">Tombol &nbsp</label>
                    <input type="checkbox" data-toggle="toggle" id="lampu2" name="lampu2" value="<?= $kontrol[0]['lampu2'] ; ?>" <?php if($kontrol[0]['lampu2'] == 1) echo "checked" ;?>>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-4">
            <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header <?php echo $kontrol[0]['lampu3'] == 1 ? 'bg-warning' : 'bg-danger' ;?> text-center text-white">
                    Lampu 3
                </div>
                <div class="card-body">
                    <p class="card-text">Tekan tombol dibawah ini untuk mengontrol lampu incubator</p>
                </div>
                <div class="card-footer bg-light text-center">
                    <label class="card-text text-dark">Tombol &nbsp</label>
                    <input type="checkbox" data-toggle="toggle" id="lampu3" name="lampu3" value="<?= $kontrol[0]['lampu3'] ; ?>" <?php if($kontrol[0]['lampu3'] == 1) echo "checked" ;?>>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-4">
            <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header <?php echo $kontrol[0]['lampu4'] == 1 ? 'bg-warning' : 'bg-danger' ;?> text-center text-white">
                    Lampu 4
                </div>
                <div class="card-body">
                    <p class="card-text">Tekan tombol dibawah ini untuk mengontrol lampu incubator</p>
                </div>
                <div class="card-footer bg-light text-center">
                    <label class="card-text text-dark">Tombol &nbsp</label>
                    <input type="checkbox" data-toggle="toggle" id="lampu4" name="lampu4" value="<?= $kontrol[0]['lampu4'] ; ?>" <?php if($kontrol[0]['lampu4'] == 1) echo "checked" ;?>>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#lampu1').change(function() {
            let atribut = 'lampu1';
            let nilai = $(this).val();
            
            if (nilai == 0)
            {
                nilai = 1;
            }
            else
            {
                nilai = 0;
            }
            
            $.ajax({
                url: "<?= base_url('Dashboard/kontrolLampu') ; ?>",
                type: 'post',
                data: {
                    atribut: atribut,
                    nilai: nilai
                },
                success: function() {
                    document.location.href = "<?= base_url('Dashboard/kontrol') ; ?>";
                }
            });
        });

        $('#lampu2').change(function() {
            let atribut = 'lampu2';
            let nilai = $(this).val();
            
            if (nilai == 0)
            {
                nilai = 1;
            }
            else
            {
                nilai = 0;
            }
            
            $.ajax({
                url: "<?= base_url('Dashboard/kontrolLampu') ; ?>",
                type: 'post',
                data: {
                    atribut: atribut,
                    nilai: nilai
                },
                success: function() {
                    document.location.href = "<?= base_url('Dashboard/kontrol') ; ?>";
                }
            });
        });

        $('#lampu3').change(function() {
            let atribut = 'lampu3';
            let nilai = $(this).val();
            
            if (nilai == 0)
            {
                nilai = 1;
            }
            else
            {
                nilai = 0;
            }
            
            $.ajax({
                url: "<?= base_url('Dashboard/kontrolLampu') ; ?>",
                type: 'post',
                data: {
                    atribut: atribut,
                    nilai: nilai
                },
                success: function() {
                    document.location.href = "<?= base_url('Dashboard/kontrol') ; ?>";
                }
            });
        });

        $('#lampu4').change(function() {
            let atribut = 'lampu4';
            let nilai = $(this).val();
            
            if (nilai == 0)
            {
                nilai = 1;
            }
            else
            {
                nilai = 0;
            }
            
            $.ajax({
                url: "<?= base_url('Dashboard/kontrolLampu') ; ?>",
                type: 'post',
                data: {
                    atribut: atribut,
                    nilai: nilai
                },
                success: function() {
                    document.location.href = "<?= base_url('Dashboard/kontrol') ; ?>";
                }
            });
        });
    });
</script>