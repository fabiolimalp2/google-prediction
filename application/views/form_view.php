<?php
defined('BASEPATH') OR exit('No direct script access allowed');




?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="well">
        <table class="table table-responsive">
          <?php foreach($model_info->result() as $row) : ?>
          <tr>
            <td><?php  echo $row->model_description;  ?></td>
          </tr>
          <?php	endforeach; ?>
        </table>
      </div>
    </div>
    <div class="col-md-12">
      <div class="well">
        <form action="<?php echo $action; ?>" method="post">
          <div class="form-group">
            <label for="">Digite aqui uma frase/ ou palavra para ser interpretada pela api</label>
            <input type="text" class="form-control" id="" name="pesquisa" placeholder="">
          </div>
          <button type="submit" name="submit" class="btn btn-default">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>
