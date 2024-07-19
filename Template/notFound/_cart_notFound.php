<?php
/* if ( isset($_POST["submit"])) {
    if(tambah($_POST) > 0 ){
		echo "
		<script>
		alert('Data Berhasil Ditambahkan!');
		document.location.href = 'transaksi.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('Data Gagal Ditambahkan!');
		document.location.href = 'cart.php';
		</script>
		"; 
	}
} */ 

?>

<!-- Shopping cart section  -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Games</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <!-- Empty Cart -->
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-12 text-center py-2">
                            <img src="./assets/blog/empty_cart.png" alt="Empty Cart" class="img-fluid" style="height: 200px;">
                            <p class="font-baloo font-size-16 text-black-50">Games</p>
                        </div>
                    </div>
                <!-- .Empty Cart -->
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i>Ada promo gratis ongkir</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal 
                            (<?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">Rp.<span class="text-danger" id="deal-price"><?php echo (isset($subTotal) ? $Cart->getSum($subTotal): 0)  - $hitungandiskon; ?></span> </span> </h5>
                            <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light">

                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->