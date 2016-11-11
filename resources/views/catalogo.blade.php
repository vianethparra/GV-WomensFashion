@extends('principal')
@section('contenido')
    <div class="shoes"> 
        <div class="container"> 
            <div class="product-one">
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">                            
                            <a href="single.html">
                                <img src="img/1.png" alt="" />
                                <div class="mask">
                                    <span>Preview</span>
                                </div>
                            </a>
                        <h4>Articulo</h4>
                        <p><a class="item_add" href="{{url('/articulo')}}"><i></i> <span class=" item_price">$100</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop