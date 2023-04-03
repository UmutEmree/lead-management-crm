<div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 <a href="http://infinitumagency.com" target="_blank">Infinitum Agency</a> All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
        ============================================ -->
    <script src="{{ asset('public/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ asset('public/js/wow.min.js') }}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ asset('public/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('public/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('public/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="{{ asset('public/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('public/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('public/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ asset('public/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- jvectormap JS
        ============================================ -->
    <script src="{{ asset('public/js/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('public/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('public/js/jvectormap/jvectormap-active.js') }}"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{ asset('public/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('public/js/sparkline/sparkline-active.js') }}"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{ asset('public/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('public/js/flot/flot-active.js') }}"></script>
    <!-- knob JS
        ============================================ -->
    <script src="{{ asset('public/js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('public/js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('public/js/knob/knob-active.js') }}"></script>
    <!--  wave JS
        ============================================ -->
    <script src="{{ asset('public/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('public/js/wave/wave-active.js') }}"></script>
    <!--  todo JS
        ============================================ -->
    <script src="{{ asset('public/js/todo/jquery.todo.js') }}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('public/js/plugins.js') }}"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="{{ asset('public/js/chat/moment.min.js') }}"></script>
    <script src="{{ asset('public/js/chat/jquery.chat.js') }}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('public/js/main.js') }}"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="{{ asset('public/js/tawk-chat.js') }}"></script>
                              <script>
$(document).ready(function(){

 $('#project_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('admin.autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#project_list').fadeIn();  
                    $('#project_list').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#project_name').val($(this).text());  
        $('#project_list').fadeOut();  
    });  

});
</script>
