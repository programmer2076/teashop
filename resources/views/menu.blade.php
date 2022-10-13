@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-10">
            <div class="">
                <div class="row">
                    <div class="col-8 border-right min-vh-100">
                        <div class="vh-100 overflow-scroll pr-2">
                            <div class="d-flex justify-content-between align-items-end mt-3 mb-3 position-sticky bg-white" style="top:0;z-index: 10">
                                <div class="">
                                    <h4 class="text-primary mb-0">Mi Mi</h4>
                                    <small class="text-black-50">Tea & Food</small>

                                </div>
                                <div class="">
                                    <div class="form-row">
                                        <div class="mr-2">
                                            <input type="text" class="form-control text-capitalize  " id="search" placeholder="search item">
                                        </div>
                                        <div class="">
                                            <select name="" id="category" class="custom-select">
                                                <option value="0">All Category</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="products" class="card-columns">

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="vh-100 overflow-scroll">
                            <div class="d-flex justify-content-between align-items-end mt-3 mb-3">
                                <div class="">
                                    <h4 class="text-primary mb-0">My Cart</h4>
                                    <small class="text-black-50">Added Items</small>

                                </div>
                                <div class="">
                                    <h4>
                                        <span class="item-in-cart-count">0</span>
                                        <i class="fas fa-shopping-cart text-primary"></i>
                                    </h4>
                                </div>
                            </div>
                            <div id="cart">

                            </div>
                            <div class="total position-sticky py-3 bg-white" style="bottom: 0">

                            </div>
                            <div class="d-grid gap-2 mx-auto">
                                <button id="order" class="btn btn-primary shadow-sm disabled" type="button">Order</button>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



