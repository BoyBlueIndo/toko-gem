<?php
ob_start();

include ('headeruser.php');
?>

<?php

  
        count($product->getData('cart')) ? include ('Template/_cart-template.php') :  include ('Template/notFound/_cart_notFound.php');


    
        count($product->getData('wishlist')) ? include ('Template/_wishilist_template.php') :  include ('Template/notFound/_wishlist_notFound.php');
      

        
        count($product->getData('transaksi')) ? include ('success.php') :  include ('process_payment.php');
  

        include ('Template/_new-phones.php');
    
?>



