<?php
/**
* Created by PhpStorm.
 * User: Dominus
 * Date: 24/06/2017
 * Time: 17:57
 */
?>

<?php 
print_r($training_result);

 ?><?php echo "Training Result:";  ?>

<main>
  <div class="container">
    <table>
      <?php foreach($training_result as $row) : ?>
      <tr>
        <td><?php  echo $row;  ?></td>
      </tr>
      <?php	endforeach; ?>
    </table>
    
  </div>
</main>
