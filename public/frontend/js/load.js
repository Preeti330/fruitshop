// const { first } = require("lodash");

var user_id =0;
var payment_type=0;
document.addEventListener('DOMContentLoaded', function() {
    // Check if the user_id exists in localStorage
    // var user_id1 = localStorage.getItem("user_id");

    // if (user_id !== null) {
    //     var cartLink = document.getElementById('cartLink');
    //     // cartLink.href = "{{ url('cart.user_id') }}";
    //     cartLink.href = "http://localhost:8000/cart/" + user_id;
    // }
});

function cartClick(flag){
     user_id = localStorage.getItem("user_id");
   
    if (user_id) {

        if(flag==1){
            var cartLink = document.getElementById('cartLink');
            // cartLink.href = "{{ url('cart.user_id') }}";
            cartLink.href = "http://localhost:8000/cart/" + user_id;

        }else if(flag == 2){
            var checkout = document.getElementById('checkout');
            // cartLink.href = "{{ url('cart.user_id') }}";
            checkout.href = "http://localhost:8000/checkoutpage/" + user_id;
            console.log(checkout.href)
        }
    }else{
        user_id=0
    }
}


$('#exampleModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var productId = button.data('product-id');
    let price =button.data('price');
    $('#product_id').val(productId);
    $('#price').val(price);
    qty1=1;

    $('#qty').val(qty1);
    let qty =button.data('qty');
    var total_price   = qty*price;
    $('#total_price').val(price);

    $('#qty').on('input', function() {
        var newQty = parseInt($(this).val());
        updateTotalPrice(price, newQty);
    });

});

function updateTotalPrice(price, qty) {
    if(qty<0){
     alert("Sorry,Qty should not be in negitive..!!!");
    }else{
        var total_price = price * qty;
        $('#total_price').val(total_price);
    }
}


function saveCart() {

    let xhr2 = new XMLHttpRequest();
    closeModel();
    xhr2.onreadystatechange = function() {
        if (xhr2.readyState == 4) {
            if (xhr2.status >= 200 && xhr2.status < 300) {
                console.log(xhr2.responseText);
                
                var response = JSON.parse(xhr2.responseText);
                var user_id = response.data.user_id;
                localStorage.setItem('user_id', user_id);
                // localStorage.setItem('user_id', data['user_id']);
                closeModel();
                // let redirectUrl = xhr2.getResponseHeader('Location');
                // window.location.href = redirectUrl;
            } else {
                console.error("Error saving cart:", xhr2.statusText);
                closeModel();
            }
        }
    };

    xhr2.open('POST', 'savecart', true);
    let username=document.getElementById('username').value;
    let location=document.getElementById('location').value;
    let mobile  =document.getElementById('mobile').value;
    let qty=document.getElementById('qty').value;
    var button = document.querySelector('[data-bs-target="#exampleModal"]');
    if (button) {
        // Extract the product ID from the button's data attribute
        var productId = button.getAttribute('data-product-id');
        var price     = button.getAttribute('data-price');
        var total_price   = qty*price;
        $('#total_price').val(total_price);
        if (productId) {
            // Use the product ID
            var prod_id=productId;
            
        } else {
            console.error("Product ID not found in button's data attribute");
        }
    } else {
        console.error("Button not found");
    }
  
    jsonObject1={
        username:username,
        location:location,
        mobile:mobile,
        qty:qty,
        product_id:prod_id,
        unit_per_item:price,
        total_price:total_price
    }

    xhr2.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhr2.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    let jsonData = JSON.stringify(jsonObject1);

    // Send the JSON data
    xhr2.send(jsonData);
 
}

function closeModel(){
    console.log(555);
    $('#exampleModal').submit(function(e) {
        e.preventDefault();
        // Coding
        $('#exampleModal').modal('toggle'); //or $('#exampleModal').modal('hide');
        return false;
    });
    
}

function paymentType(e){
    console.log(e.target.value);
    this.payment_type=e.target.value;
}


function order(){
    let xhr2 = new XMLHttpRequest();
    closeModel();
    xhr2.onreadystatechange = function() {
        if (xhr2.readyState == 4) {
            if (xhr2.status >= 200 || xhr2.status < 300) {
                alert('Order submitted successfully.');
                window.location.href = window.location.origin; 
                console.log(xhr2.responseText);
                
                var response = JSON.parse(xhr2.responseText);

                // window.location.href = "http://localhost:8000";
            
                // localStorage.setItem('user_id', user_id);
                // localStorage.setItem('user_id', data['user_id']);
                closeModel();
                // let redirectUrl = xhr2.getResponseHeader('Location');
                // window.location.href = redirectUrl;
            } else {
                console.error("Error saving cart:", xhr2.statusText);
                closeModel();
            }
        }
    };
    const baseUrl = window.location.origin;
    xhr2.open('POST', baseUrl+'/checkout', true);

    let f_name=document.getElementById('f_name').value;
    let l_name=document.getElementById('l_name').value;
    let address  =document.getElementById('address').value;
    let city=document.getElementById('city').value;
   
    let cn=document.getElementById('cn').value;
    let zip=document.getElementById('zip').value;
    let mobile  =document.getElementById('mobile').value;
    let fb=document.getElementById('fb').value;

    xhr2.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhr2.setRequestHeader('X-CSRF-TOKEN', csrfToken);

    let user_id = localStorage.getItem('user_id');

    let jsonObject1={
        user_id:user_id,
        address:address,
        town:city,
        country:cn,
        zip:zip,
        mobile:mobile,
        payment_type:this.payment_type,
        first_name:f_name,
        last_name:l_name
    }

    let jsonData = JSON.stringify(jsonObject1);
    // console.log(jsonData);return;

    // Send the JSON data
    xhr2.send(jsonData);

}

/*
$('.category-link').click(function(event) {
    event.preventDefault(); // Prevent default link behavior

    var categoryId = $(this).data('category-id');

    // Make AJAX call with the category ID
    $.ajax({
        url: '/dashboard/medicinepending/' + categoryId,
        type: 'GET',
        success: function(response) {
            // Process the response here
            console.log("Category data loaded successfully:", response);
            // You can update the DOM with the response data here
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error("Error loading category data:", error);
        }
    });
});

*/
