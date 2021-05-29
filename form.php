<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamów produkt</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>                 
    <form id="form" name="orderForm" action="insert.php" method="post" onsubmit="return validateForm()">
        <div class="container">
            <div class="items">
            <h2 class="title">Wybierz produkt</h2>            
            <img class="product" src="./assets/product-1.png" alt="" />
            <img class="product" src="./assets/product-3.png" alt="" />
            <img class="product" src="./assets/product-4.png" alt="" />
            <div class="radio-group">
                <input type="radio" name="product" value="Samsung">
                <input type="radio" name="product" value="Xiaomi">
                <input type="radio" name="product" value="HTC">  
            </div>
            </div>
            <div class="order">

                <div class="header">
		            <h2>Złóż zamówienie</h2>
	            </div>
            
            <div class="form">
                    <div class="input-group">
                        <label for="name" class="label">Imie i nazwisko</label>
                        <input id="name" name="name" placeholder="Jan Kowalski" type="text" class="input">
                    </div>
                
                    <div class="input-group">
                        <label for="email" class="label">Email</label>
                        <input id="email" name="email" type="text" class="input" placeholder="jankowalski@gmail.com">
                    </div>

                    <div class="input-group">
                        <label for="telephone" class="label">Telefon</label>
                        <input id="telephone" name="telephone" type="text" class="input" placeholder="987654321">
                    </div>
                
                    <div class="input-group">
                        <label for="address" class="label">Adres</label>
                        <input id="address" name="address" type="text" placeholder="Kraków" class="input">
                    </div>
                
                    <input type="submit" class="button" name="submit" value="Złóż zamówienie">
                </div>
            </div>
            <div class="navigation">
                <p class="justify p-button"><a href="orders.php">Przjedz do zamówień</a></p>
            </div>
            </div>
        </form>
        <script>
            function validateForm() {
                var product = document.forms["orderForm"]["product"].value;
                var name = document.forms["orderForm"]["name"].value;
                var email = document.forms["orderForm"]["email"].value;
                var telephone = document.forms["orderForm"]["telephone"].value;
                var address = document.forms["orderForm"]["address"].value;
                    if(product == "" || name == "" || email == "" || phone == "" || address == ""){
                        alert('Wypełnij wszystkie pola.');
                        return false;
                    }
            }   
        </script>
</body>
</html>