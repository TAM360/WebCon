<template>
    <div class="row">
          
        <div id="products" class="col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <a class="btn btn-secondary" @click="search()" v-if="!loading">Search</a>
                    <a class="btn btn-secondary" disabled="disabled"  v-if="loading">Searching...</a>
                </div>
                <input type="text" @keyup.enter="search()"  placeholder="Paints, Cements, Tiles etc" class="form-control"  v-model="query">
                <div class="alert alert-danger" role="alert" v-if="error">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    @{{ error }}
                </div>
            </div>

            <div v-for="(product, key) in products" :key="key">
                
                <article class="card card-product input-group mb-3">
                    <div class="card-body">
                        <div class="row">
                            <aside class="col-sm-3">
                                <div class="img-wrap"><img :src="product.image_url" :alt="product.name"></div>
                            </aside> 
                            <article class="col-sm-6">
                                
                                <h4 class="title"> {{ product.name }} </h4>
                                <div class="rating-wrap">
                                    <ul class="rating-stars">
                                        <!-- <li style="width:80%" class="stars-active"> 
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> 
                                        </li> -->
                                    </ul>
                                    <div class="label-rating">132 reviews</div>
                                    <div class="label-rating">154 orders </div>
                                </div> 
                                <p> {{ product.description }} </p>
                                <!-- <dl class="dlist-align">
                                    <dt>Color</dt>
                                    <dd>Black and white</dd>
                                </dl>  
                                <dl class="dlist-align">
                                    <dt>Material</dt>
                                    <dd>Syntetic, wooden</dd>
                                </dl>  
                                <dl class="dlist-align">
                                    <dt>Delivery</dt>
                                    <dd>Russia, USA, and Europe</dd>
                                </dl>  -->
                            
                            </article> <!-- col.// -->
                            <aside class="col-sm-3">
                                <div class="action-wrap">
                                    <div class="price-wrap h4">
                                        <span class="price"> PKR {{ product.price }} </span>	
                                        <!-- <del class="price-old"> $98</del> -->
                                    </div> <!-- info-price-detail // -->
                                    <!-- <p class="text-success">Free shipping</p> -->
                                    <br>
                                    <p>
                                        <a href="#" class="btn btn-primary"> Buy now </a>
                                        <a href="#" class="btn btn-secondary"> Details  </a>
                                    </p>
                                    <!-- <a href="#"><i class="fa fa-heart"></i> Add to wishlist</a> -->
                                </div>
                            </aside> 
                        </div>
                    </div>
                </article> 
            </div>
        </div>     
    </div>
</template>

<script>
    const axios = require('axios');
    export default {
        data() {
            return {
                products: [],
                loading: false,
                error: false,
                query: ''
            }
        },
        methods: {
            search() {
                // Clear the error message.
                this.error = '';
                // Empty the products array so we can fill it with the new products.
                this.products = [];
                // Set the loading property to true, this will display the "Searching..." button.
                this.loading = true;

                // Making a get request to our API and passing the query to it.
                axios.get('/algolia/search?q=' + this.query).then((response) => {
                    console.log(response.data);

                    response.data.error ? this.error = response.data.error : this.products = response.data;

                    this.loading = false;

                    this.query = '';
                }).catch(function(error) {

                    console.log(error);
                });
            },

            beforeMounted() {
                this.products = filters;
            }
        }
    }
</script>