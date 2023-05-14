<!DOCTYPE html>
<html>
<head>

    <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>




<div>
    <form method="POST" action="{{Route('addReview',['id'=>$store->id])}}">
        @csrf
        <label for="description">description</label>
        <input type="text"  id="description" name="description" placeholder="Review Description">

        <input type="text" id="rating" name="rating" placeholder="-select-" list="ratingR">
        <datalist id="ratingR">
            <option value="1">
            <option value="2">
            <option value="3">
            <option value="4">
            <option value="5">
        </datalist>

       

        <button type="submit">Submit Review</button>
    </form>
</div>

</body>
</html>
