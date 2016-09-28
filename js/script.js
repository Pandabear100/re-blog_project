window.onload = function() {
    // changing the icon on the navigation on each page
    
    var page = window.location.href; // grabbing current location on website
    var links = document.querySelectorAll('header nav ul li a');

    page = page.slice(59, page.length); // 59 is the number of characters up until the = sign

    for (var i = 0; i < links.length; i++) {
        var href = links[i].href.slice(59, links[i].href.length);

        if (page == href) {

            links[i].classList.add('blue');
        }
        else {

            links[i].classList.remove('blue');
        }
    }

}

function logMessage(message) {

    console.log(message);
}