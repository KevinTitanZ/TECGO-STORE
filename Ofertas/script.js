document.addEventListener("DOMContentLoaded", function() {
    const detailsButtons = document.querySelectorAll(".details-button");
    const modal = document.getElementById("product-details");
    const span = document.getElementsByClassName("close-button")[0];

    const productName = document.getElementById("product-name");
    const productDescription = document.getElementById("product-description");
    const productPrice = document.getElementById("product-price");

    detailsButtons.forEach(button => {
        button.addEventListener("click", function() {
            const name = this.getAttribute("data-name");
            const description = this.getAttribute("data-description");
            const price = this.getAttribute("data-price");

            productName.textContent = name;
            productDescription.textContent = description;
            productPrice.textContent = price;

            modal.style.display = "block";
        });
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
