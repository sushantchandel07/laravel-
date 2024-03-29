// profile.js
// JavaScript function to display the selected image
function displaySelectedImage(event) {
    var image = document.getElementById('profileImage');
    image.src = URL.createObjectURL(event.target.files[0]);
}
