<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
  <h1></h1>
  <div class="col-md-12">
    <?php if($models->num_rows() > 0) : ?>
    <?php if($this->session->flashdata('message')) : ?>
    <div class="alert alert-success" role="alert" align="center">
      <?=$this->session->flashdata('message')?>
    </div>
    <?php endif; ?>
    <div align="center">
      <?=anchor('model/add','Adicionar um novo modelo',['class'=>'btn btn-primary'])?>
    </div>
    <hr />
    <div class="row">
      <table class="table table-responsive">
        <tr>
          <td>Link do arquivo enviado</td>
          <td>Nome do arquivo</td>
          <td>Opções</td>
        </tr>
        <tr>
          <?php foreach($models->result() as $model) : ?>
          <td><?= $model->file?></td>
          <td><?= $model->name ?></td>
          <td><?=anchor('model/edit/'.$model->id,'Edit',['class'=>'btn btn-warning', 'role'=>'button'])?>
            <?=anchor('model/delete/'.$model->id,'Delete',['class'=>'btn btn-danger', 'role'=>'button','onclick'=>'return confirm(\'Are you sure?\')'])?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <?php else : ?>
    <div align="center">Ainda não foi enviado nenhum modelo, va em frente e
      <?=anchor('model/add','adicione um novo modelo')?>
      .</div>
    <?php endif; ?>
  </div>
</div>
