
(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 100
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 50
        }
    })

})(jQuery); // End of use strict

/****************** Form selection **********************************/

$(".timeInput").on("mouseenter", "label", function(){
  $(this).addClass("hover");
});
$(".timeInput").on("mouseleave", "label", function(){
  $(this).removeClass("hover");
});

/*******************  Form Validation ************************************/
var classForm = document.querySelector("#classForm");
classForm.noValidate = true;
classForm.addEventListener('submit', function(event) {
    //Prevent submission if checkValidity on the form returns false.
    if (!event.target.checkValidity()) {
        event.preventDefault();
        //Implement you own means of displaying error messages to the user here.
        alert("OPS! Complete o formulário para agendar seu treino!");
    }

}, false);


/*******************  BookClass DatePicker ************************************/
// Allow future dates only
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
if(dd<10){
    dd='0'+dd
}
if(mm<10){
    mm='0'+mm
}
today = yyyy+'-'+mm+'-'+dd;
document.getElementById("dateField").setAttribute("min", today);

/*******************  Email Section ************************************/
var emailForm = document.querySelector("#emailContact");
emailForm.addEventListener("submit", function(){
    alert("Email enviado com sucesso! Você receberá uma notificação por email assim que o nosso App estiver pronto.")
});
var personalForm = document.querySelector("#personalForm");
personalForm.addEventListener("submit", function(){
    alert("Email enviado com sucesso! Você receberá uma notificação por email assim que o nosso App estiver pronto.")
});
var suggestionForm = document.querySelector("#suggestionForm");
suggestionForm.addEventListener("submit", function(){
    alert("Cadastro realizado com sucesso! Você receberá uma notificação por email.")
});
var contactForm = document.querySelector("#contactForm");
contactForm.addEventListener("submit", function(){
    alert("Obrigado por entrar em contato! Você receberá um email da nossa equipe em breve.")
});

// /*******************  Google Analytics ************************************/

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-93065828-1', 'auto');
ga('send', 'pageview');

// /*******************  Facebook Events ************************************/
// document.querySelector("#bookClassButton").addEventListener("click", function(){
//     fbq('track', 'CompleteRegistration');
// });
// document.querySelector("#initBookClass").addEventListener("click", function(){
//     fbq('track', 'Lead');
// });
