<form action="{{ route('store.orders.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="address">Delivery Address:</label>
        <input type="text" name="address" id="address" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="payment_option">Payment Option:</label>
        <select name="payment_option" id="payment_option" class="form-control" required>
            <option value="online">Pay Online</option>
            <option value="on_delivery">Pay on Delivery</option>
        </select>
    </div>
  
    </div>
    <button type="submit" class="btn btn-primary">Submit Order</button>
</form>
