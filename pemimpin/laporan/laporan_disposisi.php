<script src="laporan/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="laporan/highcharts.js" type="text/javascript"></script>
<script src="laporan/exporting.js" type="text/javascript"></script>

<?php
$q_disposisi = mysqli_query($conn, "SELECT MID(tanggal_disposisi, 6, 2) AS tahun, COUNT(MID(no_agenda_masuk, 8, 2)) AS jumlah FROM tb_disposisi GROUP BY MID(no_agenda_masuk, 8, 2)");
?>

<div class="container"style="width: 100%;padding: 0;margin-left:15px;">
    <div class="row">
        <div class="col-md-12">
            <div class="list-group" style="width: 100%;box-shadow: 0 0 9px 4px rgba(255,255,255,0.50),0 1px 10px 0 rgba(9,9,9,9.12),0 2px 4px -1px rgba(9,9,9,9.3);">
                <div id="disposisi" style="width:100%; height:500px;"></div>
                <div class="container-fluid">
                    <div class="row">
                       </div>
                    </div>
            </div>
        </div>
        <script type="text/javascript">

            // Set up the chart
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'disposisi',
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
                    text: 'Laporan Grafik Desposisi'
                },
                subtitle: {
                    text: 'Jumlah Disposisi Perbulan'
                },
                xAxis: {
                    categories: ['Bulan']
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Disposisi'
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
                        while ($data = mysqli_fetch_array($q_disposisi)) {
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
