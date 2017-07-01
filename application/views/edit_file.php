<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->input->post()){   
   $name    = set_value('name');
} else {   
   $name    = $models->name;
}
?>

<div class="container">
<h1>Alterar model</h1>
<div id="body">
  <?php if(validation_errors() || isset($error)) : ?>
  <div class="alert alert-danger" role="alert" align="center">
    <?=validation_errors()?>
    <?=(isset($error)?$error:'')?>
  </div>
  <?php endif; ?>
  <?=form_open_multipart('model/edit/'.$models->id)?>
  <div class="form-group">
    <label for="userfile">Arquivo do modelo</label>
    <div class="row" style="margin-bottom:5px">
      <div class="col-xs-12 col-sm-6 col-md-3">
        <?= $models->file ?>
      </div>
    </div>
    <input type="file" class="form-control" name="userfile">
  </div>
  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" value="<?=$name?>">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
  <?=anchor('model','Cancel',['class'=>'btn btn-warning'])?>
  </form>
</div>
