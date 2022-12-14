
@extends('structures.parent_admin_dashboard')
    
    
<head>
    <style>
        
@section('admin_structure_styles')


.main-overview {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(265px, 1fr));
  grid-auto-rows: 94px;
  grid-gap: 20px;
  margin: 20px;
}

.overviewcard {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background-color: #d3d3;
}

.main-cards {
  column-count: 1;
  column-gap: 20px;
  margin: 20px;
}

.card {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  background-color: #82bef6;
  margin-bottom: 20px;
  -webkit-column-break-inside: avoid;
  padding: 24px;
  box-sizing: border-box;
}

/* Force varying heights to simulate dynamic content */
.card:first-child {
  height: 485px;
}

.card:nth-child(2) {
  height: 200px;
}

.card:nth-child(3) {
  height: 265px;
}



/* Medium screens breakpoint (1050px) */
@media only screen and (min-width: 65.625em) {
  /* Break out main cards into two columns */
  .main-cards {
    column-count: 2;
  }
}
        @stop
    </style>  
    

    
    <title>Lekhapora Online</title>



</head>

@section('header_skeleten')
<header class="header">
      @section('header_skeleten')
    <div class="header__search">Dashboard</div>
      @stop
        <div class="c-header-icon logout"><a href="/logout"><i class="fa fa-power-off"></i></a></div>
  </header>
@stop    
@section('side_nav_skeleten')
@include('partials.side_nav')
@stop
@section('main')
  <main class="main">
    <div class="main-header">
      <div class="main-header__heading">Dashboard</div>
      <div class="main-header__updates">Logout</div>
    </div>

    <div class="main-overview">
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
    </div>

    <div class="main-cards">
      <div class="card">Card</div>
      <div class="card">Card</div>
      <div class="card">Card</div>
    </div>
  </main>
@stop
@section('scripts')
    <script>
    const menuIconEl = $('.menu-icon');
const sidenavEl = $('.sidenav');
const sidenavCloseEl = $('.sidenav__close-icon');

// Add and remove provided class names
function toggleClassName(el, className) {
  if (el.hasClass(className)) {
    el.removeClass(className);
  } else {
    el.addClass(className);
  }
}

// Open the side nav on click
menuIconEl.on('click', function() {
  toggleClassName(sidenavEl, 'active');
});

// Close the side nav on click
sidenavCloseEl.on('click', function() {
  toggleClassName(sidenavEl, 'active');
});
    </script>
@stop    

    
