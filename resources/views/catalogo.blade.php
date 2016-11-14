@extends('principal')
@section('contenido')
    <div class="shoes">
        <div class="container"> 
            <div class="product-one">
            @forelse($articulo as $a)
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">               
                            <a href="{{url('/articulo')}}/{{$a->id_articulo}}">
                                <img src="{{ asset('img/'.$a->id_articulo.'.png')}}" alt="" />
                                <div class="mask">
                                    <span>Ver</span>
                                </div>
                            </a>
                        <h4>{{$a->nombre}}</h4>
                        <p><i></i> <span class=" item_price">${{$a->precio}}</span></p>
                    </div>
                </div>
            @empty
            @endforelse  
            </div>
        </div>
    </div>
@stop