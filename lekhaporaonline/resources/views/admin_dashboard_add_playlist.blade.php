
@extends('structures.parent_admin_dashboard')
    
    
<head>

<style>    
 @section('admin_structure_styles')         
input, textarea, select, option{
  background: none !important;
  border-top: #FFCC33 1px solid !important;
  border-left: #FFCC33 1px solid !important;
  border-bottom: #FFCC33 3px solid !important;
  border-right: #FFCC33 3px solid !important;

  color: #FFCC33 !important;
}
label{
   color: #FFCC33 !important;           
}
@stop     
</style>  
    
    
    
    <title>Lekhapora Online</title>



</head>

@section('header_skeleten')
 <header class="header">
      @section('header_skeleten')
    <div class="header__search">Add Playlist</div>
      @stop
        <div class="c-header-icon logout"><a href="/logout"><i class="fa fa-power-off"></i></a></div>
  </header>
@stop    
@section('side_nav_skeleten')
@include('partials.side_nav')
@stop
@section('main')
  <main class="main">
  <div class="col-md-12" >
    <div class="card" style="background-color:transparent;">
        
        <div class="card-body">

            <form method="post" action="/Add_ads" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-row form-group col-md-12">
                    <div class="form-group col-md-12">
                        <label id="Err_hotel_name" for="tourTitle" >Title</label>

                        <input type="text" id="tourTitle" name="tourTitle" style="border-radius: 15px" class="form-control" placeholder="Enter Tour Title" name="name" required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label id="Err_hotel_description" for="tourShortDescription" >Description</label>

                    <input type="text" style="border-radius: 15px" id="tourShortDescription" name="tourShortDescription" class="form-control"  placeholder="Enter Tour Description" name="description" required>
                </div>
                <div class="form-group col-md-12">
                    <label id="Err_hotel_address" for="tourAddress">url</label>

                    <input type="text" style="border-radius: 15px" id="playlistUrl" class="form-control" name="playlistUrl" placeholder="Enter Playlist" required>
                </div>

                <br><br>

               
                <input style="float:right;" id="fileBtn" type="submit"  class="btn btn-success mt-5"  value="Submit"/>

            </form>
        </div>





    </div>
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

    
