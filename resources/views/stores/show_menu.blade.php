@extends('layouts.app')
@section('content')
<style>
/* Layout */
.container2 {
    display: flex;
    flex-wrap: wrap;
}

/* Menus */
.menu-list {
    flex: 1;
    margin-right: 2rem;
}

.menu-list h2 {
    margin-bottom: 1rem;
}

.menu-list ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu-list li {
    margin-bottom: 0.5rem;
}

.menu-list li a {
    color: #333;
    text-decoration: none;
}


.links {
    margin-top: 1rem;
}

.links a {
    display: inline-block;
    margin-right: 1rem;
    padding: 0.5rem 1rem;
    color: #fff;
    background-color: #007bff;
    border-radius: 0.25rem;
    text-decoration: none;
}

.links a:hover {
    background-color: #0069d9;
}

*{
    margin: 0px;
    padding: 0px;
    font-family: poppins;
    box-sizing: border-box;
}
a{
    text-decoration: none;
}
#testimonials{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width:100%;
}
.testimonial-heading{
    letter-spacing: 1px;
    margin: 30px 0px;
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
 
.testimonial-heading span{
    font-size: 1.3rem;
    color: #252525;
    margin-bottom: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.testimonial-box-container2{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;

    width:100%;
}
.testimonial-box{
    width:500px;
    box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
    background-color: #ffffff;
    padding: 20px;
    margin: 15px;
    cursor: pointer;
}
.profile-img{
    width:50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}
.profile-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.profile{
    display: flex;
    align-items: center;
}
.name-user{
    display: flex;
    flex-direction: column;
}
.name-user strong{
    color: #3d3d3d;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}
.name-user span{
    color: #979797;
    font-size: 0.8rem;
}
.reviews{
    color: #f9d71c;
}
.box-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.client-comment p{
    font-size: 0.9rem;
    color: #4b4b4b;
}
.testimonial-box:hover{
    transform: translateY(-10px);
    transition: all ease 0.3s;
}
 

::selection{
    color: #ffffff;
    background-color: #252525;
}

.deletebutton{
    
  display: inline-block;
  margin-top: 3px;
  background-color: transparent;
  border:none;
  border-bottom: 2px solid red;
 font-size: 13px;
  cursor: pointer;
}


    

    </style>
    
    <div class="container2">
        <div class="menu-list">
            <h2>{{ $store->name }} Menus</h2>
            @if (count($menus) > 0)
                <ul>
                    @foreach ($menus as $menu)
                        <li><a href="{{ route('stores.menu', ['storeId' => $store->id, 'menuId' => $menu->id]) }}">{{ $menu->name }}</a></li>
                    @endforeach
                </ul>
            @else
                <p>No menus found for this store.</p>
            @endif
        </div>
    
    <div class="container2 links">
        <a href="{{ Route('reviews',['id'=>$store->id])}}">Add Review</a>
        <a href="{{ Route('store.orders.create',['id'=>$store->id])}}">Order</a>
    </div>



        <section id="testimonials">
        <!--heading--->
        <div class="testimonial-heading">
            <span>Comments</span>
            <h4>Clients Says</h4>
        </div>
        <!--testimonials-box-container2------>
        @foreach ($rev as $review)
            
        <div class="testimonial-box-container2">
            <div class="testimonial-box">
                <div class="box-top">
                    <div class="profile">
                     
                        <div class="profile-img">
                            <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png" />
                        </div>
                        
                        <div class="name-user">
                            <strong>{{ $review->user->name }}</strong>
                           
                        </div>
                    </div>

                    <div class="reviews">
                   <p> Rating: {{ $review->rating }}</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    @if (auth()->check() && $review->user_id == auth()->user()->id)
                        <form action="{{ route('reviews.destroy', ['id' => $review->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deletebutton">Remove Review</button>
                            
                        </form>
                    @endif
                </div>
                <div class="client-comment">
                    <p>{{ $review->description }}</p>
                </div>
             
                    <hr>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container2 links">
        <a href="{{ Route('reviews',['id'=>$store->id])}}">Add Review</a>
        <a href="{{ Route('store.orders.create',['id'=>$store->id])}}">Order</a>
    </div>

@endsection
