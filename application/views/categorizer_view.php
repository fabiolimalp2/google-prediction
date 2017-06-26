<?php
/**
 * Created by PhpStorm.
 * User: Dominus
 * Date: 18/06/2017
 * Time: 01:57
 */


?>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://sampaio.16mb.com/chartjs/assets/Chart.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){

var data = [
    <?php foreach ($result as $row): ?>
    {   
                        

            
        value: <?= $row->score; ?>,
        color: "rgba(220,220,220,0.8)",
        highlight: "rgba(151,187,205,0.5)",
        label: "<?= $row->label; ?>"
    },
	<?php endforeach; ?>

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
  
<?php


 foreach($result as $row) : ?>

<table>
  <tr>
    <td><?php  echo $row->label;  ?></td>
    <td><?php  echo $row->score;   ?></td>
  </tr>
</table>
<?php	endforeach; ?>

