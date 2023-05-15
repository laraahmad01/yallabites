@extends('layouts.store')


@section('content')
<h1 style="color: #62a983;"> Welcome! Create Your Menu Here:</h1>
   <body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="form-detail"  id="myform">
				@csrf

				<!-- name -->
				<div class="form-left">
					<h2>To Create Your Menu, Give It A Name and An Image</h2>
					<div class="form-row">
						<label for="name">Name of the menu:</label>
                        <input type="text" id="name" name="name" >
					</div>
                    <br>
                    <br>
                   
				<!-- image -->
					<div class="form-group">
						<div class="form-row form-row-1">
                            <label  id="first_name" class="input-text" for="image">Image for the restaurant menu:</label>
                            <input  type="file" id="image" name="image" accept="image/*" >
						</div>
				
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    
<br>

					<!-- submit -->
					<div class="form-row-last">
						<input type="submit" style="    
                            background-color: #4CAF50; /* Green background */
                            color: white; /* White text */
                            padding: 12px 20px; /* Padding */
                            border: none; /* No border */
                            border-radius: 4px; /* Rounded corners */
                            cursor: pointer; /* Pointer cursor */
                          " name="register" class="register" value="Register Menu">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

@endsection