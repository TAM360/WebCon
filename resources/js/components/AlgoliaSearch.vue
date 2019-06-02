<template>
    <div class="row">
          
        <div id="products" class="col">
            <span class="alert alert-primary" role="alert" v-if="status">{{ status }}</span>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <a class="btn btn-secondary" @click="search()" v-if="!loading">Search</a>
                    <a class="btn btn-secondary" disabled="disabled"  v-if="loading">Searching...</a>
                    
                </div>
                <input type="text" @keyup.enter="search()"  placeholder="Paints, Cements, Tiles etc" class="form-control"  v-model="query">
            </div>

            <div v-for="(product, key) in products" :key="key">
                <form action="#" method="post">
                    <article class="card card-product input-group mb-3">
                        <div class="card-body">
                            <div class="row">
                                <aside class="col-sm-3">
                                    <div class="img-wrap"><img :src="product.image_url" :alt="product.name"></div>
                                </aside> 
                                <article class="col-sm-6">
                                    
                                    <h4 :name="product.name" class="title"> {{ product.name }} </h4>
                                    <div class="rating-wrap">
                                        <ul class="rating-stars">
                                        </ul>
                                    </div> 
                                    <p :description="product.description"> {{ product.description }} </p>

                                </article> <!-- col.// -->
                                <aside class="col-sm-3">
                                    <div class="action-wrap">
                                        <div class="price-wrap h4">
                                            <span class="price"> PKR {{ product.price }} </span>
                                        </div> 
                                        <br>
                                        <slot></slot>
                                        <a href="#" @click="addToCart(product)" class="btn btn-primary">Add to Cart</a>
                                        <a href="http://localhost:8000/cart/checkout/" class="btn btn-success">Checkout</a>
                                    </div>
                                </aside> 
                            </div>
                        </div>
                    </article>
                </form>
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
                query: '',
                id: '',
                name: '',
                price: '',
                url: '',
                description: '',
                status: ''
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
            addToCart(item) {
                this.status = '';
                this.error = false;

                axios.post('/cart/add', {
                    name: item.name,
                    description: item.description,
                    price: item.price,
                    url: item.image_url,
                    id: item.id
                }).then(response => {
                    console.log(response)
                    this.status = response.data.success_message;              
                }).catch(error => {
                    console.log(error)
                    this.error = true;
                    this.status = 'Item submission failed. Try again!'
                })
            },

            checkOut() {
                axios.get('/cart/checkout', {
                }).then(response => {
                    alert(response.data.cart_items)
                    // window.location.href = response.data;           
                }).catch(error => {
                    console.log(error)
                })
            },

            beforeMounted() {
                this.products = filters;
            }
        }
    }
</script>