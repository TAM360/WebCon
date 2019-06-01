<template>
    <div>
        <a href="#" class="btn btn-secondary" data-toggle="modal" :data-target="'#' + this.id"> Details  </a>
        
        <div :id="this.id" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align:left">Item Details</h4>
            </div>
            <div class="modal-body">
                
                <div class="card">
                    <div class="row no-gutters">
                        <aside class="col-sm-5 border-right">
                            <article class="gallery-wrap"> 
                                <div class="img-big-wrap">
                                <div> <a :href="this.image_url" data-fancybox=""><img :src="this.image_url"></a></div>
                                </div> <!-- slider-product.// -->
                                <!-- <div class="img-small-wrap">
                                    <div class="item-gallery"> <img src="images/items/1.jpg"></div>
                                    <div class="item-gallery"> <img src="images/items/2.jpg"></div>
                                    <div class="item-gallery"> <img src="images/items/3.jpg"></div>
                                    <div class="item-gallery"> <img src="images/items/4.jpg"></div>
                                </div> slider-nav.// -->
                            </article> <!-- gallery-wrap .end// -->
                        </aside>
                        <aside class="col-sm-7">
                            <article class="p-5">
                                <h3 class="title mb-3">{{ this.name }}</h3>

                            <div class="mb-3"> 
                                <var class="price h3 text-warning"> 
                                    <span class="currency">PKR </span>
                                    <span class="num">{{ this.price }}</span>
                                </var> 
                                
                            </div> <!-- price-detail-wrap .// -->
                            <dl>
                            <dt>Description</dt>
                                <dd><p>{{ this.description }}</p></dd>
                            </dl>
                            <!-- <dl class="row">
                            <dt class="col-sm-3">Model#</dt>
                            <dd class="col-sm-9">12345611</dd>

                            <dt class="col-sm-3">Color</dt>
                            <dd class="col-sm-9">Black and white </dd>

                            <dt class="col-sm-3">Delivery</dt>
                            <dd class="col-sm-9">Russia, USA, and Europe </dd>
                            </dl> -->
                            <div class="rating-wrap">

                                <!-- <ul class="rating-stars">
                                    <li style="width:80%" class="stars-active"> 
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                    </li>
                                </ul> -->
                                <!-- <div class="label-rating">132 reviews</div>
                                <div class="label-rating">154 orders </div> -->
                            </div> <!-- rating-wrap.// -->
                            <hr>
                                <div class="row">
                                    <!-- <div class="col-sm-5">
                                        <dl class="dlist-inline">
                                        <dt>Quantity: </dt>
                                        <dd> 
                                            <select class="form-control form-control-sm" style="width:70px;">
                                                <option> 1 </option>
                                                <option> 2 </option>
                                                <option> 3 </option>
                                            </select>
                                        </dd>
                                        </dl>  
                                    </div>  -->
                                    <!-- <div class="col-sm-7">
                                        <dl class="dlist-inline">
                                            <dt>Size: </dt>
                                            <dd>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <span class="form-check-label">SM</span>
                                                </label>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <span class="form-check-label">MD</span>
                                                </label>
                                                <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <span class="form-check-label">XXL</span>
                                                </label>
                                            </dd>
                                        </dl>  
                                    </div>  -->
                                </div> <!-- row.// -->
                                <hr>
                                <a href="#" class="btn  btn-primary"> Buy now </a>
                                <a href="#" class="btn  btn-outline-primary"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
                            </article> <!-- card-body.// -->
                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card.// -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
    </div>
    </div>
</template>


<script>
export default {
    props: [
        'image_url',
        'id',
        'name',
        'description',
        'price',
        'data-target'
    ]
}
</script>
