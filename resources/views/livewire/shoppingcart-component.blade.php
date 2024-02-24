<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @forelse ($cartItems as $cartItem)
                    <tr>
                        <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> {{ $cartItem->name }}</td>
                        <td class="align-middle">${{ number_format($cartItem->price) }}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" wire:click="decreaseQty({{ $cartItem->id }})">
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary text-center" min="1" value="{{ $cartItem->quantity }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus" wire:click="increaseQty({{ $cartItem->id }})">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">${{ number_format($cartItem->price*$cartItem->quantity) }}</td>
                        <td class="align-middle"><button class="btn btn-sm btn-primary" wire:click="deleteItem({{ $cartItem->id }})"><i class="fa fa-times"></i></button></td>
                    </tr>   
                    @empty
                       <tr>
                        <td colspan="5" class="text-center my-2">Your cart is empty <a href="{{ route('products.index') }}">Shop</a></td>
                    </tr> 
                    @endforelse
                    
                   
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">${{ number_format($total) }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$0.00</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">${{ number_format($total) }}</h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3" {{ $cartItems->count() == 0 ? 'disabled' : '' }}>Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
