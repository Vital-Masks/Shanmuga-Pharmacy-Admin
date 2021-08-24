@extends('shared.layout')
@section('content')

<div class="col-lg-6 mx-auto p-t-20 p-b-40">

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>Whoops!</strong> There were some problems with your input.<br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <strong>Add Product</strong>
        </div>
        <form method="POST" action="{{ $action }}" name="product-create" id="product-create" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-body card-block">
                <!-- @method('PUT') -->

                @if($product->id)
                @method('PUT')
                @else
                @method('POST')
                @endif

                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Product Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" placeholder="" value="{{ $product->name ?? old('name') }}" class="form-control">
                        <small class="form-text text-muted hide">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Brand</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option value="">Please select</option>
                            <option value="1" {{ $product->brand_id == 1 ? "selected" : (old('brand_id') == 1 ? "selected" : "") }}>Medicine 1</option>
                            <option value="2" {{ $product->brand_id == 2 ? "selected" : (old('brand_id') == 2 ? "selected" : "") }}>Option #2</option>
                            <option value="3" {{ $product->brand_id == 3 ? "selected" : (old('brand_id') == 3 ? "selected" : "") }}>Option #3</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Net Weight/Dosage</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="weight" name="weight" placeholder="" value="{{ $product->weight ?? old('weight')  }}" class="form-control">
                        <small class="form-text text-muted hide">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="price" name="price" placeholder="" value="{{ $product->price ?? old('price') }}" class="form-control">
                        <small class="form-text text-muted hide">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Discount</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="discount" name="discount" placeholder="" value="{{ $product->discount ?? old('discount') }}" class="form-control">
                        <small class="form-text text-muted hide">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Category</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Please select</option>
                            <option value="1">Cat 1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control">
                        {{ $product->description ?? old('description') }}
                        </textarea>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-multiple-input" class=" form-control-label">Upload</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="image_url" name="image_url[]" multiple="true" class="form-control-file">
                    </div>
                    <div style="display: flex;">
                        @if(count($images) > 1)
                        @foreach($images as $img)
                        <img style="width: 100px; height: 100px; object-fit: cover; margin-right: 5px" src="{{ asset($img->image_url) }}" alt="" class="img-fluid">
                        @endforeach
                        @endif
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </form>

    </div>

</div>
@endsection