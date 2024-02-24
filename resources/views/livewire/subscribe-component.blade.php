<div class="container-fluid bg-secondary my-5">
    <div class="row justify-content-md-center py-5 px-xl-5">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center mb-2 pb-2">
                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                <p>Subscribe to stay in the loop with the latest trends, receive expert tips, and enjoy exclusive access to our curated collections.</p>
                @if(Session::has('subscribeSuccess'))
                <div class="alert alert-success alert-sm">{{ Session::get('subscribeSuccess') }}</div>
                @elseif(Session::has('subscribeFail'))
                <div class="alert alert-danger alert-sm">{{ Session::get('subscribeFail') }}</div>
                @endif
            </div>
            <form wire:click.prevent="subscribe">
                <div class="input-group">
                    <input type="text" wire:model="email" class="form-control border-white p-4" placeholder="Enter your email">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary px-4">Subscribe <div wire:loading wire:loading.target="subscribe">...</div></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>