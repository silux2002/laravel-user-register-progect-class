<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="" />
    <title>SpinDelivery</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
      integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  </head>
  <body class="sub_page">
    <div class="hero_area">
      <div class="bg-box">
        <img src="{{asset('storage/images/hero-bg.jpg') }}" alt="" />
      </div>

      <!-- header section strats -->
      <header class="header_section">
        <div class="container">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{route('inicio')}}">
              <span> SpinDelivery </span>
            </a>

            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('inicio')}}"
                    >Inicio <span class="sr-only">(current)</span></a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('restaurantes.index') }}"><i class="fa-solid fa-magnifying-glass" style="margin-right:5px;"></i>Restaurantes</a>
                </li>
                 @if (Auth::user()->rol == "restaurante")
                  <li class="nav-item">
                    <a class="nav-link text-info" href="{{ route('Restaurante.showPedidos', $restaurante->id) }}"><i class="fa-solid fa-rectangle-list" style="margin-right:5px;"></i>Tu comanda</a>
                  </li>
                  @endif
              </ul>
              <div class="user_option">
                <a class="cart_link" href="{{route('pedidos.index')}}">
                  <svg
                    version="1.1"
                    id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px"
                    y="0px"
                    viewBox="0 0 456.029 456.029"
                    style="enable-background: new 0 0 456.029 456.029"
                    xml:space="preserve"
                  >
                    <g>
                      <g>
                        <path
                          d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z"
                        />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path
                          d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z"
                        />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path
                          d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z"
                        />
                      </g>
                    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                  </svg>
                </a>
                @guest
                            @if (Route::has('login'))
                                    <a class="nav-link text-dark" style="background-color:lightgreen; border-radius:15px;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                    <a class="nav-link text-dark" style="background-color:lightblue; border-radius:15px;" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                                <a id="navbarDropdown text-info" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <a class="dropdown-item text-darck" style="background-color:yellow; border-radius:15px;" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        @endguest
                        
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- end header section -->
    </div>

    <!-- about section -->
        <section class="food_section layout_padding"> 
      <div class="container"> 
        <div class="heading_container heading_center "> 
          <h2>{{ $restaurante->nombre }}</h2> 
        </div> 
        <div class="filters-content"> 
          <div class="row grid">
             @foreach($platos as $plato)
            <div class="col-sm-6 col-lg-4 all pizza"> 
              <div class="box"> 
                <div> 
                  <div class="img-box"> 
                    <img src="{{ asset($plato->foto) }}" alt="" />
                  </div>
                  @guest
                  @else
                  @if (Auth::user()->id == $restaurante->user_id && Auth::user()->rol == "administrador")
                  <a class="nav-link text-warning" href="{{ route('platos.edit', [$restaurante->id , $plato->id]) }}"><i class="fa-solid fa-screwdriver-wrench" style="margin-right:5px;"></i>Editar plato</a>
                  <a class="nav-link text-danger" href="{{ route('platos.delete', [$restaurante->id , $plato->id]) }}"><i class="fa-solid fa-screwdriver-wrench" style="margin-right:5px;"></i>Eliminar plato</a>
                  @endif
                  @endguest
                  <div class="detail-box"> 
                    <h5>{{ $plato->nombre }}</h5> 
                    <p>{{ $plato->descripcion }}</p> 
                    <div class="options"> 
                      <h6>{{ $plato->precio }}€</h6>
                      
                      <a href="{{ route('platos.show', [$plato->restaurante->id, $plato->id]) }}"> 
                        <svg 
                          version="1.1" 
                          id="Capa_1" 
                          xmlns="http://www.w3.org/2000/svg" 
                          xmlns:xlink="http://www.w3.org/1999/xlink" 
                          x="0px" 
                          y="0px" 
                          viewBox="0 0 456.029 456.029" 
                          style="enable-background: new 0 0 456.029 456.029" 
                          xml:space="preserve" 
                        > 
                          <g> 
                            <g> 
                              <path 
                                d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248 
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" 
                              /> 
                            </g> 
                          </g> 
                          <g> 
                            <g> 
                              <path 
                                d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48 
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064 
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4 
                         C457.728,97.71,450.56,86.958,439.296,84.91z" 
                              /> 
                            </g> 
                          </g> 
                          <g> 
                            <g> 
                              <path 
                                d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296 
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" 
                              /> 
                            </g> 
                          </g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                          <g></g> 
                        </svg> 
                      </a> 
                    </div> 
                  </div> 
                </div> 
              </div> 
            </div>
            @endforeach
            @if (Auth::user()->id == $restaurante->user_id && Auth::user()->rol == "administrador")
                <a class="nav-link text-dark text-center lead font-weight-bold my-2" style="background-color:lightblue; border-radius:15px;" href="{{ route('platos.create', [$restaurante->id , $plato->id]) }}">Crear Plato</a>
            @endif
          </div> 
        </div> 
      </div> 
    </section>

    <!-- end about section -->

    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-col">
            <div class="footer_contact">
              <h4>Contáctanos</h4>
              <div class="contact_link_box">
                <a href="">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span> Localización </span>
                </a>
                <a href="">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span> Llama al 957865413 </span>
                </a>
                <a href="">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span> hola@spindelivery.com </span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 footer-col">
            <div class="footer_detail">
              <a href="" class="footer-logo"> SpinDelivery </a>
              <p>
                Necessary, making this the first true generator on the Internet.
                It uses a dictionary of over 200 Latin words, combined with
              </p>
              <div class="footer_social">
                <a href="">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fab fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fab fa-pinterest" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 footer-col">
            <h4>Descarga la app</h4>
            <p>Apple App Store</p>
            <p>Google Play Store</p>
          </div>
        </div>
        <div class="footer-info">
          <p>&copy; <span id="displayYear"></span> SpinDelivery</p>
        </div>
      </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->
  </body>
</html>
