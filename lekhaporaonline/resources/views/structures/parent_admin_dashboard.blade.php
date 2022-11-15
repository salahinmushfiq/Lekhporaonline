<!DOCTYPE html>
<php translate="no" lang="en">
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" charset="utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="jquery.ripples.js"></script>-->
     <!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<!--     <link rel="stylesheet" href="style1.css"/>-->
    <link rel="shortcut icon" href="images/lekhaporaonlinelogo.png" />
    <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
  rel="stylesheet"
/>
    
    <title>Lekhapora Online</title>
    <style>
        body {
  margin: 0;
  padding: 0;
  color: #fff;
  font-family: 'Open Sans', Helvetica, sans-serif;
  box-sizing: border-box;
}

/* Assign grid instructions to our parent grid container, mobile-first (hide the sidenav) */
.grid-container {
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: 50px 1fr 50px;
  grid-template-areas:
    'header'
    'main'
    'footer';
  height: 100vh;
}

.menu-icon {
  position: fixed; /* Needs to stay visible for all mobile scrolling */
  display: flex;
  top: 5px;
  left: 10px;
  align-items: center;
  justify-content: center;
  background-color: #DADAE3;
  border-radius: 50%;
  z-index: 1;
  cursor: pointer;
  padding: 12px;
}

/* Give every child element its grid name */
.header {
  grid-area: header;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 16px;
  background-color: #484848;
}

/* Make room for the menu icon on mobile */
.header__search {
  margin-left: 42px;
}

.sidenav {
  grid-area: sidenav;
  display: flex;
  flex-direction: column;
  height: 100%;
  width: 240px;
  position: fixed;
  overflow-y: auto;
  transform: translateX(-245px);
  transition: all .6s ease-in-out;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
  z-index: 2; /* Needs to sit above the hamburger menu icon */
  background-color: #394263;
}

.sidenav.active {
  transform: translateX(0);
}

.sidenav__close-icon {
  position: absolute;
  visibility: visible;
  top: 8px;
  right: 12px;
  cursor: pointer;
  font-size: 20px;
  color: #ddd;
}

.sidenav__list {
  padding: 0;
  margin-top: 85px;
  list-style-type: none;
}

.sidenav__list-item {
  padding: 20px 20px 20px 40px;
  color: #ddd;
}

.sidenav__list-item:hover {
  background-color: rgba(255, 255, 255, 0.2);
  cursor: pointer;
}

.main {
  grid-area: main;
  background-color: #222322;
    
}

.main-header {
  display: flex;
  justify-content: space-between;
  margin: 20px;
  padding: 20px;
  height: 150px;
  background-color: #484848;
  color: slategray;
}
.footer {
  grid-area: footer;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  padding: 0 16px;
  background-color: #484848;
}

/* Non-mobile styles, 750px breakpoint */
@media only screen and (min-width: 46.875em) {
  /* Show the sidenav */
  .grid-container {
    grid-template-columns: 240px 1fr;
    grid-template-areas:
      "sidenav header"
      "sidenav main"
      "sidenav footer";
  }

  .header__search {
    margin-left: 0;
  }

  .sidenav {
    position: relative;
    transform: translateX(0);
  }

  .sidenav__close-icon {
    visibility: hidden;
  }
}

/* Medium screens breakpoint (1050px) */
@media only screen and (min-width: 65.625em) {
  /* Break out main cards into two columns */
  .main-cards {
    column-count: 2;
  }
}
@yield('admin_structure_styles')

    </style>
    

</head>
<body>
    <div class="grid-container">
   <div class="menu-icon">
    <i class="fas fa-bars header__menu"></i>
  </div>
   
   <header class="header">
      
      @yield('header_skeleten') 
      
        <div class="c-header-icon logout"><a href="/logout"><i class="fa fa-power-off"></i></a></div>
  </header>
   
<!--
  <aside class="sidenav">
    <div class="sidenav__close-icon">
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>
    <ul class="sidenav__list">
      <li class="sidenav__list-item">Item One</li>
      <li class="sidenav__list-item">Item Two</li>
      <li class="sidenav__list-item">Item Three</li>
      <li class="sidenav__list-item">Item Four</li>
      <li class="sidenav__list-item">Item Five</li>
    </ul>
  </aside>
-->
@yield('side_nav_skeleten')
    
@yield('main')


  <footer class="footer">
<!--    <div class="footer__copyright">&copy;2022</div>-->
    <div class="footer__signature">&copy; Ngsoftworks</div>
  </footer>
@yield('scripts')
</div>
    
</body>    

