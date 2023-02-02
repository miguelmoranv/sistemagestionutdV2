<?php

require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken('TEST-8814975634929187-102623-4efd855de0f93357a6fb69eab0bebcb5-277588512');

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->id = '0001';
$item->title = 'Laptop genérica intel core i5 1a generacion 512gb ssd 6gb ram pantalla 15.6 pulgadas Windows 10, gris';
$item->quantity = 1;
$item->unit_price = 5999.00;
$item->currency_id = "MXN";
$preference->items = array($item);

$preference->back_urls = array(
    "success" => "http://localhost/api_ecommerce/captura.php",
    "failure" => "http://localhost/api_ecommerce/fallo.php"
);

$preference->auto_return = "approved";
$preference->binary_mode = true;

$preference->save();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMY</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body style="background-color:#EAEDED">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a href="#"><i style="color:white; margin-right: 1rem" class="fa-light fa-pie h1"></i></a>
        <a href="#" class="navbar-brand mb-0 h1">DONACIONES</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="width:100%">
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                </li>
                <!-- <li class="nav-item"><input style="height:1rem; translate:0 0.3rem; background-color:transparent; padding-inline-end: 2.5rem;" type="text" class="form-control form-control-sm" placeholder="Buscar en toda la tienda..."></li> -->
                <li class="nav-item">
                </li>
                <li style="margin-left:auto" class="nav-item"><a href="#" class="nav-link">Iniciar sesión <i style="translate: 0 0.2rem" class="fa fa-user-circle h5"></i></a></li>
                <li class="nav-item"><a href="carrito.php" class="nav-link active">Carrito <i style="translate: 0 0.2rem" class="fa fa-cart-shopping h5"></i></a></li>
            </ul>
        </div>
    </div>
    </nav>
    <div class="container mt-5" style="background-color: white">
        <div class="row" style="padding-inline:1.5rem">
            <h3 class="mt-3 mb-2" style="width: fit-content">Carrito de compras</h3>
            <p style="margin-left: auto; width: fit-content; line-height: 4rem; margin-right: 1.5rem; margin-bottom: 0;">Donación</p>
            <hr>
            <div class="col-3"><img src="https://viajeropeligro.com/wp-content/uploads/2019/07/perros.jpg" width="100%" alt=""></div>
            <div class="col-6">
                <p>Donación para los perritos de la escuela UTD</p>
                <select name="" id="" class="form-select"  style="width:fit-content">
                    <option>Cantidad: 50</option>
                </select>
                <br>
                <p class="text-primary ">Eliminar | Guardar para más tarde</p>
            </div>
            <div class="col-1 offset-2"><b>50</b>
                <a  style="margin-top: 6rem;" class="btn btn-primary cho-container"></a>
            </div>
            <hr>
        </div>
    </div>

    <script>
    const mp = new MercadoPago('TEST-7cf4cd6f-779d-409e-a287-195c73a5cef2', {
        locale: 'es-MX'
    });

    mp.checkout({
        preference: {
        id: '<?php echo $preference->id; ?>'
        },
        render: {
        container: '.cho-container',
        label: 'Donar',
        }
    });
    </script>

