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
    color: red;
    background-color: transparent;
    border-radius: 0.25rem;
    text-decoration: none;
}

.links a:hover {
    border-bottom: 1px solid black;
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
  margin-bottom: 10px;
  background-color: transparent;
  border:none;
  border-bottom: 2px solid red;
 font-size: 13px;
  cursor: pointer;
}

.container2 {
  max-width: 800px;
  margin: 0 auto;
}

.menu-list2 {
  padding: 40px 0;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.menu-list2 h2 {
  font-size: 36px;
  font-weight: 700;
  text-align: center;
  margin-bottom: 20px;
}

.menu-list2 ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-wrap: wrap;
}

.menu-list2 li {
  width: calc(33.33% - 20px);
  margin: 10px;
}

.menu-list2 a {
  text-decoration: none;
}

.menu-card2 {
  padding: 10px;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 200px;
  max-width: auto;
  width: 100%;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.menu-image2 {
  max-width: 100%;
  height: 200px;
  border-radius: 10px;
  margin-bottom: 10px;
}

.menu-info2 {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  color: black;
}

.menu-name2 {
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 10px;
}

.menu-description2 {
  font-size: 14px;
  margin-bottom: 10px;
}



    

    </style>
    
    <div class="container2">
  <div class="menu-list2">
    <h2>{{ $store->name }} Menus</h2>
    @if (count($menus) > 0)
      <ul>
        @foreach ($menus as $menu)
          <li>
            <a href="{{ route('stores.menu', ['storeId' => $store->id, 'menuId' => $menu->id]) }}">
              <div class="menu-card2">
                <img src="{{ $menu->image }}" alt="{{ $menu->name }}" class="menu-image2">
                <div class="menu-info2">
                  <h3 class="menu-name2">{{ $menu->name }}</h3>
                </div>
              </div>
            </a>
          </li>
        @endforeach
      </ul>
    @else
      <p>No menus found for this store.</p>
    @endif
  </div>
</div>
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
        <!--testimonials-box-container------>
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

    <div class="container links">
        <a href="{{ Route('reviews',['id'=>$store->id])}}">Add Review</a>
    </div>
 </div>
@endsection
