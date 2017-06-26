<?php

/**
 
 * Created by PhpStorm.
 * User: Dominus
 * Date: 24/06/2017
 * Time: 17:53
 
 */

?>

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
    <div class="col-sm-9">
      <canvas id="demoChart" style="width: 600px; height: 350px;"></canvas>
    </div>
    <div class="col-sm-3">
      <div id="demoLegend">
         
      </div>
    </div>
  </div>
  </div>