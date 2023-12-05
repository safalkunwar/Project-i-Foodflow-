<?php
$openShopping = document.querySelector('.shopping');
$closeShopping = document.querySelector('.closeShopping');
$list = document.querySelector('.list');
$listCard = document.querySelector('.listCard');
$body = document.querySelector('body');
$total = document.querySelector('.total');
$quantity = document.querySelector('.quantity');
$isLoggedIn = document.querySelector('.form');
$openShopping.addEventListener('click', function () {
    $body.classList.add('active');
});
$closeShopping.addEventListener('click', function () {
    $body.classList.remove('active');
});
$products = [
    [
        'id' => 1,
        'name' => 'Cold Brew',
        'image' => 'cold-brew.jpg',
        'price' => 950
    ],
    [
        'id' => 2,
        'name' => 'Expresso',
        'image' => 'espresso.jpg',
        'price' => 120
    ],
    [
        'id' => 3,
        'name' => 'Flat-White',
        'image' => 'flat-white.jpg',
        'price' => 100
    ],
    [
        'id' => 4,
        'name' => 'Iced coffee',
        'image' => 'iced-coffee.jpg',
        'price' => 200
    ],
    [
        'id' => 5,
        'name' => 'Macchiato',
        'image' => 'macchiato.jpg',
        'price' => 250
    ],
    [
        'id' => 6,
        'name' => 'Latte',
        'image' => 'latte.jpg',
        'price' => 150
    ]
];
$listCards = [];
function initApp()
{
    global $products, $list;
    foreach ($products as $key => $value) {
        $newDiv = document.createElement('div');
        $newDiv.classList.add('item');
        $newDiv.innerHTML = '
            <img src="/img/' . $value['image'] . '">
            <div class="title">' . $value['name'] . '</div>
            <div class="price">' . number_format($value['price']) . '</div>
            <button onclick="addToCard(' . $key . ')">Add To Cart</button>';
        $list.appendChild($newDiv);
    }
}
initApp();
function addToCard($key)
{
    global $listCards, $products;
    if ($listCards[$key] == null) {
        // copy product form list to list card
        $listCards[$key] = json_decode(json_encode($products[$key]), true);
        $listCards[$key]['quantity'] = 1;
    }
    reloadCard();
}


