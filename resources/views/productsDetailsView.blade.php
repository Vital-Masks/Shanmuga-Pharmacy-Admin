@extends('shared.layout')
@section('content')

<section class="product-detail p-t-20 p-b-40">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-solid">
                    <div class="card-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @forelse($product->productImages as $key=>$image)
                                <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                    <img src="{{asset($image->image_url)}}" alt="{{$product->name}}">
                                </div>
                                @empty
                                <div class="carousel-item active">
                                    <img src="{{asset('/img/no-image.png')}}" alt="{{$product->name}}">
                                </div>
                                @endforelse
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>{{ $product->name }}</h3>
                <p class="mt-4">{{ $product->description }}</p>
                <div>
                    <p>
                        Price: $ {{ $product->price }}
                    </p>
                    <p>
                        Weight: {{ $product->weight }}
                    </p>
                    <p>
                        Brand: {{ $product->brand_id}}
                    </p>
                    <p>
                        Category: {{ $product->category_id }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection