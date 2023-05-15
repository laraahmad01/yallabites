@extends('layouts.app')
@section('content')
<h2>Add Item to Cart</h2>
<p>Adding this item will discard your current cart. Do you want to proceed?</p>
<button onclick="confirmAddToCart()">Yes</button>
<button onclick="cancelAddToCart()">No</button>

<script>
    function confirmAddToCart() {
        // Perform an AJAX request to the server to add the item and delete the old cart
        // You can use libraries like Axios or jQuery.ajax for the AJAX request
        axios.post('/add-to-cart', {
            confirm: true
        })
        .then(function (response) {
            // Handle the response if needed
            console.log(response);
        })
        .catch(function (error) {
            // Handle any errors that occur during the request
            console.error(error);
        });
    }

    function cancelAddToCart() {
        // Perform an AJAX request to the server to cancel adding the item and keep the old cart
        axios.post('/add-to-cart', {
            confirm: false
        })
        .then(function (response) {
            // Handle the response if needed
            console.log(response);
        })
        .catch(function (error) {
            // Handle any errors that occur during the request
            console.error(error);
        });
    }
</script>

@endsection