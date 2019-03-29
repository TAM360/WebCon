@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <aside class="col-3">
            <h3 style="text-align:center">Filters</h3>
            <div class="card">
                
                {{-- <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Brands </h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            <form>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <span class="form-check-label">
                                        Mersedes Benz
                                    </span>
                                </label>
                                <!-- form-check.// -->
                                <label class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-label">
                                    Nissan Altima
                                </span>
                                </label>
                                <!-- form-check.// -->
                                <label class="form-check">
                          <input class="form-check-input" type="checkbox" value="">
                          <span class="form-check-label">
                            Another Brand
                          </span>
                        </label>
                                <!-- form-check.// -->
                            </form>

                        </div>
                        <!-- card-body.// -->
                    </div>
                </article> --}}
                <!-- card-group-item.// -->
                <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Range input </h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Min</label>
                                    <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <label>Max</label>
                                    <input type="number" class="form-control" placeholder="$1,0000">
                                </div>
                            </div>
                        </div>
                        <!-- card-body.// -->
                    </div>
                </article>

                <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Choose type </h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                    <label class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadio" value="">
                      <span class="form-check-label">
                        First hand items
                      </span>
                    </label>
                    <label class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadio" value="">
                      <span class="form-check-label">
                        Brand new items
                      </span>
                    </label>
                    <label class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadio" value="">
                      <span class="form-check-label">
                        Some other option
                      </span>
                    </label>
                        </div>
                        <!-- card-body.// -->
                    </div>
                </article>
                {{-- <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Similar category </h6>
                    </header>
                    <div class="filter-content">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item">Cras justo odio <span class="float-right badge badge-light round">142</span> </a>
                            <a href="#" class="list-group-item">Dapibus ac facilisis  <span class="float-right badge badge-light round">3</span>  </a>
                            <a href="#" class="list-group-item">Morbi leo risus <span class="float-right badge badge-light round">32</span>  </a>
                            <a href="#" class="list-group-item">Another item <span class="float-right badge badge-light round">12</span>  </a>
                        </div>
                        <!-- list-group .// -->
                    </div>
                </article> --}}
                <!-- card-group-item.// -->
                <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Color check</h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            <label class="btn btn-danger">
                            <input class="" type="checkbox" name="myradio" value="">
                            <span class="form-check-label">Red</span>
                        </label>
                            <label class="btn btn-success">
                            <input class="" type="checkbox" name="myradio" value="">
                            <span class="form-check-label">Green</span>
                        </label>
                            <label class="btn btn-primary">
                            <input class="" type="checkbox" name="myradio" value="">
                            <span class="form-check-label">Blue</span>
                        </label>
                        </div>
                        <!-- card-body.// -->
                    </div>
                </article>
                <!-- card-group-item.// -->
            </div>
            <!-- card.// -->
                <!-- card-group-item.// -->
            {{-- <article class="card-group-item">
                <header class="card-header">
                    <h6 class="title">Selection </h6>
                </header>
                <div class="filter-content">
                    <div class="card-body">
                        <div class="custom-control custom-checkbox">
                            <span class="float-right badge badge-light round">52</span>
                            <input type="checkbox" class="custom-control-input" id="Check1">
                            <label class="custom-control-label" for="Check1">Samsung</label>
                        </div>
                        <!-- form-check.// -->

                        <div class="custom-control custom-checkbox">
                            <span class="float-right badge badge-light round">132</span>
                            <input type="checkbox" class="custom-control-input" id="Check2">
                            <label class="custom-control-label" for="Check2">Black berry</label>
                        </div>
                        <!-- form-check.// -->

                        <div class="custom-control custom-checkbox">
                            <span class="float-right badge badge-light round">17</span>
                            <input type="checkbox" class="custom-control-input" id="Check3">
                            <label class="custom-control-label" for="Check3">Samsung</label>
                        </div>
                        <!-- form-check.// -->

                        <div class="custom-control custom-checkbox">
                            <span class="float-right badge badge-light round">7</span>
                            <input type="checkbox" class="custom-control-input" id="Check4">
                            <label class="custom-control-label" for="Check4">Other Brand</label>
                        </div>
                        <!-- form-check.// -->
                    </div>
                    <!-- card-body.// -->
                </div>
            </article> --}}
        </aside>

        <div class="col-8">
            <h3 style="text-align:center">Products</h3>
            <div id="vue-app">
                {{-- <div class="row" style="margin-left:10px;">
                    @foreach ($products as $product) 
                        @include('layouts.home.shopItems')
                    @endforeach                                           
                </div>   --}}
                <algolia-search></algolia-search>
            </div>
        </div>
    
    </div>
    <!-- row.// -->

</div>
<!--container end.//-->

@endsection