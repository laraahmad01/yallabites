@extends('layouts.store')

@section('title', 'Create Your Store')

@section('content')
    <h1 style="color: #62a983;">Create Your Store Here:</h1>
   <body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data" class="form-detail"  id="myform">
				@csrf

				<!-- name -->
				<div class="form-left">
					<h2>General Infomation</h2>
					<div class="form-row">
						<label for="name">Name of the restaurant:</label>
                        <input type="text" id="name" name="name" required>
					</div>

				<!-- image -->
					<div class="form-group">
						<div class="form-row form-row-1">
                            <label  id="first_name" class="input-text" for="image">Image for the restaurant logo:</label>
                            <input  type="file" id="image" name="image" accept="image/*" required>
						</div>
				<!-- description -->
					</div>
					<div class="form-row">
                        <label for="description">Description of the restaurant:</label>
                        <textarea id="description" name="description" rows="5" ></textarea>
					</div>

				<!-- cuisine -->
					<div class="form-row">
						<label for="cuisine">Type of cuisine:</label>
        <input type="text" id="cuisine" name="cuisine" >
					</div>
					<div class="form-group">
						
						
					</div>
				</div>

				<!-- street -->
				<div class="form-right">
					<h2>Location</h2>
					<div class="form-row">
						<input type="text" name="street" class="street" id="street" placeholder="Street + Nr" >
					</div>

				<!-- city -->
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="city" class="zip" id="zip" placeholder="City" >
						</div>

				<!-- state -->
						<div class="form-row form-row-1">
							<input type="text" name="state" class="zip" id="zip" placeholder="State" >
						</div>
					</div>
				
				<!-- country -->
					<div class="form-row">
						<select name="country" id="country">
						    <option value="country">Select A Country</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>

				<!-- code -->
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="code" class="code" id="code" placeholder="Code +" required>
						</div>

				<!-- phone -->
						<div class="form-row form-row-2">
							<input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number" required>
						</div>
					</div>

				<!-- your_email -->
					<div class="form-row">
						<input type="text" name="your_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
					</div>

				<!-- postal_code -->
                    <div class="form-row">
						<input type="text" name="postal_code" id="your_email" class="input-text" placeholder="postal code">
					</div>
					<div class="form-checkbox">
						<label class="container"><p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
						  	<input type="checkbox" name="checkbox">
						  	<span class="checkmark"></span>
						</label>
					</div>

					<!-- submit -->
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Register Store">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<script>
    fetch('https://secure.geonames.org/countryInfoJSON?formatted=true&lang=en')
      .then(response => response.json())
      .then(data => {
        const countries = data.geonames;
        const select = document.getElementById('country');
        countries.forEach(country => {
          const option = document.createElement('option');
          option.value = country.countryCode;
          option.textContent = country.countryName;
          select.appendChild(option);
        });
      });
    </script>
@endsection