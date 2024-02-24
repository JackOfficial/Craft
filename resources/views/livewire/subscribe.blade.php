<div class="col-md-4 mb-5">
    <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
    <form wire:submit.prevent="subscribe">
        <div class="form-group">
            <input wire:model="name" type="text" class="form-control border-0 py-4 @error('name') is-invalid @enderror" placeholder="Your Name" required="required" />
            @error('name') 
           <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>
        <div class="form-group">
            <input type="email" wire:model="email" class="form-control border-0 py-4 @error('email') is-invalid @enderror" placeholder="Your Email"
                required="required" />
                @error('email') 
                <div class="text-danger">{{ $message }}</div> 
                 @enderror
        </div>
        <div>
            <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now <div wire:loading wire:target="subscribe" class="spinner-border spinner-border-sm" role="status"></button>
        @if (Session::has('subscribedSuccess'))
            <div class="text-success">{{ Session::get('subscribedSuccess') }}</div>
        @endif
        @if (Session::has('subscribedFail'))
        <div class="text-success">{{ Session::get('subscribedFail') }}</div>
        @endif
        </div>
    </form>
</div>