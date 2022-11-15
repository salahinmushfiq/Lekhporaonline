
@extends('structures.parent_admin_dashboard')
    
    
<head>
 
<style>
@section('admin_structure_styles')
table td{
       font-weight: 700; 
       font-family: "Roboto","Times New Roman", Times, serif;
}    
@stop          
</style>  


    
    <title>Lekhapora Online</title>



</head>

@section('header_skeleten')
<header class="header">
      @section('header_skeleten')
    <div class="header__search">View Ads</div>
      @stop
        <div class="c-header-icon logout"><a href="/logout"><i class="fa fa-power-off"></i></a></div>
  </header>
@stop    
@section('side_nav_skeleten')
@include('partials.side_nav')
@stop
@section('main')
<main class="main">
<table class="table" style="color:#ffd302;">
<tr>
<td>Id</td>
<td>Title</td>
<td>File Name</td>
<td>Slot No.</td>
<td>Payment</td>
<td>Start Date</td>
<td>Duration(D)</td>
<td>Duration(T)</td>    
<!--<td>Verify</td>-->
<td>Remove</td>
</tr>
@foreach ($files as $file)
<tr>
<td>{{ $file->id }}</td>    
<td>{{ $file->ad_title }}</td>
<td>{{ $file->file_name }}</td>
<td>{{ $file->slot_no}}</td>
<td>{{ $file->payment_amount}}</td>
<td>{{ $file->ad_start_date}}</td>
<td>{{ $file->ad_duration_day}} Days</td> 
<td>{{ $file->ad_duration_sec/1000}} Sec</td>     
<!--<td><button class="btn btn-success">Verify</button></td>-->
<td><button class="btn btn-danger">Remove</button></td>    
</tr>


<img src="{{ url('storage/ads/'.$file->file_name) }}" alt="" title="$file->file_name" style="height:100px;width:50px;"/>    
@endforeach
</table>
    

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

    
