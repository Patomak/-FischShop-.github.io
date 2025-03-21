const products1 = [
    { name: "SSG Nessie", image: "images/ssg nessie.png" },
    { name: "SSBS Nessie", image: "images/ssbs Nessie.png" },
    { name: "SSG Ancient Orca", image: "images/SSG Ancient Orca.png" },
    { name: "SSG Kraken", image: "images/SSG Kraken.png" }
];

const products2 = [
    { name: "SSB Pickle", image: "images/SSB Pickle.jpg" },
    { name: "SSGM Phantom Meg", image: "images/SSGM Phantom Meg.png" },
    { name: "Nuclear Megalodon", image: "images/Sparkling Nuclear A Megalodon.jpg" },
    { name: "SSM Sea Mine", image: "images/SSM Sea Mine.png" }
];

function setupCarousel(carouselSelector, products) {
    const carouselItems = document.querySelectorAll(`${carouselSelector} .carousel-item`);
    let currentIndex = 0;

    function updateCarousel() {
        carouselItems.forEach(item => item.classList.remove('active'));
        carouselItems[currentIndex].classList.add('active');
        currentIndex = (currentIndex + 1) % products.length;
    }

    setInterval(updateCarousel, 4000);
    updateCarousel();
}

setupCarousel('.carousel-container .carousel:nth-child(1)', products1);
setupCarousel('.carousel-container .carousel:nth-child(2)', products2);