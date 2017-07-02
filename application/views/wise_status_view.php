<?php
/**

* Created by PhpStorm.
 * User: Dominus
 * Date: 24/06/2017
 * Time: 17:57

 */


?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <div class="well">
          <h2> <?php echo $status['trainingStatus']; ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="well">
        <table class="table table-responsive table-bordered">
          <tr>
            <td></td>
            <td><?php echo $status['id']; ?></td>
          </tr>
          <tr>
            <td></td>
            <td><?php echo $status['kind']; ?></td>
          </tr>
          <tr>
            <td></td>
            <td><?php echo $status['storageDataLocation']; ?></td>
          </tr>
          <tr>
            <td></td>
            <td><?php echo $status['trainingStatus']; ?></td>
          </tr>
        </table>
        <hr>
        <table class="table table-responsive table-bordered">
          <?php foreach($status as $row) : ?>
          <tr>
            <td></td>
            <td><?php  echo $row;  ?></td>
          </tr>
          <?php	endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>
