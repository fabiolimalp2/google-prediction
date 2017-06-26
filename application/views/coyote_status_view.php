<?php
/**

* Created by PhpStorm.
 * User: Dominus
 * Date: 24/06/2017
 * Time: 17:57

 */


?>

<main>
  <div class="container">
    <h2> <?php echo $status['trainingStatus']; ?></h2>
    <div class="row">
      <div class="col-sm-9">
        <table>
          <tr>
            <td><?php echo $status['id']; ?></td>
            </tr>
            <tr>
            <td><?php echo $status['kind']; ?></td>
            </tr>
            <tr>
            <td><?php echo $status['storageDataLocation']; ?></td>
            </tr>
            <tr>
            <td><?php echo $status['trainingStatus']; ?></td>
          </tr>
        </table>
        <hr>
        <?php foreach($status as $row) : ?>
        <table>
          <tr>
            <td><?php  echo $row;  ?></td>
          </tr>
        </table>
        <?php	endforeach; ?>
      </div>
    </div>
  </div>
</main>
