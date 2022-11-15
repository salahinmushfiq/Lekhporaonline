
@extends('structures.parent_admin_dashboard')
    
    
<head>
    
      <style>@section('admin_structure_styles')




          
         
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
@stop</style>  


    
    <title>Lekhapora Online</title>



</head>


@section('header_skeleten')
 <header class="header">
      @section('header_skeleten')
    <div class="header__search">Add Ads</div>
      @stop
        <div class="c-header-icon logout"><a href="/logout"><i class="fa fa-power-off"></i></a></div>
  </header>
@stop    
@section('side_nav_skeleten')
@include('partials.side_nav')
@stop
@section('main')
<main class="main">
<div class="row" style="padding:0;margin:0;">
<div class="col-md-12" >
    <div class="card" style="background-color:transparent;">
        <div class="card-body">

            <form method="post" action="/admin/add/ad" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-row form-group col-md-12">
                    <div class="form-group col-md-12">
                        <label id="Err_ad_title" for="ad_title" >Ad Title</label>

                        <input type="text" id="ad_title" name="ad_title" style="border-radius: 15px" class="form-control" placeholder="Enter Tour Title"  required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label id="Err_ad_description" for="ad_description" >Ad Description</label>

                    <input type="text" style="border-radius: 15px" id="ad_description" name="ad_description" class="form-control"  placeholder="Enter Ad Description" >
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label id="Err_ad_banner_file" for="ad_banner_file">Ad File</label>

                        <input type="file" style="border-radius: 15px" id="ad_banner_file" class="form-control" name="ad_banner_file" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label id="Err_ad_slot_no" for="ad_slot_no" style="padding-left: 12px;">Slot No.</label> 
                        <input type="text" style="border-radius: 15px" id="ad_slot_no"  name="ad_slot_no" class="form-control" placeholder="Slot 1(left),2(top right),3(bottom:right)" required>
                    </div>
                </div>


                <div class="row col-md-12">

                    <div class="form-group col-md-4">
                        <label id="Err_ad_date" for="date" style="padding-left: 12px;">Date</label> 
                        <input type="text" style="border-radius: 15px" id="adDate"  name="ad_date" class="form-control" placeholder="Date(ex:14)" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label id="Err_ad_month" for="ad_month" style="padding-left: 12px;">Month</label> 
                        <input type="text" style="border-radius: 15px" id="ad_month" name="ad_month"   class="form-control" placeholder="Month(ex:02 or 10)" required>
                    </div>
                    <div class="form-group col-md-4">
                         <label id="Err_ad_year" for="ad_year" style="padding-left: 12px;">Year</label>            
                        <input type="text" style="border-radius: 15px" id="ad_year" name="ad_year"   class="form-control"  placeholder="Year(ex:2012)" required>
                    </div>
                </div>
                <div class="row col-md-12">
                <div class="form-group col-md-4 " >
                    <label id="Err_payment_amount" for="payment_amount">Payment Amount</label>
        
                    <input type="number"  style="border-radius: 15px" id="payment_amount" name="payment_amount" step="1" class="form-control" placeholder="Enter Payment Amount" required>
                </div>
                <div class="form-group col-md-4 " >
                    <label id="Err_ad_duration" for="ad_duration_day">Days(Duration)</label>
                    <input type="number"  style="border-radius: 15px" id="ad_duration_day" name="ad_duration_day" step="1" class="form-control" placeholder="Enter Number of Days" required>
                </div>
               <div class="form-group col-md-4 " >
                    <label id="Err_ad_duration" for="ad_duration_day">Seconds(Duration)</label>
                    <input type="number"  style="border-radius: 15px" id="ad_duration_sec" name="ad_duration_sec" step="1" class="form-control" placeholder="Enter Number of Days" required>
                </div>
                </div>
                <br>
                <!--<div class="card-header">-->
                <!--    <div class="card-title">Add Images</div>-->
                <!--</div>-->
                <!--<br>-->

                <!--<div class="row" style="margin-left:1px;">-->
                <!--    <div class="col-md-4" style="margin-right:20px;">-->
                <!--        @csrf-->
                <!--         <input input type="file" name="thumbnail" class="custom-file-input">-->
                <!--        <label class="custom-file-label" id="Err_Thumbnail" for="thumbnail">Thumbnail</label>-->
                <!--        <progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--    </div>-->
                <!--    <div class="col-md-2" style="margin-right:20px;">-->
                <!--        </div>-->
                <!--    <div class="col-md-4">-->
                <!--       @csrf-->
                <!--            <input type="file" name="hdImage" class="custom-file-input">-->
                <!--            <label class="custom-file-label" id="Err_Hd_Image" for="hdImage">HD Image</label>-->
                <!--            <progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--     </div>-->
                <!--</div>    -->

                <!--<br><br>-->
                <!-- <div class="custom-file col-md-4">-->
                <!--     @csrf-->
                <!--    <input type="file" name="featureImage1" class="custom-file-input">-->
                <!--    <label class="custom-file-label" id="Err_Feature_Image1" for="featureImage1">Feature Image 1</label>-->
                <!--    <progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--</div>-->
                <!--<label id="Err_hdImage1" for="featureImage1">Feature Image 1</label>-->
                <!--<progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--<input type="file" name="featureImage1">-->
                <!--<br><br>-->
                <!--<div class="custom-file col-md-4">-->
                <!--    @csrf-->
                <!--    <input type="file" name="featureImage2" class="custom-file-input">-->
                <!--    <label class="custom-file-label" id="Err_Feature_Image2" for="featureImage2">Feature Image 2</label>-->
                <!--    <progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--</div>-->
                <!--<label id="Err_hdImage2" for="featureImage2">Feature Image 2</label>-->
                <!--<progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--<input type="file" name="featureImage2">-->
                <!--<br><br>-->
                <!--<div class="custom-file col-md-4">-->
                <!--    @csrf-->
                <!--    <input type="file" name="featureImage3" class="custom-file-input">-->
                <!--    <label class="custom-file-label" id="Err_Feature_Image3" for="featureImage3">Feature Image 3</label>-->
                <!--    <progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--</div>-->
                <!--<label id="Err_hdImage3" for="featureImage3">Feature Image 3</label>-->
                <!--<progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--<input type="file" name="featureImage3">-->
                <!--<br><br>-->
                <!--<div class="custom-file col-md-4">-->
                <!--    @csrf-->
                <!--    <input type="file" name="featureImage4" class="custom-file-input">-->
                <!--    <label class="custom-file-label" id="Err_Feature_Image4" for="featureImage4">Feature Image 4</label>-->
                <!--    <progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--</div>-->
                <!--<label id="Err_hdImage4" for="featureImage4">Feature Image 4</label>-->
                <!--<progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--<input type="file" name="featureImage4">-->
                <!--<br><br>-->
                <!--<div class="custom-file col-md-4">-->
                <!--    @csrf-->
                <!--    <input type="file" name="featureImage5" class="custom-file-input">-->
                <!--    <label class="custom-file-label" id="Err_Feature_Image5" for="featureImage5">Feature Image 5</label>-->
                <!--    <progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--</div>-->
                <!--<label id="Err_hdImage5" for="featureImage5">Feature Image 5</label>-->
                <!--<progress value="0" max="100" id="uploader" >0%</progress>-->
                <!--<input type="file" name="featureImage5">-->
                <br><br>

               
                <input style="float:right;" id="fileBtn" type="submit"  class="btn btn-success mt-5"  value="Submit"/>

            </form>
        </div>





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

    
