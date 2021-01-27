﻿@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
            </body>
            <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                <img src="\theme\images\pngegg.png" float="left" height="120" width="300">
                <h3 aline="center">PORTABILIDAD</h3>
            </center>
                <form action="{{ url('/porta')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-row">
                <div class="form-group col-md-6">
                <input type="number" id ="numero" name="numero" class="form-control" placeholder="Numero Celular" required>
                </div>
                <div class="form-group col-md-6">
                 <input type="number" id ="documento" name="documento" class="form-control" placeholder="Documento de identidad" required>
                </div>
                <div class="form-group col-md-6">
                 <input type="text" id ="nombres" name="nombres" class="form-control" placeholder="Nombres" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" id ="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="mail" id ="correo" name="correo" class="form-control" placeholder="Ingrese correo electronico ejemplo@gmail.com" required>
                  </div>
                <div class="form-group col-md-6">
                   <select name="departamento" id="departamento" class="form-control"  required>
                      <option value="">Departamento</option>
                      @foreach($depto as $departamento)
                          <option value="{{ $departamento->Id_departamento}}">{{ $departamento->Nombre }}</option>
                      @endforeach
                </select>
                  </div>
                  <div class="form-group col-md-6">
                        <select name="id_ciudad" id="id_ciudad" class="form-control" placeholder="Ciudad o municipio" required></select>
                    </div>

                  <div class="form-group col-md-6">
                    <input type="text" id ="barrio" name="barrio" class="form-control" placeholder="Barrio"required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" id ="direccion" name="direccion" class="form-control" placeholder="Direccion" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" id ="nip" name="nip" class="form-control" placeholder="NIP" required>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="tipocliente" id="tipocliente" class="form-control-sm form-control" required>
                        <option value="0">Tipo de cliente</option>
                        @foreach($tipoCliente as $tipoClientes)
                            <option value="{{ $tipoClientes->tipo_cliente}}">{{ $tipoClientes->tipo_cliente }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                  <select name="planadquiere" id="planadquiere" class="form-control"  required>
                        <option value="0">Plan que adquire</option>
                        @foreach($planadquiere as $planadquieres)
                            <option value="{{ $planadquieres->planadquiere }}">{{ $planadquieres->planadquiere }}</option>
                        @endforeach
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" id ="ncontacto" name="ncontacto" class="form-control" placeholder="Numero de contacto"required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" id ="imei" name="imei" class="form-control" placeholder="Imei"required>
                  </div>
                  <div class="col-sm-3 col-form-label">
                    <label for="fvc">FVC</label>
                    <input type="date" id ="fvc" name="fvc" class="form-control" placeholder="FVC"required>
                  </div>
                  <div class="col-sm-3 col-form-label">
                    <label for="fentrega">Fecha Entrega</label>
                    <input type="date" id ="fentrega" name="fentrega" class="form-control" placeholder="Fecha de entrega"required>
                  </div>
                  <div class="col-sm-3 col-form-label">
                    <label for="fexpedicion">Fecha Expedición</label>
                    <input type="date" id ="fexpedicion" name="fexpedicion" class="form-control" placeholder="Fecha de expedición"required>
                  </div>
                  <div class="col-sm-3 col-form-label">
                    <label for="fnacimiento">Fecha Nacimiento</label>
                    <input type="date" id ="fnacimiento" name="fnacimiento" class="form-control" placeholder="Fecha de Nacimiento"required>
                  </div>
                  <div class="form-group col-md-6">
                  <select name="origen" id="origen" class="form-control"  required>
                        <option value="0">Origen de la migracion</option>
                        @foreach($origen as $origens)
                            <option value="{{ $origens->origen }}">{{ $origens->origen }}</option>
                        @endforeach
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                  <input type="number" id ="ngrabacion" name="ngrabacion" class="form-control"  placeholder="Numero de grabacion" required>
                  </div>
                  <div class="form-group col-md-12">
                  <textarea  id ="observaciones" name="observaciones" class="form-control" rows="3" placeholder="Observaciones"></textarea>
                  </div>

                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">
                      <i class="fa fa-dot-circle-o"></i> Enviar
                  </button>
                  <a href=({{ route('porta.create')}})><button type="reset"  class="btn btn-danger btn-sm">
                      <i class="fa fa-ban"></i> atras
                  </button></a>
               </div>
            </form>
            <script src="{{asset('js/app.js')}}"></script>
                    </body>
                    @section('css')
                    <link rel="stylesheet" href="/css/admin_custom.css">
                    @stop
                    @section('js')
            <script>
            Swal.fire(
              'PORTABILIDAD',
              'Consigna todos los datos de forma correcta',
              'success'
            )
            </script>
            @stop




<script>
$(document).ready(function() {
     $('#departamento').on('change', function(e) {
         var id = $('#departamento').val();
         $.ajax({

             url: "{{ route('Ciudad')}}",
             data: "id="+id+"&_token={{ csrf_token()}}",
             dataType: "json",
             method: "POST",
             success: function(result)
             {

            $('#id_ciudad').empty();
            $('#id_ciudad').append("<option value=''>Ingrese Ciudad o Municipio</option>");
            $.each(result, function(index,value){

                     $('#id_ciudad').append("<option value='"+value.Municipio+"'>"+value.Municipio+"</option>");
                 });
             }
         });
     });
 });
</script>

<script type="text/javascript">
    //<![CDATA[
    // Nieve en el blog
    /** @license
    DHTML Snowstorm! JavaScript-based Snow for web pages
    --------------------------------------------------------
    Version 1.42.20111120 (Previous rev: 1.41.20101113)
    Copyright (c) 2007, Scott Schiller. All rights reserved.
    Code provided under the BSD License:
    http://schillmania.com/projects/snowstorm/license.txt
    */
    var snowStorm=function(e,d){function g(a,d){isNaN(d)&&(d=0);return Math.random()*a+d}function o(){e.setTimeout(function(){a.start(true)},20);a.events.remove(i?d:e,"mousemove",o)}function r(){if(!a.excludeMobile||!s)a.freezeOnBlur?a.events.add(i?d:e,"mousemove",o):o();a.events.remove(e,"load",r)}this.flakesMax=128;this.flakesMaxActive=120;this.animationInterval=40;this.excludeMobile=true;this.flakeBottom=null;this.followMouse=true;this.snowColor="#ffffff";this.snowCharacter="&bull;";this.snowStick=true;
    this.targetElement=null;this.useMeltEffect=true;this.usePositionFixed=this.useTwinkleEffect=false;this.freezeOnBlur=true;this.flakeRightOffset=this.flakeLeftOffset=0;this.flakeHeight=this.flakeWidth=8;this.vMaxX=5;this.vMaxY=4;this.zIndex=0;var a=this,y=this,i=navigator.userAgent.match(/msie/i),z=navigator.userAgent.match(/msie 6/i),A=navigator.appVersion.match(/windows 98/i),s=navigator.userAgent.match(/mobile/i),B=i&&d.compatMode==="BackCompat",t=s||B||z,h=null,k=null,j=null,m=null,u=null,v=null,



    p=1,n=false,q;a:{try{d.createElement("div").style.opacity="0.5"}catch(C){q=false;break a}q=true}var w=false,x=d.createDocumentFragment();this.timers=[];this.flakes=[];this.active=this.disabled=false;this.meltFrameCount=20;this.meltFrames=[];this.events=function(){function a(b){var b=f.call(b),c=b.length;l?(b[1]="on"+b[1],c>3&&b.pop()):c===3&&b.push(false);return b}function d(a,c){var e=a.shift(),f=[b[c]];if(l)e[f](a[0],a[1]);else e[f].apply(e,a)}var l=!e.addEventListener&&e.attachEvent,f=Array.prototype.slice,
    b={add:l?"attachEvent":"addEventListener",remove:l?"detachEvent":"removeEventListener"};return{add:function(){d(a(arguments),"add")},remove:function(){d(a(arguments),"remove")}}}();this.randomizeWind=function(){var c;c=g(a.vMaxX,0.2);u=parseInt(g(2),10)===1?c*-1:c;v=g(a.vMaxY,0.2);if(this.flakes)for(c=0;c<this.flakes.length;c++)this.flakes[c].active&&this.flakes[c].setVelocities()};this.scrollHandler=function(){var c;m=a.flakeBottom?0:parseInt(e.scrollY||d.documentElement.scrollTop||d.body.scrollTop,
    10);isNaN(m)&&(m=0);if(!n&&!a.flakeBottom&&a.flakes)for(c=a.flakes.length;c--;)a.flakes[c].active===0&&a.flakes[c].stick()};this.resizeHandler=function(){e.innerWidth||e.innerHeight?(h=e.innerWidth-(!i?16:16)-a.flakeRightOffset,j=a.flakeBottom?a.flakeBottom:e.innerHeight):(h=(d.documentElement.clientWidth||d.body.clientWidth||d.body.scrollWidth)-(!i?8:0)-a.flakeRightOffset,j=a.flakeBottom?a.flakeBottom:d.documentElement.clientHeight||d.body.clientHeight||d.body.scrollHeight);k=parseInt(h/2,10)};this.resizeHandlerAlt=
    function(){h=a.targetElement.offsetLeft+a.targetElement.offsetWidth-a.flakeRightOffset;j=a.flakeBottom?a.flakeBottom:a.targetElement.offsetTop+a.targetElement.offsetHeight;k=parseInt(h/2,10)};this.freeze=function(){var c;if(a.disabled)return false;else a.disabled=1;for(c=a.timers.length;c--;)clearInterval(a.timers[c])};this.resume=function(){if(a.disabled)a.disabled=0;else return false;a.timerInit()};this.toggleSnow=function(){a.flakes.length?(a.active=!a.active,a.active?(a.show(),a.resume()):(a.stop(),



    a.freeze())):a.start()};this.stop=function(){var c;this.freeze();for(c=this.flakes.length;c--;)this.flakes[c].o.style.display="none";a.events.remove(e,"scroll",a.scrollHandler);a.events.remove(e,"resize",a.resizeHandler);a.freezeOnBlur&&(i?(a.events.remove(d,"focusout",a.freeze),a.events.remove(d,"focusin",a.resume)):(a.events.remove(e,"blur",a.freeze),a.events.remove(e,"focus",a.resume)))};this.show=function(){var a;for(a=this.flakes.length;a--;)this.flakes[a].o.style.display="block"};this.SnowFlake=
    function(a,e,l,f){var b=this;this.type=e;this.x=l||parseInt(g(h-20),10);this.y=!isNaN(f)?f:-g(j)-12;this.vY=this.vX=null;this.vAmpTypes=[1,1.2,1.4,1.6,1.8];this.vAmp=this.vAmpTypes[this.type];this.melting=false;this.meltFrameCount=a.meltFrameCount;this.meltFrames=a.meltFrames;this.twinkleFrame=this.meltFrame=0;this.active=1;this.fontSize=10+this.type/5*10;this.o=d.createElement("div");this.o.innerHTML=a.snowCharacter;this.o.style.color=a.snowColor;this.o.style.position=n?"fixed":"absolute";this.o.style.width=
    a.flakeWidth+"px";this.o.style.height=a.flakeHeight+"px";this.o.style.fontFamily="arial,verdana";this.o.style.overflow="hidden";this.o.style.fontWeight="normal";this.o.style.zIndex=a.zIndex;x.appendChild(this.o);this.refresh=function(){if(isNaN(b.x)||isNaN(b.y))return false;b.o.style.left=b.x+"px";b.o.style.top=b.y+"px"};this.stick=function(){t||a.targetElement!==d.documentElement&&a.targetElement!==d.body?b.o.style.top=j+m-a.flakeHeight+"px":a.flakeBottom?b.o.style.top=a.flakeBottom+"px":(b.o.style.display=
    "none",b.o.style.top="auto",b.o.style.bottom="0px",b.o.style.position="fixed",b.o.style.display="block")};this.vCheck=function(){if(b.vX>=0&&b.vX<0.2)b.vX=0.2;else if(b.vX<0&&b.vX>-0.2)b.vX=-0.2;if(b.vY>=0&&b.vY<0.2)b.vY=0.2};this.move=function(){var d=b.vX*p;b.x+=d;b.y+=b.vY*b.vAmp;if(b.x>=h||h-b.x<a.flakeWidth)b.x=0;else if(d<0&&b.x-a.flakeLeftOffset<-a.flakeWidth)b.x=h-a.flakeWidth-1;b.refresh();if(j+m-b.y<a.flakeHeight)b.active=0,a.snowStick?b.stick():b.recycle();else{if(a.useMeltEffect&&b.active&&
    b.type<3&&!b.melting&&Math.random()>0.998)b.melting=true,b.melt();if(a.useTwinkleEffect)if(b.twinkleFrame)b.twinkleFrame--,b.o.style.visibility=b.twinkleFrame&&b.twinkleFrame%2===0?"hidden":"visible";else if(Math.random()>0.9)b.twinkleFrame=parseInt(Math.random()*20,10)}};this.animate=function(){b.move()};this.setVelocities=function(){b.vX=u+g(a.vMaxX*0.12,0.1);b.vY=v+g(a.vMaxY*0.12,0.1)};this.setOpacity=function(a,b){if(!q)return false;a.style.opacity=b};this.melt=function(){!a.useMeltEffect||!b.melting?
    b.recycle():b.meltFrame<b.meltFrameCount?(b.meltFrame++,b.setOpacity(b.o,b.meltFrames[b.meltFrame]),b.o.style.fontSize=b.fontSize-b.fontSize*(b.meltFrame/b.meltFrameCount)+"px",b.o.style.lineHeight=a.flakeHeight+2+a.flakeHeight*0.75*(b.meltFrame/b.meltFrameCount)+"px"):b.recycle()};this.recycle=function(){b.o.style.display="none";b.o.style.position=n?"fixed":"absolute";b.o.style.bottom="auto";b.setVelocities();b.vCheck();b.meltFrame=0;b.melting=false;b.setOpacity(b.o,1);b.o.style.padding="0px";b.o.style.margin=
    "0px";b.o.style.fontSize=b.fontSize+"px";b.o.style.lineHeight=a.flakeHeight+2+"px";b.o.style.textAlign="center";b.o.style.verticalAlign="baseline";b.x=parseInt(g(h-a.flakeWidth-20),10);b.y=parseInt(g(j)*-1,10)-a.flakeHeight;b.refresh();b.o.style.display="block";b.active=1};this.recycle();this.refresh()};this.snow=function(){for(var c=0,d=0,e=0,f=null,f=a.flakes.length;f--;)a.flakes[f].active===1?(a.flakes[f].move(),c++):a.flakes[f].active===0?d++:e++,a.flakes[f].melting&&a.flakes[f].melt();if(c<a.flakesMaxActive&&
    (f=a.flakes[parseInt(g(a.flakes.length),10)],f.active===0))f.melting=true};this.mouseMove=function(c){if(!a.followMouse)return true;c=parseInt(c.clientX,10);c<k?p=-2+c/k*2:(c-=k,p=c/k*2)};this.createSnow=function(c,d){var e;for(e=0;e<c;e++)if(a.flakes[a.flakes.length]=new a.SnowFlake(a,parseInt(g(6),10)),d||e>a.flakesMaxActive)a.flakes[a.flakes.length-1].active=-1;y.targetElement.appendChild(x)};this.timerInit=function(){a.timers=!A?[setInterval(a.snow,a.animationInterval)]:[setInterval(a.snow,a.animationInterval*
    3),setInterval(a.snow,a.animationInterval)]};this.init=function(){var c;for(c=0;c<a.meltFrameCount;c++)a.meltFrames.push(1-c/a.meltFrameCount);a.randomizeWind();a.createSnow(a.flakesMax);a.events.add(e,"resize",a.resizeHandler);a.events.add(e,"scroll",a.scrollHandler);a.freezeOnBlur&&(i?(a.events.add(d,"focusout",a.freeze),a.events.add(d,"focusin",a.resume)):(a.events.add(e,"blur",a.freeze),a.events.add(e,"focus",a.resume)));a.resizeHandler();a.scrollHandler();a.followMouse&&a.events.add(i?d:e,"mousemove",
    a.mouseMove);a.animationInterval=Math.max(20,a.animationInterval);a.timerInit()};this.start=function(c){if(w){if(c)return true}else w=true;if(typeof a.targetElement==="string"&&(c=a.targetElement,a.targetElement=d.getElementById(c),!a.targetElement))throw Error('Snowstorm: Unable to get targetElement "'+c+'"');if(!a.targetElement)a.targetElement=!i?d.documentElement?d.documentElement:d.body:d.body;if(a.targetElement!==d.documentElement&&a.targetElement!==d.body)a.resizeHandler=a.resizeHandlerAlt;



    a.resizeHandler();a.usePositionFixed=a.usePositionFixed&&!t;n=a.usePositionFixed;if(h&&j&&!a.disabled)a.init(),a.active=true};a.events.add(e,"load",r,false);return this}(window,document);
    //]]>
    </script>
@endsection
