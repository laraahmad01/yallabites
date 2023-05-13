<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <link rel="stylesheet" href="{{ asset('css/itemsdetails.css') }}">

    </head>
    <body >

    <main>
  <div class="container">

          <div class="product-image">
            <img class="active" src="https://source.unsplash.com/W1yjvf5idqA">
          </div>
        
      <div class="column-xs-12 column-md-5 class2">
        <h1>Bonsai</h1>
        <h2>$19.99</h2>
        <div class="description">
          <p>The purposes of bonsai are primarily contemplation for the viewer, and the pleasant exercise of effort and ingenuity for the grower.</p>
          <p>By contrast with other plant cultivation practices, bonsai is not intended for production of food or for medicine. Instead, bonsai practice focuses on long-term cultivation and shaping of one or more small trees growing in a container.</p>
        </div>
        <button class="add-to-cart">Add To Cart</button>
      </div>
    </div>

</main>


    </body>
        <script src="{{ asset('js/storeslist.js') }}"></script>
</html>
