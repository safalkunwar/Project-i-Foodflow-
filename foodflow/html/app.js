let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');
let isLoggedIn = document.querySelector('.form');
let listCards = [];

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'Crossant',
        image: 'croissant.jpg',
        price: 950
    },
    {
        id: 2,
        name: 'Burger',
        image: 'burger.jpg',
        price: 120
    },
    {
        id: 3,
        name: 'Flat-White',
        image: 'flat-white.jpg',
        price: 100
    },
    {
        id: 4,
        name: 'Iced coffee',
        image: 'iced-coffee.jpg',
        price: 200
    },
    {
        id: 5,
        name: 'Pizza',
        image: 'pizza.jpg',
        price: 250
    },
    {
        id: 6,
        name: 'Latte',
        image: 'latte.jpg',
        price: 150
    }
];

function initApp() {
    products.forEach((value, key) => {
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="../img/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Cart</button>`;
        list.appendChild(newDiv);
    });
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="../img/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}
// document.getElementById('payButton').addEventListener('click', function() {
//     // Send a request to the server to check the user's login status
//     fetch('/checkLoginStatus')
//         .then(response => response.json())
//         .then(data => {
//             if (data.loggedIn) {
//                 // User is logged in, process payment
//                 processPayment();
//             } else {
//                 alert("Please login first");
//                 // User is not logged in, redirect to the login page
//                 window.location.href = './login.php';
//             }
//         })
//         .catch(error => {
//             console.error('Error checking login status:', error);
//         });
// });


// Function to process payment
// function processPayment() {
//     // Simulate processing the payment (replace this with actual payment processing logic)
//     setTimeout(function() {
//         // After the payment is processed, display the payment success image
//         window.location.href = '../img/payment.jpg';
//     }, 2000); // Simulate a 2-second payment processing time
// }

  const searchFun = () => {
    let filter = document.getElementById('onSearch').value.toUpperCase();
    let products = document.getElementsByClassName('item');
    for (let i = 0; i < products.length; i++) {
        let productName = products[i].getElementsByClassName('title')[0].textContent.toUpperCase();
        if (productName.includes(filter)) {
            products[i].style.display = "block";
        } else {
            products[i].style.display = "none";
        }
    }
}
  // Add an event listener to the login button
  document.getElementById('payButton').addEventListener('click', function() {
    // Redirect the user to the login page
    window.location.href = '../img/payment.jpg';
});