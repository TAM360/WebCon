@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <aside class="col-3">
            <h3 style="text-align:center">Filters</h3>
            <div class="card">
                
                <form action="{{route('filter')}}" method="get">
                    
                <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Range input </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input type="number" class="form-control" id="inputEmail4" placeholder="Rs 0" name="min" value="">
                                    </div>
                                    <div class="form-group col-md-6 text-right">
                                        <label>Max</label>
                                        <input type="number" class="form-control" placeholder="Rs 1000" name="max" value="">
                                    </div>
                                </div>
                            </div>
                            <!-- card-body.// -->
                        </div>
                    </article>
    
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Category</h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <label class="form-check">
                                <input class="form-check-input" type="radio" name="category" value="cement">
                                <span class="form-check-label">
                                    Cement
                                </span>
                                </label>
                                <label class="form-check">
                                <input class="form-check-input" type="radio" name="category" value="paint">
                                <span class="form-check-label">
                                    Paint
                                </span>
                                </label>
                                <label class="form-check">
                                <input class="form-check-input" type="radio" name="category" value="tiles">
                                <span class="form-check-label">
                                    Titles
                                </span>
                                </label>
                            </div>
                            <!-- card-body.// -->
                        </div>
                    </article>
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Color </h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <button class="btn btn-success">Apply</button>
                            </div>
                            <!-- card-body.// -->
                        </div>
                    </article>
                    <!-- card-group-item.// -->
                </form>
            </div>
            
        </aside>
        
        <div class="col-8">
            <h3 style="text-align:center">Products</h3>
            <div id="vue-app">
                <algolia-search>
                    {{ csrf_field() }}
                </algolia-search>
            </div>
        </div>
    
    </div>
    <!-- row.// -->

</div>
<!--container end.//-->

@endsection