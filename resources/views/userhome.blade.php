@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/storeslist.css') }}">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
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
      <h2>Cuisines</h2>
      <div class="food-container container">
      @foreach($cuisines as $index => $cuisine)
    @if($index < 3)
        <div class="food-type {{ $cuisine->slug }}">
            <div class="img-container">
                <img src="{{$cuisine->image}}" alt="{{ $cuisine->name }}" />
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
    
    <section id="food">

<h2>Our Stores</h2>
<div id="app" class="container2">

  @foreach ($stores as $index => $store)
  @if($index < 4)
  <a href="{{ route('stores.show_menu', $store->id) }}">           
  <card data-image="{{ $store->image }}">
      <h1 slot="header">{{ $store->name }}</h1>
      <p slot="content">{{ $store->description }}</p>
    </card>
</a>
@else
        @break
    @endif
  @endforeach
</div>
<div style="display:flex; align-items:center; justify-content:center; padding-top:20px">
      <a href="{{route('stores.index')}}" class="btn btn-primary" target="_blank">view more</a>
      </div>
  </section>

  <section id="food-menu">
  <h2 class="food-menu-heading">Featured Delights</h2>
  <div style="display:flex; align-items:center; justify-content:center; padding-top:20px">
      <a href="{{route('stores.showProducts')}}" class="btn btn-primary" target="_blank">view all</a>
      </div>
  <div class="food-menu-container container">
    @foreach ($items as $item)
    
    <div class="food-menu-item">
      <div class="food-img">
        <img src="{{ $item->image }}" alt="{{ $item->name }}" />
      </div>
      <div class="food-description">
        <h2 class="food-titile">{{ $item->name }}</h2>
        <p>
        {{ Str::limit($item->description, 100) }}
        </p>
        <p class="food-price">Price: $ {{ $item->price }}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>

    <section id="testimonials">
      <h2 class="testimonial-title">What Our Customers Say</h2>
      <div class="testimonial-container container">
      @foreach($reviews as $index => $review)
  @if($index < 3)
    <div class="testimonial-box">
      <div class="customer-detail">
        <div class="customer-photo">
          <img src="{{$review->user->image}}" alt="" />
          <p class="customer-name">{{$review->user->name}}</p>
        </div>
      </div>
      <div class="star-rating">
        @php
        $rating = $review->rating;
        @endphp

        @for($i = 1; $i <= 5; $i++)
            @if($i <= $rating)
                <span class="fa fa-star checked"></span>
            @else
                <span class="fa fa-star"></span>
            @endif
        @endfor
    </div>
    <p class="testimonial-text">
  {{ Str::limit($review->description, 100) }}
</p>


    </div>
  @else
    @break
  @endif
@endforeach


      </div>
    </section>
    <section id="contact">
      <div class="contact-container container">
        <div class="contact-img">
          <img src="https://i.postimg.cc/1XvYM67V/restraunt2.jpg" alt="" />
        </div>

        <div class="form-container">
          <h2>Join Us</h2>
          <p style="padding-top:5px">Are you a cook, resturant, or store? Join our YallaBites family now!</p>
          <a href="#" class="btn btn-primary">Become a Store</a>
           <br><br><br>
          <h2>Contact Us</h2>
          <input type="text" placeholder="Your Name" />
          <input type="email" placeholder="E-Mail" />
          <textarea
            cols="30"
            rows="1"
            placeholder="Type Your Message"
          ></textarea>
          <br>
          <a href="#" class="btn btn-primary">Submit</a>
        </div>
      </div>
    </section>
    <footer id="footer">
      <h2>YallaBites &copy; all rights reserved</h2>
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
<script src="{{ asset('js/storeslist.js') }}"></script>

@endsection