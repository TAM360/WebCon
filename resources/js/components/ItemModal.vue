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
                                </div>
                            </article>
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
                            <div class="rating-wrap">
                            </div> <!-- rating-wrap.// -->
                            <hr>
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
