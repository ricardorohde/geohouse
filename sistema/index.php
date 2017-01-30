<?php
$pagina = 'home';
include("inc/header.php");

$imovel_slide 		= ModelImovel::where('ORDER BY RAND() LIMIT 3');
$totalslide       = count($imovel_slide);

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  <?
  for($i=0; $i<$totalslide; $i++){
    echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" '.(($i==0)?'class="active"':'').'></li>';
  }
  ?>
  </ol>
  <div class="carousel-inner" role="listbox">

    <?

    $ativa1 = 0;
    if(count($imovel_slide)>0){
      foreach($imovel_slide as $val){
        $foto = ModelImovelFoto::where('WHERE id_imovel = '.$val->getid().' ');
        if(count($foto)>0){
          $afoto = 'img/imoveis/'.$foto[0]->getimagem();
        }
        $imovel_categoria = ModelCategoria::where("WHERE id='".$val->getid_categoria()."' LIMIT 1")[0]->getnome();

        echo '<div class="item '.(($ativa1==0)?'active':'').'" style="background-image:url('.$afoto.');">
            <!--<img class="first-slide" src="'.$afoto.'" alt="First slide">-->
            <div class="container">
              <div class="carousel-caption">
                <h1>'.$val->getnome().'</h1>
                <a href="encontre-imoveis-'.$imovel_categoria.'-'.$val->gethash().'" class="btn btn-transparente">detalhes</a>
              </div>
            </div>
          </div>';
        $ativa1 =1;
      }
    }
    ?>

  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>


<div class="container" style="margin-bottom:50px;">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
      <img src="img/ilustra.jpg" width="80%" height="180px" >
    </div>
    <div class="col-md-6 col-md-offset-3 text-center">
      <p>LOREM IPSUM LLOREM IPSUM LLOREM IPSUM LLOREM IPSUM LLOREM IPSUM LLOREM IPSUM
         LLOREM IPSUM LLOREM IPSUM LLOREM IPSUM LLOREM IPSUM LLOREM IPSUM LLOREM IPSUM LLOREM IPSUM LLOREM IPSUM L</p>
      <a href="sobre" class="btn btn-default">Sobre nós</a>
    </div>
  </div>
</div>

<div class="base_destaque">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1>
        ENCONTRE <br/><span class="amarelo">IMÓVEIS</span> PARA ...
        </h1>
        <a href="imoveis-aluguel" class="btn btn-transparente">ALUGAR</a>
        <a href="imoveis-venda" class="btn btn-transparente">COMPRAR</a>
      </div>
      <div class="col-md-5" style="margin-bottom:-80px;">
        <img class="featurette-image img-responsive center-block" src="img/img_constru.png" alt="Imagem ilustrativa">
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <h1 class="text-center titulo1">ÚLTIMOS IMÓVEIS</h1>

    <!-- imoveis -->
    <?
    $imoveis 		= ModelImovel::where('ORDER BY RAND() LIMIT 4');
    if(count($imoveis)>0){
      foreach($imoveis as $val){
        $foto = ModelImovelFoto::where('WHERE id_imovel = '.$val->getid().' ');
        if(count($foto)>0){
          //$afoto = 'img/imoveis/'.$foto[0]->getimagem();
          $afoto = $foto[0]->getimagem();
        }
        $imovel_categoria = ModelCategoria::where("WHERE id='".$val->getid_categoria()."' LIMIT 1")[0]->getnome();
        echo '
          <div class="col-md-3">
            <div class="panel text-center box_imovel">
              <img src="thumb.php?imagem='.$afoto.'&largura=200&altura=100" class="img-responsive" width="100%" >
              <a href="encontre-imoveis-'.$imovel_categoria.'-'.$val->gethash().'" class="btn btn-transparente2 btn-xs">
               '.$imovel_categoria.'</a>
              <p>'.$val->getnome().'</p>
            </div>
          </div>

          ';
      }
    }else{
      echo '<div class="alert alert-info">Nenhum imóvel encontrado.</div>';
    }
    ?>
    <!-- fim imoveis -->

  </div>
  <div class="row text-center">
      <a href="imoveis-aluguel">encontre imóveis para alugar</a> |
      <a href="imoveis-venda">encontre imóveis para comprar</a>
    </div>
</div>

<div class="container">
  <div class="row">
    <h1 class="text-center titulo1">MUNDO IMOBILIÁRIO</h1>
    <!-- NOTICIAS -->
  </div>

</div>

<? include("inc/footer.php"); ?>
