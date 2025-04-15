const productName = document.querySelector("#name");
const slug = document.querySelector("#slug");

productName.addEventListener("change", function () {
    fetch("/dashboard/brand/checkSlug?name=" + name.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});
