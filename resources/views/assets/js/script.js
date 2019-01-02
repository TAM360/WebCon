
$(document).ready(function ( ){ 
    
    $("p.ourstoryp").text(function(index, currentText) {
        return currentText.substr(0, 350);
    });
    
    $('#myCarouselproduct').carousel({
        interval: false
    }); 
    
    $(".indicator-next").click(function(){
        $("#myCarouselproduct").carousel("next");
    });
    
    $(".indicator-prev").click(function(){
        $("#myCarouselproduct").carousel("prev");
    });
   
    $("#myCarouselproduct").on('slide.bs.carousel', function () {
        /* $('#myCarouselproduct').fadeOut();*/
    });
    
   $("#myCarouselproduct").on('slid.bs.carousel', function () {
       if($('.last').hasClass('active'))
       {
           $('#first').addClass('first');
       }
       else{
           $('#first').removeClass('first');
       }
      /* $('#myCarouselproduct').fadeIn();*/
    });
    
    $('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
    var val = $(this).attr('data-value');
    //alert(val);
    $(this).parent().find('#radio-value').val(val);
    });
    
    $('.radio-group .radios').click(function(){
    $(this).parent().find('.radios').removeClass('selected');
    $(this).addClass('selected');
    var val = $(this).attr('data-value');
    //alert(val);
    $(this).parent().find('#radios-value').val(val);
    });
    
    $('.qminus').click(function(){
        var val = parseInt($('.qnum').text());
        console.log(val);
        if(val>1)
            val=val-1;
        $('.qnum').text(val);
        $("#q-value").val(val);
    });
    
    $('.qplus').click(function(){
        var val = parseInt($('.qnum').text());
            val=val+1;
        $('.qnum').text(val);
        $("#q-value").val(val);
    });
    
    $('.checkmark').click(function(){
        var check =  parseInt($("#check").val());
        if(check === 1)
        {
            $('.fa-check').css('display','none');
            $("#check").val(0);
        }
        else{
            $('.fa-check').css('display','block');
            $("#check").val(1);
        }
    });
});