
  $(document).ready(function ($) {

    $('#menuToggle').click(function (e) {
      var $parent = $(this).parent('.menu');
      $parent.toggleClass("open");
      var navState = $parent.hasClass('open') ? "hide" : "show";    
      setTimeout(function () {
        
        $('#menuToggle > span').toggleClass("navClosed").toggleClass("navOpen");
      }, 500);
      e.preventDefault();
    });

    $('.searchinp').on('focus', function(){
      $('.reset').css({ 'display' : 'block',
        'background' : 'transparent'})

    })
   
    $('.reset').click(function(e){
    e.preventDefault();
    $(this).parents('form').find('input').val('');
  });
 //  $('.arrow1').on('click', function(){
 //        $('.texthide1').toggleClass('act');
 //        $(this).find('.svgbutton1').toggleClass('act')
 //      })

 // $('.arrow').on('click', function(){
 //        $('.texthide').toggleClass('act');
 //        $(this).find('.svgbutton').toggleClass('act')
 //      })

$('.dropdown-toggle').dropdown()

$('.arrow').on('click', function(e){
      $(this).prev('.texthide').toggleClass('act')
        $(this).find('.svgbutton').toggleClass('act')
      })
 
$('.dropdown-toggle').dropdown()

$('.carousel-indicators li:first-child').addClass('active');
$('.carousel-inner .carousel-item:first-child').addClass('active');

    $(window).scroll(function(event) {
        if($(this).scrollTop()> 20) {
         $('#up').fadeIn(500)
     } else{
         $('#up').fadeOut(500)
     }
     });
     
      $('#up').click(function(event) {
         
          $("html, body").animate({
                 scrollTop: 0
             }, 50);
     
      });
 
  });
            