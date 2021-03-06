/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myAbout() {
    document.getElementById("about").classList.toggle("aboutshow");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.aboutbtn')) {

    var dropdowns = document.getElementsByClassName("about-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('aboutshow')) {
        openDropdown.classList.remove('aboutshow');
      }
    }
  }
}

function myServices() {
    document.getElementById("services").classList.toggle("servicesshow");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.servicesbtn')) {

    var dropdowns = document.getElementsByClassName("services-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('servicesshow')) {
        openDropdown.classList.remove('servicesshow');
      }
    }
  }
}

function myFacilities() {
    document.getElementById("facilities").classList.toggle("facilitiesshow");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.facilitiesbtn')) {

    var dropdowns = document.getElementsByClassName("facilities-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('facilitiesshow')) {
        openDropdown.classList.remove('facilitiesshow');
      }
    }
  }
}


$(function(){
  $("#slideshow > div:gt(0)").hide();

  setInterval(function() {
    $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
  },  3000);
});


// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() {
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
