

<!DOCTYPE html>
<html>
  <head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <title>My Review Form</title>
    <style>
      /* Modern CSS styles for the form */
      body {
        background-color: #f1f1f1;
        font-family: Arial, sans-serif;
      }
      form {
        max-width: 100%;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        padding: 20px;
      }
      h1 {
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
      }
      label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
      }
      input[type="text"],
      select,
      textarea {
        width: 98%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 20px;
      }
      select {
        height: 40px;
      }
      textarea {
        height: 150px;
      }
      button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      button:hover {
        background-color: #3e8e41;
      }
    </style>
  </head>
  <body>
  
  <form method="post" action="{{ route('review', ['store_id' => $store_id]) }}">
        @csrf
      <h1>Review for </h1>
      <label for="description">description</label>
      <input type="description" id="description" name="description" required>

      <label for="rating">Rating</label>
      <select id="rating" name="rating">
        <option value="1">Rating</option>
        <option value="1">1 star</option>
        <option value="2">2 stars</option>
        <option value="3">3 stars</option>
        <option value="4">4 stars</option>
        <option value="5">5 stars</option>
      </select>

    
      <button type="submit">Save</button>
    </form>
  </body>
</html>
