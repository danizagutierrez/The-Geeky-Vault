@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/'.$viewData['product']->getImage()) }}" 
        class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})
        </h5>
        <p class="card-text">Product Details: {{ $viewData["product"]->getDescription() }}</p>
        <p class="card-text">Quantity in Stock: {{ $viewData["product"]->getQtyInstock() }}</p>     
        <form action="{{ route('add-to-cart', $viewData['product']) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="addToCartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToCartModalLabel">Item Added to Cart</h5>
            </div>
            <div class="modal-body">
                Your item has been added to the cart.
            </div>
        </div>
    </div>
</div>


<script>
    // JavaScript to show modal when "Add to Cart" form is submitted
    $('form').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Show the modal
    $('#addToCartModal').modal('show');

    // Make an AJAX request to add the product to the cart
    $.ajax({
        url: '{{ route("add-to-cart", $viewData["product"]) }}',
        method: 'POST',
        dataType: 'json',
        data: $(this).serialize(), // Serialize form data
        success: function(response) {
            // Optionally handle the success response
        },
        error: function(xhr, status, error) {
            // Optionally handle the error response
        }
    });

    // Hide the modal after 2 seconds
    setTimeout(function() {
        $('#addToCartModal').modal('hide');
    }, 2000); 

    $('#addToCartModal').on('hidden.bs.modal', function() {
            window.location.href = '{{ route("product.index") }}';
        });
});
</script>


@endsection

