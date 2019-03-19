<template>
     <div>
         <div class="well well-sm">
            <div class="form-group">
                <div class="input-group input-group-md">
                    <div class="icon-addon addon-md">
                        <input type="text" placeholder="What are you looking for?" class="form-control"  v-model="query">
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" @click="search()"   v-if="!loading">Search!</button>
                        <button class="btn btn-default" type="button" disabled="disabled" v-if="loading">Searching...</button>
                        <div class="alert alert-danger" role="alert" v-if="error">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            @{{ error }}
                        </div>
                    </span>
                </div>
            </div>
        </div>
        
        <div id="products" class="row list-group">
            <div class="item col-xs-4 col-lg-4" v-for="product in products">
                <div class="thumbnail">
                    <img class="group list-group-image" :src="product.image_url" :alt="product.name" />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">{{ product.name }}</h4>
                        <p class="group inner list-group-item-text">{{ product.description }}</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">{{ product.price }}</p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success" href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
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
       async search() {
            // Clear the error message.
            this.error = '';
            // Empty the products array so we can fill it with the new products.
            this.products = [];
            // Set the loading property to true, this will display the "Searching..." button.
            this.loading = true;

            // Making a get request to our API and passing the query to it.
            await axios.get('/algolia/search?q=' + this.query).then((response) => {
                console.log(response.data);
                
                response.data.error ? this.error = response.data.error : this.products = response.data;
                
                this.loading = false;

                this.query = '';
            }).catch(function (error) {

                console.log(error);
            });
        }
    }
}
</script>
