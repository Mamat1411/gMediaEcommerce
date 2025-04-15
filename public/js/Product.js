const productName = document.querySelector("#name");
const slug = document.querySelector("#slug");

productName.addEventListener("change", function () {
    fetch("/dashboard/product/checkSlug?name=" + productName.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});

// function previewImage() {
//     const image = document.querySelector('#product_image');
//     const imgPreview = document.querySelector('.img-preview');

//     imgPreview.style.display = 'block';

//     const ofReader = new FileReader();
//     ofReader.readAsDataURL(image.files[0]);
//     ofReader.onload = function (oFREvent) {
//         imgPreview.src = oFREvent.target.result;
//     }
// }
