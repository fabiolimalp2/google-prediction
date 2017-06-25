<?php

/**
 
 * Created by PhpStorm.
 * User: Dominus
 * Date: 24/06/2017
 * Time: 17:53
 
 */

?>

<table>
  <?php foreach ($result->getOutputMulti() as $k => $v) { ?>
  <tr>
    <td><?php   echo "Label: " . $v->getLabel(); ?></td>
    <td><?php    echo "Score: " . $v->getScore(); ?></td>
  </tr>
  <?php  } ?>
</table>
