<br> <br>
<section id="product" class="our-approach-area-three pb-70">
    <div class="container">
        <div class="section-title">
            <span>Our Products</span>
            <h2>We Offer a Wide Range of Products</h2>
        </div>

        <div class="row">
            @foreach ($product as $p)
            <div class="col-sm-3">
                <div class="single-approach-box overly-one">
                    <div class="overly-two">
                        <div class="icon">
                            <img src="{{url('uploads/products/' . $p->image)}}" alt="Image">
                        </div>
                        <h3>{{$p->product_name}}</h3>
                        <h2 style="color: red">{{$p->price}}$</h2>
                        <p style="color: rgb(3, 112, 36)">Offer {{$p->offer}}%</p>
                        <p style="color: black">{{$p->desc}}</p>
                        <a href="{{ route('add.to.cart',$p->id) }}" class="btn btn-primary">Add To Cart</a>
                        <a href="{{route('payment', $p->id )}}" class=" rounded  btn btn-primary">Buy Now</a>

                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>
