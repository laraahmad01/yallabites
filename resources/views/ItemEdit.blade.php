@extends('ViewStoreItems')
<div class="content-wrapper">
    <div class="row">
      
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Item</h4>
            
            <div class="table-responsive">
              <form action="{{ route('itemedit/'.$item->id) }}" method="GET" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" value="{{$item->name}}" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" value="{{$item->price}}" name="price" id="price" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="calories">Calories:</label>
                    <input type="number" value="{{$item->calories}}" name="calories" id="calories" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description"  id="description" class="form-control" rows="4" required>{{$item->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">{{$item->category}}"</option>
                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file"value="{{$item->image}}" name="image" id="image" class="form-control-file" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
            </div>
          </div>
        </div>