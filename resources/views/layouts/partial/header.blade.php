@isset($noticias)
<!--bar-->
<div class="container-fluid azul-claro d-none   d-lg-block  ">
  <div class="container ">
    <div class="row print-hidden">
      <div class="col-2 col-md-2 col-lg-2 text-dark text-center bg-white border align-self-center ">
        <div class="font-weight-bold p-2">
          LO ÚLTIMO:
        </div>

      </div>
      <div class="col-12 col-md-8 col-lg-8  align-self-center">
        <div class="  text-center ">
          <marquee behavior="scroll" direction="left" style=" font-size: 0.8rem;">

            @foreach($noticias as $nota)
            <span class="badge badge-danger mr-2 text-uppercase">{{$nota->Ciudad}}</span><a class="text-white text-uppercase mr-3" href="{{url('nota',$nota->ID.'_'.Str::slug($nota->Titular,'-'))}}">{{$nota->Titular}}</a>
            @endforeach

          </marquee>
        </div>
        @endif
      </div>
      <div class=" col-md-2 col-lg-2 align-self-center ">
        <div class="d-flex justify-content-around">
          <a class="text-white" style="padding-right: 5px;" target="_blank" href="https://www.facebook.com/radioabcesteli/?fref=ts"> <i class="fab fa-facebook-f" style="font-size: 20px;"></i></a>
          <a class="text-white" style="padding-right: 5px;" target="_blank" href="https://twitter.com/radioabcesteli"> <i class="fab fa-twitter" style="font-size: 20px;"></i></a>
          <a class="text-white" style="padding-right: 5px;" target="_blank" href="https://www.instagram.com/radioabcesteli/"> <i class="fab fa-instagram" style="font-size: 20px;"></i></a>
          <a class="text-white" target="_blank" href="https://www.youtube.com/channel/UC4jgoYzXPyiQ-JejLctLtlA"> <i class="fab fa-youtube" style="font-size: 20px;"></i></a>

        </div>
      </div>

    </div>
  </div>
</div>
<!--end-bar-->



<!--header-->
<div class="container p-0 d-none  d-lg-block imprimir">
  <header class="py-3 print-hidden">




    <div class="row align-items-center justify-content-end">


      <div class="col-lg-4 mt-2">
        <div class="d-flex">
          <div>
            <a href="{{url('/')}}"><img class="img-fluid " width="120px" src="{{asset('img/brand.png')}}" alt="Logo">
          </div>
          <div>
          <a href="{{url('/')}}"><img class="img-fluid" src="{{asset('/img/slogans2.png')}}" alt="slogan"></a>
          </div>
        </div>
      </div>


      <div class="col-lg-4 ">

       

      </div>



      <div class="col-lg-4 ">

        <div class="row ">

          <div class="col-md-8 align-self-center p-0">
            <div class=" mr-2 float-right">
              <i class="fas fa-play-circle" style="font-size: 3rem;"></i>
            </div>

          </div>
          <div class="col-md-4 align-self-center p-0">
            <div class="font-weight-bold " style="line-height: 16px;  font-size: 1.1rem; color: #006097;">
              ESCÚCHANOS <br> EN VIVO

            </div>
          </div>
          <div class="col-md-12">
            <div class="float-right" style="max-width: 14rem;">
              <form action="{{url('buscar')}}" method="get">
                <div class="form-group mt-1">
                  <div class="input-group mb-3">

                    <input type="search" class="form-control text-dark " name="buscar" required="" placeholder="Buscar" aria-label="" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary border-0" type="submit"><i class="fal fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>


        </div>

      </div>



    </div>




  </header>
</div>
<!--end-header-->




<div class="media-print">

  <nav class="navbar navbar-expand-lg  navbar-fixed bg-white container p-0 fixed-sm-top shadow">
    <a id="logo-small" class="navbar-brand text-white pl-2 " href="{{url('/')}}"><img width="50px" src="{{asset('img/brand.png')}}" alt="Logo"></a>
   

    <a href="{{url('escuchar')}} " class="escuchanos" target="_blank">
      <div class="d-flex azul-claro p-1 px-2 rounded-lg">
        <div> <i style="font-size: 1.5rem;" class="far fa-play-circle text-white mr-1"></i></div>
        <div class="align-self-center"> <small class="text-white font-weight-bold escuchanos">Escúchanos </small></div>
      </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

      <span class="mr-1 text-dark font-weight-bold">MENU</span><i class="far fa-bars text-dark" style="font-size: 1rem;"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
      <div class="container border-top" >

        <ul class="navbar-nav justify-content-between text-uppercase font-weight-bold text-md-center " style="font-size: 1rem; width: 100%;">
          <li class="nav-item buscador py-2" style="display: none;">

            <div class="form-row align-items-center">
              <div class="col-auto">
                <form action="{{url('buscar')}}" method="get">

                  <input required type="text" name="buscar" class="form-control mb-2" id="inlineFormInput" placeholder="Buscar ">
              </div>

              <div class="input-group-prepend">
                <i class="fal fa-search"></i>
              </div>
              </form>

            </div>

          </li>
          <li class="nav-item  nav-link-hover ">
            <a class="nav-link text-dark  " href="{{url('/')}}">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown nav-link-hover ">
            <a class="nav-link dropdown-toggle text-dark   " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Noticias <span>ABC</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{url('locales')}}">Locales</a>
              <a class="dropdown-item" href="{{url('departamentales')}}">Departamentales</a>
              <a class="dropdown-item" href="{{url('nacionales')}}">Nacionales</a>

              <a class="dropdown-item" href="{{url('internacionales')}}">Internacionales</a>

            </div>
          </li>
          <li class="nav-item nav-link-hover ">
            <a class="nav-link text-dark  " href="{{url('abctv')}}">ABCtv</a>
          </li>
          <li class="nav-item nav-link-hover ">
            <a class="nav-link text-dark  " href="{{url('abc/podcast')}}">Podcast</a>
          </li>
          <li class="nav-item nav-link-hover ">
            <a class="nav-link text-dark    " href="{{url('empleos')}}"><span>Empleos</span></a>
          </li>
          <li class="nav-item nav-link-hover ">
            <a class="nav-link text-dark  " href="{{url('nosotros')}}">Nosotros</a>
          </li>
          <li class="nav-item text-white nav-link-hover ">
            <a class="nav-link text-dark  " href="{{url('contactanos')}}">Contáctanos</a>
          </li>

          <li class="nav-item mt-2 escuchanos-nav text-center">
            <a target="_blank" href="{{url('escuchar')}}"><i style="font-size: 1rem; color: red; padding-right: 5px;" class="far fa-play-circle ml-3 border-right"></i><small class="text-dark">Escúchanos</small></a>

          </li>
          <li class="nav-hidden position-relative">
            <button id="boton" type="button" class="btn btn-link"> <i class="far fa-search text-dark mt-1 ml-2" style="font-size: 20px;"></i></button>


            <div id="formulario" class="d-none position-absolute" style="right: 10%;" >


              <form action="{{url('buscar')}}" method="get">
                <div class="d-flex flex-nowrap" style="width: 15rem;">
                  <div > <input required type="text" name="buscar" class="form-control mb-2" id="inlineFormInput" placeholder="Buscar "></div>
                  <div > <button type="submit" class="btn btn-primary mb-2">Buscar</button></div>
                </div>


              </form>
            </div>

            <script>
              var boton = document.getElementById('boton');
              var element = document.getElementById('formulario');
              boton.addEventListener('click', function() {


                element.classList.toggle("d-block");
              });
            </script>




          </li>

        </ul>

      </div>

    </div>
  </nav>


</div>