function showImage(imgSrc, imgElementId) {
    var imgElement = document.getElementById(imgElementId);
    imgElement.src = imgSrc;
}

document.getElementById('personnage1').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var imageUrl = selectedOption.getAttribute('data-img');
    document.getElementById('image1').src = imageUrl;
});

document.getElementById('personnage2').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var imageUrl = selectedOption.getAttribute('data-img');
    document.getElementById('image2').src = imageUrl;
});

