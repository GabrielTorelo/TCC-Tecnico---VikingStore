$('.message a').click(function(){
   $('#login-register').animate({height: "toggle", opacity: "toggle"}, "slow");
});
function Escorder(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }