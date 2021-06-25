  
<h1>Success</h1>

<p>payment_method_id: <?php if (isset($_GET['payment_method_id'])) { echo $_GET['payment_method_id'];} ?>  </p>
<p>external_reference: <?php echo $_GET['external_reference']; ?>  </p>
<p>payment_id: <?php echo $_GET['payment_id']; ?>  </p>
<p>preference_id:<?php echo $_GET['preference_id']; ?>   </p>
<p>site_id: <?php echo $_GET['site_id']; ?> </p>
<p>merchant_order_id:<?php echo $_GET['merchant_order_id']; ?>  </p>
<p>payment_type: <?php echo $_GET['payment_type']; ?>  </p>

<script src="https://www.mercadopago.com/v2/security.js" view=""></script>