<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
<h1>Enviar novo modelo</h1>
<div id="body">
  <?php if(validation_errors() || isset($error)) : ?>
  <div class="alert alert-danger" role="alert" align="center">
    <?=validation_errors()?>
    <?=(isset($error)?$error:'')?>
  </div>
  <?php endif; ?>
  <?=form_open_multipart('model/add')?>
  <div class="form-group">
    <label for="userfile">Arquivo do modelo</label>
    <input type="file" class="form-control" name="userfile">
  </div>
  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" value="">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
  <?=anchor('model','Cancel',['class'=>'btn btn-warning'])?>
  </form>
</div>
