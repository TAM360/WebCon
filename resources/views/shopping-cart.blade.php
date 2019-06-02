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
  margin-left: 150px;
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
      <form action="{{route('pay-online')}}" method="POST">
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
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Lahore">

            <div class="row">
              <div class="col">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Punjab">
              </div>
              <div class="col">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="54000">
              </div>
            </div>
          </div>

          <div class="col-5 float-left" style="margin-right: 70px;">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i> 
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          <div class="col-2 float-right">
              <h4>Cart <span class="price" style="color:black; border:"><i class="fa fa-shopping-cart"></i> <b>{{$total_count}}</b></span></h4>
                @foreach ($cart_items as $item)
                  <p>
                    <a href="#">{{$item->name}}</a>
                    <span class="price">PKR {{$item->price}}</span>
                  </p>
                @endforeach
                <hr>
                <p>Total: <span class="price" style="color:black"><b>PKR {{$total_price}}</b></span></p>
          </div>
        </div>
        <input type="submit" value="Submit Payment" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
@include('layouts.footer')

{{-- <script src="https://js.stripe.com/v3/"></script>
<script>
  var stripe = Stripe('pk_test_gjRsTaL3ucYXw6MbgLFrKEdk00AEkmjJlL');

    stripe.redirectToCheckout({
    // Make the id field from the Checkout Session creation API response
    // available to this file, so you can provide it as parameter here
    // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
    sessionId: '{{CHECKOUT_SESSION_ID}}'
  }).then(function (result) {
    // If `redirectToCheckout` fails due to a browser or network
    // error, display the localized error message to your customer
    // using `result.error.message`.
  });
</script> --}}
</body>
</html>
