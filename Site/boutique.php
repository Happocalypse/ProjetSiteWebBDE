<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/boutique.css">
    <title>Boutique</title>
    <?php include 'script/scriptBootStrapHead.php' ?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <h1>Boutique</h1>
    <section>
        <article>
            <div id="shopCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#shopCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#shopCarousel" data-slide-to="1"></li>
                    <li data-target="#shopCarousel" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="images/slide1.jpg" alt="First slide">
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Light mask</h3>
                            <p>First text</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/slide2.jpg" alt="Second slide">
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Strong mask</h3>
                            <p>Secondary text</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/slide3.jpg" alt="Third slide">
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Slight mask</h3>
                            <p>Third text</p>
                        </div>
                    </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#shopCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
                <a class="carousel-control-next" href="#shopCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
                <!--/.Controls-->
            </div>
        </article>
    </section>

    <section id="flex_card">

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="images/pull.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Pull sexy</h5>
                <p class="card-text">Description</p>
                <button type="button" class="btn float-right btn-outline-primary" id="button_">Ajouter au panier</button>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="images/pull.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Pull sexy</h5>
                <p class="card-text">Description</p>
                <button type="button" class="btn float-right btn-outline-primary" id="button_">Ajouter au panier</button>
            </div>
        </div>

    </section>


    <?php include 'script/scriptBootStrapBody.php' ?>
</body>

</html>
