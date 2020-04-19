<header class="header ">

  <div class="container-fluid text-center">
     <div class="row align-items-center justify-content-end">


    <div class="col-lg-4 mt-2">
      <div class="d-flex">
        <div>
           <a href="{{url('/')}}"><img class="img-fluid ml-5" width="120px" src="{{asset('img/brand.png')}}" alt="Logo"></a>
        </div>
        <div>
          <img class="img-fluid" src="{{asset('/img/slogans.png')}}" alt="">
        </div>
      </div>
    </div>


    <div class="col-lg-2 ">
        <form action="{{url('buscar')}}" method="get">
      <div class="form-group mt-1">
              <div class="input-group mb-3">
              
  <input style="background-color: transparent;border:none; color:white;border-bottom: 1px solid #5386ff;" type="text" class="form-control" name="buscar" required placeholder="Buscar" aria-label="" aria-describedby="basic-addon1">
  <div class="input-group-prepend">
    <button style="border:none; border-bottom: 1px solid #5386ff; " class="btn btn-outline-secondary" type="submit"><i class="fal fa-search" ></i></button>
  </div>
</div>
              </div>
     </form>

     </div>



      <div class="col-lg-3 ">
      
      <div>
            <a href="{{url('escuchar')}}" target="_blank">
        <div class="row justify-content-center ">
          <div class="col-xs-1"> <div ><i  style="font-size: 28px;  padding-right: 5px;" class="far fa-play-circle"></i>
 
                  </div></div>
           <div class="col-xs-11  ">  <div class="font-weight-bold" style="line-height: 16px;  font-size: 1rem; color: #006097;">
                      ESCÚCHANOS <br>
                      EN VIVO
                      </div></div>
        </div>
          </a>
        </div>

    </div>


    <div class="col-lg-3 ">
      <div class="d-flex flex-column text-left" style="width: 120px;">
          <div>
             <div class="d-flex"><div class="digital-clock" style="max-width: 200px;"></div><small class="mt-1 ml-1 text-primary"> Nicaragua</small></div>
          </div>

           <div class="d-flex justify-content-around">
            <a  style="padding-right: 5px;" target="_blank" href="https://www.facebook.com/radioabcesteli/?fref=ts"> <i class="fab fa-facebook-f" style="font-size: 20px;"></i></a>
             <a style="padding-right: 5px;" target="_blank" href="https://twitter.com/radioabcesteli"> <i class="fab fa-twitter" style="font-size: 20px;"></i></a>
                  <a style="padding-right: 5px;" target="_blank" href="https://www.instagram.com/radioabcesteli/"> <i class="fab fa-instagram" style="font-size: 20px;"></i></a>
                   <a target="_blank" href="https://www.youtube.com/channel/UC4jgoYzXPyiQ-JejLctLtlA"> <i class="fab fa-youtube" style="font-size: 20px;"></i></a>
                 
         </div>
        </div>
    </div>
    </div>
  </div>
  
   
 
</header>
   
   <div class="">
      <nav class="navbar navbar-expand-lg navbar-light azul-fuerte" >
  <a   id="logo-small" class="navbar-brand text-white " href="{{url('/')}}"><img width="50px" src="{{asset('img/brand.png')}}" alt="Logo"></a>
   <a  class="navbar-brand text-white nav-hidden" href="{{url('/')}}"><img width="80px" src="{{asset('img/logorect.png')}}" alt="Logo"></a>
  
   <a href="{{url('escuchar')}} " class="escuchanos" target="_blank">
   <div class="d-flex">
     <div >   <i style="font-size: 1.5rem; color: red; padding-right: 5px;" class="far fa-play-circle ml-3"></i></div>
     <div class="align-self-center">  <small class="text-white font-weight-bold escuchanos">Escúchanos </small></div>
   </div>
   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    
    <span class="mr-1 text-white font-weight-bold" >MENU</span><i class="far fa-bars text-white" style="font-size: 1rem;"></i>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
    <ul class="navbar-nav" style="font-size: 1rem;">
      <li class="nav-item buscador" style="display: none;">
       
  <div class="form-row align-items-center">
    <div class="col-auto">
      <form action="{{url('buscar')}}" method="get">
       
      <input required type="text" name="buscar" class="form-control mb-2" id="inlineFormInput" placeholder="Buscar nota">
    </div>
     
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </div>
   </form>
    
  </div>

      </li>
      <li class="nav-item active nav-link-hover">
        <a class="nav-link text-white mr-3" href="{{url('/')}}">Inicio <span class="sr-only">(current)</span></a>
      </li>
    <li class="nav-item dropdown nav-link-hover">
        <a  class="nav-link dropdown-toggle text-white  mr-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Noticias <span >ABC</span>
        </a>
        <div class="dropdown-menu nav-link-hover" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{url('locales')}}">Locales</a>
           <a class="dropdown-item" href="{{url('departamentales')}}">Departamentales</a>
          <a class="dropdown-item" href="{{url('nacionales')}}">Nacionales</a>
         
           <a class="dropdown-item" href="{{url('internacionales')}}">Internacionales</a>

        </div>
      </li>
      <li class="nav-item nav-link-hover">
        <a class="nav-link text-white mr-3" href="{{url('abctv')}}">ABCtv</a>
      </li>
         <li class="nav-item">
        <a  class="nav-link text-white  mr-3 nav-link-hover" href="{{url('empleos')}}"><span >Empleos</span></a>
      </li>
         <li class="nav-item nav-link-hover">
        <a class="nav-link text-white mr-3" href="{{url('nosotros')}}">Nosotros</a>
      </li>
         <li class="nav-item text-white nav-link-hover">
        <a class="nav-link text-white mr-3" href="{{url('contactanos')}}">Contáctanos</a>
      </li>
       
     <li class="nav-item mt-2 escuchanos-nav text-center"> 
      <a target="_blank" href="{{url('escuchar')}}"><i style="font-size: 1rem; color: red; padding-right: 5px;" class="far fa-play-circle ml-3"></i><small class="text-white">Escúchanos</small></a>
                     <small class="mt-1 ml-1 text-primary digital-clock">Nic</small>
     </li>
     <li class="nav-hidden">
          <button id="boton" type="button" class="btn btn-link"> <i class="far fa-search text-white mt-1 ml-2" style="font-size: 20px;"></i></button>
         
           
           <div id="formulario" class="d-none" style="position: absolute;">
                    

                    <form action="{{url('buscar')}}" method="get" >
       <div class="row">
         <div class="col-xs-6"> <input required type="text" name="buscar" class="form-control mb-2" id="inlineFormInput" placeholder="Buscar "></div>
         <div class="col-xs-6"> <button type="submit" class="btn btn-primary mb-2">Buscar</button></div>
       </div>
     
      
       </form>    
    </div>
     
    <script>
      var boton = document.getElementById('boton');
      var element = document.getElementById('formulario');
      boton.addEventListener('click',function(){
         
         
         element.classList.toggle("d-block");
      });
    </script>
     
   
   
         
     </li>
     
    </ul>
  </div>
</nav>
 

   </div>
  
 