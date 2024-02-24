<div class="owl-carousel related-carousel">

    @foreach($otherProducts as $otherProduct)
    <div class="card product-item border-0">
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="{{ asset('storage/photos/product_photos_thumb/' . $otherProduct->photo) }}" alt="{{ $otherProduct->product }}">
        </div>
        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3">{{ $otherProduct->product }}</h6>
            <div class="d-flex justify-content-center">
                <h6>${{ number_format($otherProduct->price) }}</h6><h6 class="text-muted ml-2"><del>${{ number_format($otherProduct->price) }}</del></h6>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="/product/{{ $product->id }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
        </div>
    </div>
    @endforeach
    
</div>