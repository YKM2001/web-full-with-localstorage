// ? Initialize Swiper 
var swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


// ? header-dropdown
const dropdown = document.querySelectorAll('.header__dropdown')

if(dropdown) {
    dropdown.forEach((item) => {
        item.addEventListener('click', () => {
            item.classList.toggle('dropdown-active')
        })
    })
}




// ? basket-open
const basketOpen = document.querySelectorAll('.basket__icon')

// ? открываем корзину
basketOpen.forEach((item) => {
    item.addEventListener('click', () => {
        const basket = document.querySelectorAll('.basket')
        basket.forEach((item) => {
            item.classList.toggle('basket-open')
        })
    })
})


document.addEventListener('DOMContentLoaded', () => {







// ? add 
const discountList = document.querySelectorAll('.discount__list')
// ? check Item
checkOut()
discountList.forEach((item) => {
    item.addEventListener('click', (e) => {
        const target = e.target
        if(target.classList.contains('add')) {
            // ? вытаскиваем информацию о товаре
            const parent = target.parentNode
            const image = parent.querySelector('#image').getAttribute('src')
            const name = parent.querySelector('.discount__name').innerHTML
            const descr = parent.querySelector('.discount__descr').innerHTML
            const price = parent.querySelector('.discount__price-new').innerHTML
            // ? передаем их в корзину
            addCardToBasket([image,name,descr,price])
            checkOut()
        }
    })
})


const add = document.querySelectorAll('.add')

add.forEach((item) => {
    item.addEventListener('click', (e) => {
        // ? вытаскиваем информацию о товаре
        const parent = e.target.parentElement
        const image = parent.querySelector('#card-img').getAttribute('src')
        const name = parent.querySelector('.card__name').innerHTML
        const descr = parent.querySelector('.card__descr').innerHTML
        const price = parent.querySelector('.card__price').innerHTML
        // ? передаем их в корзину
        addCardToBasket([image,name,descr,price])
    })
})





function checkOut() {
    const counter = document.querySelectorAll('.basket__count')
    counter.forEach((item) => {
        const basketList = document.querySelectorAll('.basket__list')
        basketList.forEach((itemBasket) => {
            counter.forEach((item) => {
                item.innerHTML = itemBasket.children.length
            })
        })
    })
}


// ? генерируем карточку товара в корзине
function addCardToBasket(array) {

    const itemProduct = `
    <li class="basket__item" data-index="">
    <div class="basket__image">
    <img src = "${array[0]}">
    </div>
    <div class="basket__body">
    ${array[1]}
    ${array[2]}
    ${array[3]}
    </div>
    </li>
    `
    checkOut()
    // ? заносим карточку в корзину
    const basketList = document.querySelectorAll('.basket__list')
    basketList.forEach((item) => {
        item.innerHTML += itemProduct
    })
    // ? обновляем локальное хранилище
    updateStorage()
}



function initialStorage() {
    const basketList = document.querySelectorAll('.basket__list')
    if(localStorage.getItem('products') !== null) {
        basketList.forEach((item) => {
            item.innerHTML = localStorage.getItem('products')
        })
    }
    checkOut()
}

initialStorage()

function updateStorage() {
    const basketList = document.querySelectorAll('.basket__list')
    // ? кидаем в local storage
    basketList.forEach((item) => {
        let html = item.innerHTML
        html = html.trim()
        if(html.length) {
            localStorage.setItem('products', html)
        } else {
            localStorage.removeItem('products')
        }
    })
    checkOut()
}

function deleteAllStorage() {
    const deleteAll = document.querySelectorAll('.basket__delete')
    deleteAll.forEach((item) => {
        item.addEventListener('click', () => {
            const basketList = document.querySelectorAll('.basket__list')
            basketList.forEach((item) => {
                item.innerHTML = ''
                localStorage.removeItem('products')
                checkOut()
            })
        })
    })
    checkOut()
}

deleteAllStorage()

})

