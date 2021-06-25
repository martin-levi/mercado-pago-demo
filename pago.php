<?php 


    require __DIR__ .  '/vendor/autoload.php';
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398'); 
    MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
    $preference = new MercadoPago\Preference(); 
    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->id = "1234";
    $item->title  =  $_POST['titulo'];
    $item->quantity = $_POST['cantidad'];
    $item->unit_price = $_POST['precio']; 
    $item->description = "Dispositivo móvil de Tienda e-commerce"; 
    $item->picture_url = "https://mercado-pago-test.herokuapp.com".$_POST['URL_PROD']; 
    $item->currency_id ="ARS";  
    $preference->items = array($item);
    $preference->external_reference = "martinl@seincomp.com.ar";
    $preference->notification_url= $_POST['URL_PROD']."/webhook";
    $preference->auto_return= "approved";
    $preference->back_urls = array(
        "success" => $_POST['URL_PROD']."success",
        "pending" => $_POST['URL_PROD']."pending",
        "failure" => $_POST['URL_PROD']."failure"
    );
    $payer = new MercadoPago\Payer();
    $payer->name = "Lalo";
    $payer->surname = "Landa";
    $payer->email = "test_user_63274575@testuser.com"; 
    $payer->phone = array(
      "area_code" => "11",
      "number" => "22223333"
    );
    $payer->address = array(
        "street_name" => "Falsa",
        "street_number" => "123",
        "zip_code" => "1111"
      );

      
    $preference->payer = $payer; 
    $preference->payment_methods = array(
        "excluded_payment_methods" => array(
          array("id" => "amex")
        ),
        "excluded_payment_types" => array(
          array("id" => "atm")
        ),
        "installments" => 6
      );

    $preferenceResponse= $preference->save();

    
       

   print("<script>  location.href='".$preferenceResponse->init_point."'</script>")  
   

?>