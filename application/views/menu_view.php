<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <h2>Modelos de exemplo do Google</h2>
    <h3>Esses modelos não possuem permissão de upload, nem status, apenas predict </h3>
    <hr>
    <div class="row">
      <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?php echo site_url('base/category'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Categorias</p>
          </div>
        </div>
        </a> </div>
      <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?php echo site_url('base/sentiment'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Sentimento</p>
          </div>
        </div>
        </a> </div>
        <div class="col-xs-6 col-sm-3 col-md-2"> <a href="<?php echo site_url('base/language'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Linguagem</p>
          </div>
        </div>
        </a> </div>
    </div>
    <h2>Modelo do Google modificado</h2>
        <h3>Esse modelo é o exemplo Language-identifier do google com todas as permissões </h3>
    <hr>
    <div class="row">
      <div class="col-xs-6 col-sm-3 col-md-4"> <a href="<?php echo site_url('base/coyote_upload'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Treinar modelo</p>
          </div>
        </div>
        </a> </div>
      <div class="col-xs-6 col-sm-3 col-md-4"> <a href="<?php echo site_url('base/coyote_status'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Status do treinamento</p>
          </div>
        </div>
        </a> </div>
        <div class="col-xs-6 col-sm-3 col-md-4"> <a href="<?php echo site_url('base/coyote_predict'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Testar modelo</p>
          </div>
        </div>
        </a> </div>
    </div>
     <h2>Modelo Personalizado Alimentos</h2>
         <h3>Esse modelo foi criado e possui todas as permissões </h3>
    <hr>
    <div class="row">
      <div class="col-xs-6 col-sm-3 col-md-4"> <a href="<?php echo site_url('coyote/coyote_upload'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Treinar modelo</p>
          </div>
        </div>
        </a> </div>
      <div class="col-xs-6 col-sm-3 col-md-4"> <a href="<?php echo site_url('coyote/coyote_status'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Status do treinamento</p>
          </div>
        </div>
        </a> </div>
        <div class="col-xs-6 col-sm-3 col-md-4"> <a href="<?php echo site_url('coyote/coyote_predict'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Testar modelo</p>
          </div>
        </div>
        </a> </div>
    </div>
    
     <h2>Modelo Language Indentifier com Portugues</h2>
         <h3>Esse modelo reconhece o idioma portugues e possui todas as permissões </h3>
    <hr>
    <div class="row">
      <div class="col-xs-6 col-sm-3 col-md-4"> <a href="<?php echo site_url('wise/wise_upload'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Enviar arquivo de treino</p>
          </div>
        </div>
        </a> </div>
      <div class="col-xs-6 col-sm-3 col-md-4"> <a href="<?php echo site_url('wise/wise_status'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Status do treinamento</p>
          </div>
        </div>
        </a> </div>
        <div class="col-xs-6 col-sm-3 col-md-4"> <a href="<?php echo site_url('wise/wise_predict'); ?>" class="btn btn-default">
        <div class="row"> 
          <div class="col-xs-12 text-center">
            <p>Testar modelo</p>
          </div>
        </div>
        </a> </div>
    </div>
    
  </div>
