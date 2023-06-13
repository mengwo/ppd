 //link loader
 
 // Load the initially selected link when the page loads or set the default as 'dashboard'
// Load the initially selected link when the page loads or set the default as 'dashboard'
$(document).ready(function () {
    var selectedLink = localStorage.getItem('selectedLink') || 'dashboard';
    showContent(selectedLink);
});

function showContent(link) {
    // Save the selected link in local storage
    localStorage.setItem('selectedLink', link);

    // Determine the path of the content based on the current URL and link
    var currentURL = window.location.href;
    var basePath = currentURL.substring(0, currentURL.lastIndexOf('/'));
    var contentPath = basePath + '/router/' + link + '/index.php';

    // Load the content from the corresponding path
    $('#contentContainer').load(contentPath);
}


/////////////////////////////////////////////////////////////

//button active

const linkButtons = document.querySelectorAll('.btn-link');
const activeLinkIdKey = 'activeLinkId';

// Function to handle click and add active class
function handleClick(event) {
  // Remove active class from all link buttons
  linkButtons.forEach(button => button.classList.remove('active-link'));

  // Add active class to the clicked link button
  event.currentTarget.classList.add('active-link');

  // Remove the active class after the animation completes
  setTimeout(() => {
    event.currentTarget.classList.remove('active-link');
  }, 1000); // Adjust the duration (in milliseconds) to match the animation duration in CSS

  // Save the ID of the active link in local storage
  const activeLinkId = event.currentTarget.id;
  localStorage.setItem(activeLinkIdKey, activeLinkId);
}

// Retrieve the active link ID from local storage
const activeLinkId = localStorage.getItem(activeLinkIdKey);

// If an active link ID exists in local storage, add the active-link class to the corresponding button
if (activeLinkId) {
  const activeLinkButton = document.getElementById(activeLinkId);
  if (activeLinkButton) {
    activeLinkButton.classList.add('active-link');
  }
}

// Attach click event listener to each link button
linkButtons.forEach(button => {
  button.addEventListener('click', handleClick);
});





