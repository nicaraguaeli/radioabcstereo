<header class="header">
  <div class="container-fluid text-center">
  <div class="row">
    <div class="col-lg-3" ><img width="50px" src="{{asset('img/brand.png')}}" alt="Logo"></div>
     <div class="col-lg-3" >
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
      <div class="col-lg-3" >
        
        <div class="row align-items-center" style="max-width: 7rem; height: 100%; justify-content: right;">
          <div class="col-xs-1"> <div ><a target="_blank" href="{{url('escuchar')}}"><i style="font-size: 1.2rem; color: red; padding-right: 5px;" class="far fa-play-circle"></i></a>
 
                  </div></div>
           <div class="col-xs-11 ">  <div style="line-height: 10px; font-weight: bold; font-size: 10px;">
                      ESCÚCHANOS <br>
                      EN VIVO
                      </div></div>
        </div>


      </div>
       <div class="col-lg-3" >
        <div class="row"><div class="digital-clock" style="max-width: 200px;"></div><small class="mt-1 ml-1 text-primary">Nicaragüa</small></div>
         <div class="row">
            <a class="ml-3 " style="padding-right: 5px;" target="_blank" href="https://www.facebook.com/radioabcesteli/?fref=ts"> <i class="fab fa-facebook-f" style="font-size: 16px;"></i></a>
             <a style="padding-right: 5px;" target="_blank" href="https://twitter.com/radioabcesteli"> <i class="fab fa-twitter" style="font-size: 16px;"></i></a>
                  <a style="padding-right: 5px;" target="_blank" href="https://www.instagram.com/radioabcesteli/"> <i class="fab fa-instagram" style="font-size: 16px;"></i></a>
                   <a target="_blank" href="https://www.youtube.com/channel/UC4jgoYzXPyiQ-JejLctLtlA"> <i class="fab fa-youtube" style="font-size: 16px;"></i></a>
                 
         </div>

       </div>
  </div>
</div>
</header>
   
   <div class="">
      <nav class="navbar navbar-expand-lg navbar-light" >
  <a style="display: none;"  id="logo-small" class="navbar-brand text-white " href="{{url('/')}}"><img width="30px" src="{{asset('img/brand.png')}}" alt="Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    
    <i class="far fa-bars text-white" style="font-size: 1.5rem;"></i>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
    <ul class="navbar-nav">
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
      <li class="nav-item active">
        <a class="nav-link text-white mr-3" href="{{url('/')}}">Inicio <span class="sr-only">(current)</span></a>
      </li>
    <li class="nav-item dropdown">
        <a  class="nav-link dropdown-toggle text-white  mr-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Noticias <span >ABC</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{url('local')}}">Local</a>
          <a class="dropdown-item" href="{{url('nacional')}}">Nacional</a>
          <a class="dropdown-item" href="{{url('departamental')}}">Departamental</a>
           <a class="dropdown-item" href="{{url('internacional')}}">Internacional</a>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white mr-3" href="{{url('abctv')}}">ABCtv</a>
      </li>
         <li class="nav-item">
        <a  class="nav-link text-white  mr-3" href="{{url('empleos')}}"><span >Empleos</span></a>
      </li>
         <li class="nav-item">
        <a class="nav-link text-white mr-3" href="{{url('nosotros')}}">Nosotros</a>
      </li>
         <li class="nav-item text-white">
        <a class="nav-link text-white mr-3" href="#">Contactanos</a>
      </li>
       <li class=" nav-item social-network" style="display: none;"> 
        
            <a style="padding-right: 5px;" target="_blank" href="https://www.facebook.com/radioabcesteli/?fref=ts"> <i class="fab fa-facebook-f" style="font-size: 16px;"></i></a>
             <a style="padding-right: 5px;" target="_blank" href="https://twitter.com/radioabcesteli"> <i class="fab fa-twitter" style="font-size: 16px;"></i></a>
                  <a style="padding-right: 5px;" target="_blank" href="https://www.instagram.com/radioabcesteli/"> <i class="fab fa-instagram" style="font-size: 16px;"></i></a>
                   <a target="_blank" href="https://www.youtube.com/channel/UC4jgoYzXPyiQ-JejLctLtlA"> <i class="fab fa-youtube" style="font-size: 16px;"></i></a>
                 
        
     </li>
     <li>
       <div class="social-network">
           <a target="_blank" href="{{url('escuchar')}}"><i style="font-size: 1rem; color: red; padding-right: 5px;" class="far fa-play-circle"></i></a>
       </div>
     </li>
     <li>
      <div class="mt-2 social-network">
          <small class="mt-1 ml-1 text-primary digital-clock">Nic</small>
      </div>
    
     </li>
    </ul>
  </div>
</nav>
 

   </div>
  
 