$(document).ready(function(){
    
    function inputNumbers(event)
    {
        if ( event.keyCode == 190 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || (event.keyCode >=48 && event.keyCode <= 57))
        {
            return;
        }
        else
        {
            
                event.preventDefault(); 
        }
    }
    
    $(".txt, #payrate_1, #payrate_2, #payrate_3, #payrate_4, #payrate_5, #payrate_6, #payrate_7, #payrate_8, #payrate_9, #payrate_10").keydown(function(evt){
        inputNumbers(evt);
    });
    
    
});
