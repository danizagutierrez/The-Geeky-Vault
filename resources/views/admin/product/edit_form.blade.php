@section('edit_form')
<div class="card mb-4">
  <div class="card-header">
    Edit Products
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif
    <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="product_name" value="{{ $viewData['product']->getName() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
        <div>
          <div class="mb-3 row">
            <label class="col-lg-1 col-md-6 col-sm-8 col-form-label">Rating:</label>
            <div class="col-lg-1 col-md-2 col-sm-8">
              <select name="rating" class="form-select">
                <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5</option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-1 col-md-6 col-sm-8 col-form-label">Quantity in Stock:</label>
              <div class="col-lg-1 col-md-6 col-sm-8">
                <input name="qty_instock" value="{{ $viewData['product']->getQtyInstock()  }}" type="number" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input class="form-control" type="file" name="image">
            </div>
          </div>
        </div>
        <div class="col">
          &nbsp;
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="product_description"
          rows="3">{{ $viewData['product']->getDescription() }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
      <a href="{{ route('admin.product.index') }}" class="btn btn-danger text-white">Cancel</a>
    </form>
  </div>
</div>
@endsection