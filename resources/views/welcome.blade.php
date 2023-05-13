<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <link rel="stylesheet" href="{{ asset('css/storeslist.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    </head>
    <body class="antialiased">
    <h1 class="title">Feature Products Cards</h1>

<div id="app" class="container">
  <card data-image="https://images.pexels.com/photos/2529157/pexels-photo-2529157.jpeg?cs=srgb&dl=pexels-melvin-buezo-2529157.jpg&fm=jpg">
    <h1 slot="header">Men</h1>
    <p slot="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
  </card>  
  <card data-image="https://roadsterdiner.com/storage/2018/03/MIGHTY-CHICKEN.jpg">
    <h1 slot="header">Woman</h1>
    <p slot="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
  </card>

</div>
    </body>
        <script src="{{ asset('js/storeslist.js') }}"></script>
</html>
