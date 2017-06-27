<?php
/**
* Created by PhpStorm.
 * User: Dominus
 * Date: 24/06/2017
 * Time: 17:57
 */
?>

<?php echo "Training Result:";  ?>

<div class="container">
  <div class="well">
    <table class="table table-responsive table-bordered">
      <?php foreach($training_result as $row) : ?>
      <tr>
        <td><?php  echo $row;  ?></td>
      </tr>
      <?php	endforeach; ?>
    </table>
  </div>
</div>
