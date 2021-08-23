@extends('shared.layout')
@section('content')

<div class="col-lg-6 mx-auto p-t-20 p-b-40">
    <div class="card">
        <div class="card-header">
            <strong>Add Product</strong>
        </div>
        <form method="post" action="{{ route('product-create') }}" name="product-create" id="product-create" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-body card-block">

                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Product Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" placeholder="" class="form-control">
                        <small class="form-text text-muted hide">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Brand</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="brand" id="brand" class="form-control">
                            <option value="0">Please select</option>
                            <option value="1">Medicine 1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Net Weight/Dosage</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="weight" name="weight" placeholder="" class="form-control">
                        <small class="form-text text-muted hide">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="price" name="price" placeholder="" class="form-control">
                        <small class="form-text text-muted hide">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Discount</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="discount" name="discount" placeholder="" class="form-control">
                        <small class="form-text text-muted hide">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Category</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="category" id="category" class="form-control">
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
                        <textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control"></textarea>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-multiple-input" class=" form-control-label">Upload</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="product_images" name="product_images[]" multiple="true" class="form-control-file">
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