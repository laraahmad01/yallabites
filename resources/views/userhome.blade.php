@extends('layouts.app')

@section('content')

 
<link rel="stylesheet" href="{{ asset('css/userhome.css') }}">

    <section class="showcase-area" id="showcase">
      <div class="showcase-container">
        <h1 class="main-title" id="home">Treat Your Tastebuds</h1>
        <p>Dive into a Gastronomic Wonderland, Where Every Bite is Pure Bliss!</p>
        <a href="{{route('stores.index')}}" class="btn btn-primary">Our Stores</a>
      </div>
    </section>
    <form action="{{ route('search.items') }}" method="GET">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="query" class="form-control" placeholder="Search...">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
</form>


    <section id="about">
      <div class="about-wrapper container">
        <div class="about-text">
          <p class="small">About Us</p>
          <h2>We've beem making healthy food last for 10 years</h2>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ab
            eos omnis, nobis dignissimos perferendis et officia architecto,
            fugiat possimus eaque qui ullam excepturi suscipit aliquid optio,
            maiores praesentium soluta alias asperiores saepe commodi
            consequatur? Perferendis est placeat facere aspernatur!
          </p>
        </div>
        <div class="about-img">
          <img src="https://i.postimg.cc/mgpwzmx9/about-photo.jpg" alt="food" />
        </div>
      </div>
    </section>
    <section id="food">
      <h2>Types of food</h2>
      <div class="food-container container">
      @foreach($cuisines as $index => $cuisine)
    @if($index < 3)
        <div class="food-type {{ $cuisine->slug }}">
            <div class="img-container">
                <img src="https://i.postimg.cc/Nffm6Rkk/food2.jpg" alt="{{ $cuisine->name }}" />
                <div class="img-content">
                    <h3>{{ $cuisine->name }}</h3>
                    <a href="{{ $cuisine->learn_more_link }}" class="btn btn-primary" target="_blank">Learn More</a>
                </div>
            </div>
        </div>
    @else
        @break
    @endif
@endforeach


      </div>
      <div style="display:flex; align-items:center; justify-content:center; padding-top:20px">
      <a href="" class="btn btn-primary" target="_blank">view more</a>
      </div>
    </section>
    
    <section id="food-menu">
      <h2 class="food-menu-heading">Food Menu</h2>
      <div class="food-menu-container container">
        <div class="food-menu-item">
          <div class="food-img">
            <img src="https://i.postimg.cc/wTLMsvSQ/food-menu1.jpg" alt="" />
          </div>
          <div class="food-description">
            <h2 class="food-titile">Food Menu Item 1</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
              quae.
            </p>
            <p class="food-price">Price: &#8377; 250</p>


          </div>
        </div>

        <div class="food-menu-item">
          <div class="food-img">
            <img
              src="https://i.postimg.cc/sgzXPzzd/food-menu2.jpg"
              alt="error"
            />
          </div>
          <div class="food-description">
            <h2 class="food-titile">Food Menu Item 2</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
              quae.
            </p>
            <p class="food-price">Price: &#8377; 250</p>
          </div>
        </div>
        <div class="food-menu-item">
          <div class="food-img">
            <img src="https://i.postimg.cc/8zbCtYkF/food-menu3.jpg" alt="" />
          </div>
          <div class="food-description">
            <h2 class="food-titile">Food Menu Item 3</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
              quae.
            </p>
            <p class="food-price">Price: &#8377; 250</p>
          </div>
        </div>
        <div class="food-menu-item">
          <div class="food-img">
            <img src="https://i.postimg.cc/Yq98p5Z7/food-menu4.jpg" alt="" />
          </div>
          <div class="food-description">
            <h2 class="food-titile">Food Menu Item 4</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
              quae.
            </p>
            <p class="food-price">Price: &#8377; 250</p>
          </div>
        </div>
        <div class="food-menu-item">
          <div class="food-img">
            <img src="https://i.postimg.cc/KYnDqxkP/food-menu5.jpg" alt="" />
          </div>
          <div class="food-description">
            <h2 class="food-titile">Food Menu Item 5</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
              quae.
            </p>
            <p class="food-price">Price: &#8377; 250</p>
          </div>
        </div>
        <div class="food-menu-item">
          <div class="food-img">
            <img src="https://i.postimg.cc/Jnxc8xQt/food-menu6.jpg" alt="" />
          </div>
          <div class="food-description">
            <h2 class="food-titile">Food Menu Item 6</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Non,
              quae.
            </p>
            <p class="food-price">Price: &#8377; 250</p>
          </div>
        </div>
      </div>
    </section>
    <section id="testimonials">
      <h2 class="testimonial-title">What Our Customers Say</h2>
      <div class="testimonial-container container">
        <div class="testimonial-box">
          <div class="customer-detail">
            <div class="customer-photo">
              <img src="https://i.postimg.cc/5Nrw360Y/male-photo1.jpg" alt="" />
              <p class="customer-name">Ross Lee</p>
            </div>
          </div>
          <div class="star-rating">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
          </div>
          <p class="testimonial-text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
            voluptas cupiditate aspernatur odit doloribus non.
          </p>
         
        </div>
        <div class="testimonial-box">
          <div class="customer-detail">
            <div class="customer-photo">
              <img
                src="https://i.postimg.cc/sxd2xCD2/female-photo1.jpg"
                alt=""
              />
              <p class="customer-name">Amelia Watson</p>
            </div>
          </div>
          <div class="star-rating">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
          </div>
          <p class="testimonial-text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
            voluptas cupiditate aspernatur odit doloribus non.
          </p>
         
        </div>
        <div class="testimonial-box">
          <div class="customer-detail">
            <div class="customer-photo">
              <img src="https://i.postimg.cc/fy90qvkV/male-photo3.jpg" alt="" />
              <p class="customer-name">Ben Roy</p>
            </div>
          </div>
          <div class="star-rating">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
          </div>
          <p class="testimonial-text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
            voluptas cupiditate aspernatur odit doloribus non.
          </p>
         
        </div>
      </div>
    </section>
    <section id="contact">
      <div class="contact-container container">
        <div class="contact-img">
          <img src="https://i.postimg.cc/1XvYM67V/restraunt2.jpg" alt="" />
        </div>

        <div class="form-container">
          <h2>Contact Us</h2>
          <input type="text" placeholder="Your Name" />
          <input type="email" placeholder="E-Mail" />
          <textarea
            cols="30"
            rows="6"
            placeholder="Type Your Message"
          ></textarea>
          <a href="#" class="btn btn-primary">Submit</a>
        </div>
      </div>
    </section>
    <footer id="footer">
      <h2>Restraunt &copy; all rights reserved</h2>
    </footer>
  
  <!-- 
    .................../ JS Code for smooth scrolling /...................... -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      // Add smooth scrolling to all links
      $("a").on("click", function (event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $("html, body").animate(
            {
              scrollTop: $(hash).offset().top,
            },
            800,
            function () {
              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            }
          );
        } // End if
      });
    });
  </script>


@endsection