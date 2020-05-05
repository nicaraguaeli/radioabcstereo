<header class="header azul-medio">
  <div class="container-fluid text-center">
  <div class="row align-items-center" style="min-height: 90px;">
    <div class="col-lg-3 " ><a href="{{url('/')}}"><img width="120px" src="{{asset('img/brand.png')}}" alt="Logo"></a></div>
     <div class="col-lg-3">
       <div class="row flex-column">
         <div class="col-xs-6">
          <div>
             <span class="text-white font-weight-bold" style='font-family: "Trebuchet MS", Helvetica, sans-serif !important; font-size: 3rem;'>RADIO</span>
          </div>
          
         </div>
         <div class="col-xs-6">
          <div style="transform: translateY(-20px);">
            <span style='font-family: "Trebuchet MS", Helvetica, sans-serif !important;' class="text-white">ABC STEREO 99.7FM - 102.1FM</span>
          </div>
           
         </div>
       </div>
      
     </div>
      <div class="col-lg-3" >
        
        <a href="{{url('escuchar')}}">
        <div class="row align-items-center ml-3" style="max-width: 7rem; height: 100%; justify-content: right;">
          <div class="col-xs-1"> <div ><i  style="font-size: 1.5rem;  padding-right: 5px;" class="far fa-play-circle"></i>
 
                  </div></div>
           <div class="col-xs-11 text-white ">  <div style="line-height: 10px; font-weight: bold; font-size: 10px;">
                      ESCÚCHANOS <br>
                      EN VIVO
                      </div></div>
        </div>
          </a>

      </div>
       <div class="col-lg-3" >
        
        <div class="row flex-column">
          <div class="col-5"> <div class="d-flex"><div class="digital-clock" style="max-width: 200px;"></div><small class="mt-1 ml-1 text-primary"> Nicaragua</small></div></div>
          <div class="col-5"> <div class="d-flex justify-content-between " style="width: 112px;">
            <a  style="padding-right: 5px;" target="_blank" href="https://www.facebook.com/radioabcesteli/?fref=ts"> <i class="fab fa-facebook-f" style="font-size: 16px;"></i></a>
             <a style="padding-right: 5px;" target="_blank" href="https://twitter.com/radioabcesteli"> <i class="fab fa-twitter" style="font-size: 16px;"></i></a>
                  <a style="padding-right: 5px;" target="_blank" href="https://www.instagram.com/radioabcesteli/"> <i class="fab fa-instagram" style="font-size: 16px;"></i></a>
                   <a target="_blank" href="https://www.youtube.com/channel/UC4jgoYzXPyiQ-JejLctLtlA"> <i class="fab fa-youtube" style="font-size: 16px;"></i></a>
                 
         </div></div>
          <div class="col-5">
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
          
        </div>
        
        

       </div>
  </div>
</div>
</header>
   
   <div class="">
      <nav class="navbar navbar-expand-lg navbar-light azul-fuerte" >
  <a   id="logo-small" class="navbar-brand text-white " href="{{url('/')}}"><img width="50px" src="{{asset('img/brand.png')}}" alt="Logo"></a>
   <a   id="logo-rect" class="navbar-brand text-white " href="{{url('/')}}"><img width="80px" src="{{asset('img/logorect.png')}}" alt="Logo"></a>
  
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
          <a class="dropdown-item" href="{{url('nacionales')}}">Nacionales</a>
          <a class="dropdown-item" href="{{url('departamentales')}}">Departamentales</a>
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
       <li class=" nav-item hide-element mt-2 " > 
        
            <a style="padding-right: 5px;" target="_blank" href="https://www.facebook.com/radioabcesteli/?fref=ts"> <i class="fab fa-facebook-f" style="font-size: 16px;"></i></a>
             <a style="padding-right: 5px;" target="_blank" href="https://twitter.com/radioabcesteli"> <i class="fab fa-twitter" style="font-size: 16px;"></i></a>
                  <a style="padding-right: 5px;" target="_blank" href="https://www.instagram.com/radioabcesteli/"> <i class="fab fa-instagram" style="font-size: 16px;"></i></a>
                   <a target="_blank" href="https://www.youtube.com/channel/UC4jgoYzXPyiQ-JejLctLtlA"> <i class="fab fa-youtube" style="font-size: 16px;"></i></a>
                    
                 
        
     </li>
     <li class="nav-item mt-2 escuchanos-nav text-center"> 
      <a target="_blank" href="{{url('escuchar')}}"><i style="font-size: 1rem; color: red; padding-right: 5px;" class="far fa-play-circle ml-3"></i><small class="text-white">Escúchanos</small></a>
                     <small class="mt-1 ml-1 text-primary digital-clock">Nic</small>
     </li>
     
     
    </ul>
  </div>
</nav>
 

   </div>
  
 