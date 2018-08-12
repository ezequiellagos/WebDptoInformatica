{% extends 'template/base.php' %}

{% block content %}
  <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Academicos</h1>
        </div>
</div>
<div class="row">
    <div class="col-8">
    <!--slider-->
    <div class="container"> 
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="" src="<?= ROUTE_URL ?>img/upla.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="" src="<?= ROUTE_URL ?>img/instagram.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="" src="<?= ROUTE_URL ?>img/upla.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
  </div>
  
  </div>
  <!--fin slider-->
  <div class="row container-fluid">
    <div class="col-12">
      <p><h4><b>Noticias</b></h4></p>
    </div>
  </div>
  <div class="row container">
    <!--primera fila de academicos -->
    <div class="col-4 margen" >
      <div class="card" style="width: 15rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>
    <div class="col-4  margen">
      <div class="card" style="width: 15rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>
    <div class="col-4 margen">
      <div class="card" style="width: 15rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>
    <!--fin primera fila de academicos -->

    <!--segunda fila de academicos -->
    <div class="col-4  margen">
      <div class="card" style="width: 15rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>
    <div class="col-4  margen">
      <div class="card" style="width: 15rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>
    <div class="col-4 margen">
      <div class="card" style="width: 15rem;">
        <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>
    <!--fin segunda fila de academicos -->
  </div>
    </div>
    <div class="col-4 fondo "></div>
  </div>
{% endblock %}