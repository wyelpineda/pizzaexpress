//basket 
const cartIcon = document.querySelector('#cart-icon');
const cart = document.querySelector('.cart');
const closeCart = document.querySelector('#cart-close');

cartIcon.addEventListener("click", () => {
    cart.classList.add("active");
});
closeCart.addEventListener("click", () => {
    cart.classList.remove("active");
});


if(document.readyState == "loading"){
    document.addEventListener('DOMContentLoaded', start);
}else{
    start();
}


function start(){
    addEvents();
}

//update total
function update(){
    addEvents();
    updateTotal();
}

//add items
function addEvents(){
    //remove items cart
    let cartRemove_btns = document.querySelectorAll('.cart-remove');
    cartRemove_btns.forEach((btn) => {
        btn.addEventListener("click", handle_removeCartItem);
    });

    //item quantity total
    let cartQuantity_inputs = document.querySelectorAll('.cart-quantity');
    cartQuantity_inputs.forEach((input) => {
        input.addEventListener("change", handle_changeItemQuantity);
    });

    //add item to cart
    let addCart_btns = document.querySelectorAll(".add1");
    addCart_btns.forEach((btn) =>{
        btn.addEventListener("click", handle_addCartItem);
    });

    //Order cart button
    const buy_btn = document.querySelector(".btn-buy");
    buy_btn.addEventListener("click", handle_orderBtn);
}

let itemsAdded = []

function handle_addCartItem(){
    let product = this.parentElement;
    let title = product.querySelector(".prodtitle").innerHTML;
    let price = product.querySelector(".product-price").innerHTML;
    let image = product.querySelector(".prodimg").src;

    let newToadd ={
        title,
        price,
        image,
    };

    //item is already added to cart
    if(itemsAdded.find(el => el.title == newToadd.title)){
        alert("This product is already added to your basket!");
        return;
    }else{
        itemsAdded.push(newToadd);
    }

    let cartBoxElement = CartBoxComponent(title, price, image);
    let newNode = document.createElement("div");
    newNode.innerHTML = cartBoxElement;
    const cartContent = cart.querySelector(".ccontent");
    cartContent.appendChild(newNode);

    update();
}
//remove items
function handle_removeCartItem(){
    this.parentElement.remove();
    itemsAdded = itemsAdded.filter
    (el => 
        el.title != 
        this.parentElement.querySelector('.cart-prodname').innerHTML
        );

    update();
}

function handle_changeItemQuantity(){
    if(isNaN(this.value) || this.value < 1){
        this.value = 1;
    }
    this.value = Math.floor(this.value);

    update();
}

function handle_orderBtn(){
    if(itemsAdded.length <= 0){
        alert("There is no added product yet! \n Please choose a product first.");
        return;
    }
    const cartCcontent = cart.querySelector(".ccontent");
    cartCcontent.innerHTML = "";
    alert("Your Order is Successfully Placed! Thank You for Ordering :)");
    itemsAdded = [];

    update();
}


//cart price 
function updateTotal(){
    let cartBoxes = document.querySelectorAll(".cart-box");
    const totalElement = cart.querySelector(".total-price");
    let total = 0;
    cartBoxes.forEach((cartBox) => {
        let priceElement = cartBox.querySelector(".cart-price");
        let price = parseFloat(priceElement.innerHTML.replace("₱", ""));
        let quantity = cartBox.querySelector(".cart-quantity").value;
        total += price * quantity;
    });
    
    //two digits decimal
    total = total.toFixed(2);
    //round off
    total = Math.round(total * 100)/100;

    totalElement.innerHTML = "₱" + total;
}




function CartBoxComponent(title, price, image){
    return `
    <div class="cart-box">
    <img src=${image} class="cart-img">
    <div class="details">
        <div class="cart-prodname">${title}</div>
        <div class="cart-price">${price}</div>
        <input type="number" value="1" class="cart-quantity">
    </div>    

    <i class="fa-solid fa-trash cart-remove"></i>

    </div>`;
}


// menu toggle
let navbar = document.querySelector(".navbar");
function menutoggle(){
    if(navbar.style.maxHeight == "0px"){
        navbar.style.maxHeight = "600px";
    }
    else{
        navbar.style.maxHeight = "0px";
    }
}
