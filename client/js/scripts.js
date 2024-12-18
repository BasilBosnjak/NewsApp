/*!
* Start Bootstrap - Simple Sidebar v6.0.6 (https://startbootstrap.com/template/simple-sidebar)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
*/
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

window.addEventListener('hashchange', function() {
  var view = window.location.hash; // Get the current view
  var button = document.getElementById('addArticleButton'); // Get the button

//   if (view === 'admin.html') {
//     // If the current view is the one where you want to show the button,
//     // remove the 'hidden' class from the button
//     button.classList.remove('hidden');
//   } else {
//     // If the current view is not the one where you want to show the button,
//     // add the 'hidden' class to the button
//     button.classList.add('hidden');
//   }
});

    // Submit article form
function submitForm() {
    var title = document.getElementById('articleTitle').value;
    var imageUrl = document.getElementById('articleImage').value;
    var summary = document.getElementById('articleSummary').value;
    var text = document.getElementById('articleText').value;

    var data = {
        title: title,
        imageUrl: imageUrl,
        summary: summary,
        text: text
    };

    fetch('http://localhost/NewsApp/Backend/add_article.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch((error) => {
        console.error('Error:', error);
    });
}

});
