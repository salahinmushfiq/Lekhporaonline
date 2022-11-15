
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
    <div class="header__search">Verify Admins</div>
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
<td>Email</td>
<td>Role</td>
<td>Last Updated</td>
<td>Verify</td>
<td>Remove</td>
</tr>
@foreach ($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->email }}</td>
@if($user->role==0)<td style="color:grey;font-weight: 900;">Unverified</td>@else<td style="color:green;font-weight: 900;">Verified</td>@endif
<td>{{ $user->updated_at }}</td>
<td><button class="btn btn-success">Verify</button></td>
<td><button class="btn btn-danger">Remove</button></td>    
</tr>
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

    
