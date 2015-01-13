    var windowSizeArray = [ "width=550,height=420",
							"width=1000,height=600",
                            "width=300,height=400,scrollbars=yes" ];
 
    $(document).ready(function(){
        $('.newWindow').click(function (event){
 
            var url = $(this).attr("href");
            var windowName = "popUp";//$(this).attr("name");
            var windowSize = windowSizeArray[ $(this).attr("rel") ];
 
            window.open(url, windowName, windowSize);
 
            event.preventDefault();
 
        });
    });




















