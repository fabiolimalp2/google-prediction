<?php

/**
 
 * Created by PhpStorm.
 * User: Dominus
 * Date: 24/06/2017
 * Time: 17:53
 
 */

?>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://sampaio.16mb.com/chartjs/assets/Chart.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

var data = [
    <?php foreach ($result->getOutputMulti() as $row) { ?>
    {                     
	
        value: <?php echo $row->getScore(); ?>,
        color: "rgba(220,220,220,0.8)",
        highlight: "rgba(151,187,205,0.5)",
        label: "<?php echo $row->getLabel(); ?>"
    },
	<?php } ?>

        ];

        var ctx = document.getElementById("demoChart").getContext("2d");
		var chart = new Chart(ctx).Pie(data);
        document.getElementById("demoLegend").innerHTML = chart.generateLegend();
    });
    </script>

<div class="container">
  <div class="row">

    <div class="col-md-8">
      <canvas id="demoChart" style="width: 600px; height: 350px;"></canvas>
    </div>
    <div class="col-md-4">
     <div class="well">
    <h3> O idioma foi interpretado como:</h3>
      <table class="table table-responsive">
        <?php foreach($result as $row) : ?>
        <tr>
          <td><?php  echo $row->label;  ?></td>
          <td><?php echo round($row->score * 100), '%'; ?></td>
        </tr>
        <?php	endforeach; ?>
      </table>
    </div>
  </div>
  </div>
</div>
