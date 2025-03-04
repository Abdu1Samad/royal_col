// Change product card image on mouseover and out:


const productCard = document.querySelectorAll('.products-card');
let imgPreserve = '';

Array.from(productCard).forEach((card) => {
    card.addEventListener('mouseover', (event) => {
        imgPreserve = event.currentTarget.querySelector('.img-1').src;
        event.currentTarget.querySelector('.img-1').src = 'admin/' + event.currentTarget.querySelector('.img-2').value
    })

    card.addEventListener('mouseout', (event) => {
        event.currentTarget.querySelector('.img-1').src = imgPreserve
    }) 
})