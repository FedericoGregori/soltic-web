<?php

add_action( 'wp_enqueue_scripts', 'porto_child_css', 1001 );

// Load CSS
function porto_child_css() {
	// porto child theme styles
	wp_deregister_style( 'styles-child' );
	wp_register_style( 'styles-child', esc_url( get_stylesheet_directory_uri() ) . '/style.css' );
	wp_enqueue_style( 'styles-child' );

	if ( is_rtl() ) {
		wp_deregister_style( 'styles-child-rtl' );
		wp_register_style( 'styles-child-rtl', esc_url( get_stylesheet_directory_uri() ) . '/style_rtl.css' );
		wp_enqueue_style( 'styles-child-rtl' );
	}
}

/* Custom Translations */

/**
 * Code goes in theme functions.php
 *
 * My quick custom translations or text changes.
 */
add_filter( 'gettext', function ( $strings ) {
	/**
	 * Holding translations/changes.
	 * 'to translate' => 'the translation or rewording'
	 */
	$text = array(
        /* Header / Home */
		'VIEW CART' => 'Ver Carrito',
        'view cart'   => 'Ver Carrito',
        'Go Shop' => 'Ir a la Tienda',
        /* Tienda / Shop */
        'You\'ve just added this product to the cart' => 'Has agregado este producto al carro',
        'Go to cart page' => 'Ir al carrito',
        'Continue' => 'Continuar',
        'Sort By' => 'Ordenar por',
        'SALE' => 'Oferta',
        /* Modal Cuenta */
        'Login successful, redirecting...' => 'Inicio de sesión exitoso! Redireccionando...',
        'Register successful, redirecting...' => 'Registro exitoso! Redireccionando...',
        'Wrong username or password' => 'Información incorrecta',
        /* Para "Please wait..."
        .loading {
            display: none;
        }
        */
        /* Mi Cuenta */
        'First name' => 'Nombre',
        'Last name' => 'Apellido',
        'Email address' => 'Dirección de Email',
        'Password Change' => 'Cambio de Contraseña',
        'Current Password (leave blank to leave unchanged)' => 'Contraseña Actual',
        'New Password (leave blank to leave unchanged)' => 'Nueva Contraseña',
        'Confirm New Password' => 'Confirmar Nueva Contraseña',
        'Save changes' => 'Guardar Cambios',
        'The following addresses will be used on the checkout page by default.' => 'La siguientes direcciones serán usadas como predeterminadas en la página de pagos.',
        'No order has been made yet.' => 'No se han realizado órdenes aún.',
        'BILLING ADDRESS' => 'Dirección de Facturación',
        'SHIPPING ADDRESS' => 'Dirección de Envíos',
        /* Carrito de Compras */
        'Shopping Cart'   => 'Carrito de Compras',
        'Proceed to Checkout'   => 'Seguir al Pago',
        'Product Name' => 'Producto',
        'Unit Price' => 'Precio por Unidad',
        'Qty' => 'Cant.',
        'DISCOUNT CODE' => 'Código de Descuento',
        'Enter your coupon code if you have one:' => 'Ingrese el código',
        'Continue Shopping' => 'Seguir comprando',
        'Shopping' => 'Comprando',
        'Update Cart' => 'Actualizar Carro',
        'ESTIMATE SHIPPING AND TAX' => 'Envío e Impuestos',
        'Update totals' => 'Ver Opciones de Envío',
        'CART TOTALS' => 'Total Compra',
        'Grand Total' => 'Total Final',
        /* Checkout */
        'Coupon Code' => 'Código',
        'Apply Coupon' => 'Aplicar',
        'BILLING DETAILS' => 'Detalles de Facturación',
        'YOUR ORDER' => 'Tu Orden',
        'Create an account?' => 'Crear una cuenta?',
        /* 404 */
        'PAGE NOT FOUND' => 'Página no encontrada',
        'We\'re sorry, but the page you were looking for doesn\'t exist.' => 'Lo sentimos, pero la página que busca no existe.',
        /* Member profile */
        'Follow Me' => 'Seguirme'
	);

	$strings = str_ireplace( array_keys( $text ), $text, $strings );

	return $strings;
}, 20 );


/**
  * Modificaciones a menu de mi cuenta
  */
 
function my_account_menu_order() {
$menuOrder = array(
'dashboard'          => __( 'Dashboard', 'woocommerce' ),
'orders'             => __( 'Orders', 'woocommerce' ),
'downloads'          => __( 'Download', 'woocommerce' ),
'edit-address'       => __( 'Addresses', 'woocommerce' ),
'edit-account'    	=> __( 'Detalles de la cuenta', 'woocommerce' ),
'customer-logout'    => __( 'Logout', 'woocommerce' ),
);
return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


add_filter( 'woocommerce_account_menu_items', 'ayudawp_ocultar_direccion', 999 );

function ayudawp_ocultar_direccion( $items ) {
unset($items['orders']);
unset($items['downloads']);
unset($items['edit-address']);
return $items;
}