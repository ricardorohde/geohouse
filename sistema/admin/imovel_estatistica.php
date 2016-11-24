<?
require_once 'inc/conexao.php';

$hash = $_GET['hash'];


include("inc/header.php");

?>
<div class="container">
	<div class="row" style="margin-bottom:20px;">
		<div class="col-md-12">
			<a href="imoveis.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
			<h1 class="pull-right">Stats do Imóvel</h1>
		</div>
	</div>
</div>

<div class="container panel">
	<div class="panel-body">

		<canvas id="myChart" width="100%" height="400"></canvas>

	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<a href="imprimir" class="btn btn-default btn-lg"><i class="fa fa-print"></i> imprimir</a>
		</div>
		<div class="col-md-3">
			<a href="imprimir" class="btn btn-default btn-lg"><i class="fa fa-save"></i> salvar</a>
		</div>
		<div class="col-md-3">
			<a href="imprimir" class="btn btn-default btn-lg"><i class="fa fa-facebook"></i> compartilhar</a>
		</div>
		<div class="col-md-3">
			<a href="imprimir" class="btn btn-default btn-lg"><i class="fa fa-eye"></i> ver imovel</a>
		</div>
	</div>
</div>


<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

<? include("inc/footer.php"); ?>
