<div class="item-wrap wow fadeInUp">
    <div class="item-img">
        <a class="home_product_img" href="#" title="{{$product->name}}">
        <img width="300" height="300" src="{{$product->image_url}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" sizes="(max-width: 300px) 100vw, 300px" /> 
        </a>
    </div>
    <div class="product-info-wrap no-rating">
        <div class="rating-price clearfix">
            <a class="product-name" href="#" title="KeyZone Building Tool">
                <h5>{{ $product->name }}</h5>
            </a>
            <span class="price"><ins>
                <span class="woocommerce-Price-amount amount">
                <span class="woocommerce-Price-currencySymbol">PKR</span> {{$product->price}} </span>
            </ins></span>
            
        </div>
        @if (Auth::user()->category == "company")
            <div class="add-to-cart-shop">
                <a rel="nofollow" href="#" data-toggle="modal" data-target="#exampleModal{{$product->id}}"  class="button product_type_simple add_to_cart_button ajax_add_to_cart">Update Product</a> 
                <a rel="nofollow" href="{{url('/products/destroy', $product->id) }}" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Remove From Catalog</a> 
            </div>
           
        @else
            <div class="add-to-cart-shop">
                <a rel="nofollow" href="#"  class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a> 
            </div>
        @endif
       
    </div>
</div>

{{-- update product modal --}}

<div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/products/update/')}}/{{$product->id}}" method="post">
                @csrf
                <div class="modal-body">
                    <div id="div_id_username" class="form-group required">
                        <label for="id_username" class="control-label col-md-4 requiredField"> Name </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="id_username" 
                             name="name" placeholder="Product Name" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div id="div_id_email" class="form-group required">
                        <label for="id_email" class="control-label col-md-4 requiredField"> Descripion </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md form-control-lg  form-control" id="id_email" 
                            name="description" placeholder="Product Description" style="margin-bottom: 10px" type="text" />
                        </div>     
                    </div>
                    <div id="div_id_username hidden" class="form-group required">
                        <label for="id_username" class="control-label col-md-4 requiredField"> Category </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="id_username" 
                            name="category" value="{{$product->category}}" placeholder="{{$product->category}}" 
                            style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required">
                        <label for="id_username" class="control-label col-md-4 requiredField"> Price </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="id_username" 
                             name="price" placeholder="Product Price" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                        
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>