
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

        <!-- Razorpay -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">


            <center>
                <h1>PayU Pay Now!</h1>
                </center>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text"  name="name" class="form-control shadow-none" id="name" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control shadow-none" id="email" name="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mobile</label>
                        <input type="tel" class="form-control shadow-none" id="mobile" name="mobile" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Amount</label>
                        <input type="tel" class="form-control shadow-none" id="amount" name="amount" required>
                    </div>
                    <input type="button" class="btn btn-primary shadow-none" id="btn" onclick="pay_now()" value="Pay Now!">
                </form>

        </div>
    </div>

    <script>
        function pay_now(){
            var name =jQuery('#name').val();
            var email =jQuery('#email').val();
            var mobile =jQuery('#mobile').val();
            var amount =jQuery('#amount').val();

            jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amount="+amount+"&name="+name+"&email="+email+"&mobile="+mobile,
               success:function(result){
                   var options = {
                        "key": "rzp_test_6sM0h6s5WAcRvn", 
                        "amount": amount*100, 
                        "currency": "INR",
                        "name": "Abhi Techbot",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>



<!-- <button  id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "rzp_test_6sM0h6s5WAcRvn", // Enter the Key ID generated from the Dashboard
        "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "Acme Corp", //your business name
        "description": "Test Transaction",
        "image": "https://example.com/your_logo",
        "callback_url": "https://abhitechbot.com/",
        "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
            "name": "Abhi Mondal", //your customer's name
            "email": "Abhi@gmail.com",
            "contact": "8101202074" //Provide the customer's phone number for better conversion rates 
        },
        "notes": {
            "address": "Razorpay Corporate Office"
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function (e) {
        rzp1.open();
        e.preventDefault();
    }
</script> -->