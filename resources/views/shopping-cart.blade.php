<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@include('layouts.header')
<style>
.body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

.container {
  background-color: #f2f2f2;
  padding: 9px 27px 29px 44px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  margin-left: 353px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body class="body">
@include('layouts.menubar')
<h2 style="margin-left: 600px;">Checkout Form</h2>
<div class="row">
  <div class="col-lg-12">
    <div class="container" style="align-items: center">
      <form action="/cart/payment" method="POST" id="payment-form">
        @csrf
        <div class="row">
          <div class="col-5 float-left" style="margin-right: 70px;"> 
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Saeed Malik" value="{{$name}}">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="mail@email.com" value="{{$email}}">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Street 2, B Block Faisal Town ">

            <div class="row">
              <div class="col">
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="Lahore" value="Lahore">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Punjab" value="Punjab">
              </div>
            </div>
          </div>
          <input type="hidden" name="items" value={{$cart_items}}>
          <input type="hidden" name="total_price" value={{$total_price}}>
          <input type="hidden" name="total_count" value={{$total_count}}>          
          <div class="col-7 float-right" style="margin-right: 70px; padding-left: 50px;">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i> 
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" value="{{$name}}">
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>
              <!-- Used to display Element errors. -->
              <div id="card-errors" role="alert"></div>
              <hr>
              <div>
                  <h4>Cart <span class="price" style="color:black;"><i class="fa fa-shopping-cart"></i> <b>{{$total_count}}</b></span></h4>
                  @foreach ($cart_items as $item)
                    <p>
                      <a href="{{route('remove-item')}}?rowId={{$item->rowId}}">&#x2715;</a>
                      {{$item->name}}
                      <span class="price">PKR {{$item->price}}</span>
                    </p>
                    <input type="hidden" name="rowId" value="{{$item->rowId}}">
                  @endforeach
                  <hr>
                  <p>Total: <span class="price" style="color:black"><b>PKR {{$total_price}}</b></span></p>
              </div>
          </div>
          <div class="col-2 float-right">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
{{-- @include('layouts.footer') --}}

<script src="https://js.stripe.com/v3/"></script>
<script>
  var stripe = Stripe('pk_test_gjRsTaL3ucYXw6MbgLFrKEdk00AEkmjJlL');
  var elements = stripe.elements();
  var card = elements.create('card');

  // Add an instance of the card Element into the `card-element` <div>.
  card.mount('#card-element');
  var form = document.getElementById('payment-form');
  // alert(form)
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });
  });

  // Submit the form with the token ID.
  function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
  };
</script>
</body>
</html>
