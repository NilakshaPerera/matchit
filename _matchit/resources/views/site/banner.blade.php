<div class="row">

  <div id="carouselExampleIndicators" class="carousel slide home-carousal" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ url('/assets_app/images/home-banner1.jpg') }}" alt="First slide">
          <div class="centered text-center darken-background">
              <h1>Find what you love doing the most</h1>
              <p>Our service let you meet people who are just like you. Our platform gives you the ability to get in touch with them</p>
              <a class="btn btn-success" href="{{ route('about') }}">Read About Us</a>
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ url('/assets_app/images/home-banner2.jpg') }}" alt="Second slide">
          <div class="centered text-center darken-background">
              <h1>Join us so we can help you find your type of people</h1>
              <p>Out platform makes it easy to find interesting people you'd like. Just register with us and complete your profile. Then leave the rest to us :)</p>
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="{{ url('/assets_app/images/home-banner3.jpg') }}" alt="Third slide">
          <div class="centered text-center darken-background">
              <h1>How can you meet new people ?</h1>
              <p>We throw events based on your interests and we let you meet others who are just like you.</p>
              @guest
                <a class="btn btn-success" href="{{ route('register') }}">Register Now</a>
              @endguest
          </div>
        </div>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

</div>