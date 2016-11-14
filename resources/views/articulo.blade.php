@extends('principal')
@section('contenido')
<div class="single contact">
	<div class="container">
		<div class="single-main">
			<div class="col-md-10 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="{{ asset('img/'.$articulo->first()->id_articulo.'.png')}}">
									<img src="{{ asset('img/'.$articulo->first()->id_articulo.'.png')}}" />
								</li>
								<li data-thumb="{{ asset('img/'.$articulo->first()->id_articulo.'-'.$articulo->first()->id_articulo.'.png')}}">
									<img src="{{ asset('img/'.$articulo->first()->id_articulo.'-'.$articulo->first()->id_articulo.'.png')}}" />
								</li>
							</ul>
						</div>
						<script defer src="{{ asset("js/jquery.flexslider.js")}}"></script>
						<link rel="stylesheet" href="{{ asset("css/flexslider.css")}}" type="text/css" media="screen" />

						<script>
							$(window).load(function() {
							  $('.flexslider').flexslider({
							    animation: "slide",
							    controlNav: "thumbnails"
							  });
							});
						</script>
					</div>
					<form action="{{url('/agregarArticulo')}}/{{$articulo->first()->id_articulo}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="col-md-7 single-top-right">
					<div class="details-left-info">
						<h3>{{$articulo->first()->nombre}}</h3>
						<p class="availability">Disponibilidad: <span class="color">{{$articulo->first()->stock}}</span></p>
						<div class="price_single">
							<span>${{$articulo->first()->precio}}</span>
						</div>
						<h2 class="quick">Descripcion:</h2>
						<p class="quick_desc">{{$articulo->first()->descripcion}}</p>
						<div class="quantity_box">
							<span>Cantidad:</span>
							<input type="number" value="1" min="1" max="{{$articulo->first()->stock}}" name="cantidad">
						</div>
						<div class="clearfix"> </div>
						<div class="single-but agregar">
							<input type="submit" value="Agregar">
						</div>
					</div>
					<div class="clearfix"></div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="detailBox">
    <div class="titleBox">
      <label>Comentarios</label>        
    </div>
   
    <div class="actionBox">
        <ul class="commentList">             
            @forelse ($comentario as $cm)
              <div class="commentAnswerBox" style="background-color:#8C2830; color:#ffffff;">{{$cm->usuario}}</div>
              <li>               
                <div class="commentText">                    
                    <p class="" >{{$cm->comentario}}</p> 
                    <div style="margin-top:10px">                    
                      <span class="date sub-text" id="dt">{{$cm->created_at}}</span>                    
                    </div>
                </div>
              </li>  
             @empty
             <li>               
                <div class="commentText">                    
                    <p class="" >No hay comentarios</p>
                </div>
              </li>            
            @endforelse
        </ul>      
    </div>

    <div class="actionBox">
        <form action="{{url('/guardarComentario')}}/{{$articulo->first()->id_articulo}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="usuario">Usuario:</label>
			<input type="text" class="form-control" name="usuario" required>
		</div>       
        <div class="form-group">                             
	        <label for="comentario">Comentario:</label>
			<input type="text" class="form-control" name="comentario" required>
       	</div>
        <div class="form-group"> 
        	<div class="single-but">              
        		<input type="submit" class="btn btn-primary" value="Comentar">
        	</div>
        </div>         
    </div>
</div>
</div>

@stop