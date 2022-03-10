<script src="laporan/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="laporan/highcharts.js" type="text/javascript"></script>
<script src="laporan/exporting.js" type="text/javascript"></script>

<?php
$q_thn_msk 	= mysqli_query($conn, "SELECT MID(no_agenda_masuk, 8, 2) AS tahun, COUNT(MID(no_agenda_masuk, 8, 2)) AS jumlah FROM tb_surat_masuk GROUP BY MID(no_agenda_masuk, 8, 2)");
$q_thn_klr 	= mysqli_query($conn, "SELECT MID(no_agenda_keluar, 8, 2) AS tahun, COUNT(MID(no_agenda_keluar, 8, 2)) AS jumlah FROM tb_surat_keluar GROUP BY MID(no_agenda_keluar, 8, 2)");
?>

<div class="container"style="width: 100%;margin-left: 15px;padding: 0">
    <div class="row">
        <div class="col-md-6">
            <div class="list-group" style="width: 100%;box-shadow: 0 0 9px 4px rgba(255,255,255,0.50),0 1px 10px 0 rgba(9,9,9,9.12),0 2px 4px -1px rgba(9,9,9,9.3);">
                <div id="surat_masuk" style="width:100%; height:500px;"></div>
                <div class="container-fluid">
                    <div class="row">
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group" style="width: 100%;box-shadow: 0 0 9px 4px rgba(255,255,255,0.50),0 1px 10px 0 rgba(9,9,9,9.12),0 2px 4px -1px rgba(9,9,9,9.3);">
                <div id="surat_keluar" style="width:100%; height:500px;"></div>
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'surat_masuk',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 25,
                depth: 70,
                viewDistance: 25
            }
        },
        title: {
            text: 'Laporan Grafik Surat Masuk'
        },
        subtitle: {
            text: 'Jumlah Surat Masuk Perbulan'
        },
        xAxis: {
            categories: ['Bulan']
        },
        yAxis: {
            title: {
                text: 'Jumlah Surat Masuk'
            }
        },
        plotOptions: {
            column: {
                depth: 65
            }
        },

        series:
            [
                <?php
                while ($data = mysqli_fetch_array($q_thn_msk)) {
                $tahun 	= $data['tahun'];
                $jml    = intval($data['jumlah']);
                ?>
                {
                    name: '<?php echo $tahun; ?>',
                    data: [<?php echo $jml; ?>]
                },
                <?php } ?>
            ]
    });

    function showValues() {
        $('#alpha-value').html(chart.options.chart.options3d.alpha);
        $('#beta-value').html(chart.options.chart.options3d.beta);
        $('#depth-value').html(chart.options.chart.options3d.depth);
    }

    // Activate the sliders
    $('#sliders input').on('input change', function () {
        chart.options.chart.options3d[this.id] = parseFloat(this.value);
        showValues();
        chart.redraw(false);
    });

    showValues();
</script>

<script type="text/javascript">
    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'surat_keluar',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Laporan Grafik Surat Keluar'
        },
        subtitle: {
            text: 'Jumlah Surat Keluar Perbulan'
        },
        xAxis: {
            categories: ['Bulan']
        },
        yAxis: {
            title: {
                text: 'Jumlah Surat Keluar'
            }
        },
        plotOptions: {
            column: {
                depth: 65
            }
        },

        series:
            [
                <?php
                while ($data = mysqli_fetch_array($q_thn_klr)) {
                $tahun 	= $data['tahun'];
                $jml    = intval($data['jumlah']);
                ?>
                {
                    name: '<?php echo $tahun; ?>',
                    data: [<?php echo $jml; ?>]
                },
                <?php } ?>
            ]
    });

    function showValues() {
        $('#alpha-value').html(chart.options.chart.options3d.alpha);
        $('#beta-value').html(chart.options.chart.options3d.beta);
        $('#depth-value').html(chart.options.chart.options3d.depth);
    }

    // Activate the sliders
    $('#sliders input').on('input change', function () {
        chart.options.chart.options3d[this.id] = parseFloat(this.value);
        showValues();
        chart.redraw(false);
    });

    showValues();
</script>