/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
//    $("#snippet--flashMesagesHomePage").css({'display':'block'});
    $(".toggleComments").live('click',function(){
        var elem = this;
        if($(this).siblings("ul").is(':visible')){
            $(this).siblings("ul").hide(200);
            $(elem).text("Show comments");
        }
        else{
            $(this).siblings("ul").show(200);
            $(elem).text("Hide comments");
        }
        
    });
//            function(){
//                $(this).parent().siblings().children("ul").show(200);
//                $(this).text("Hide comments");
//            },
//            function(){
//                $(this).parent().siblings().children("ul").hide(200);
//                $(this).text("Show comments");
//            });
});

