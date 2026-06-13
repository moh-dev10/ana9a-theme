<?php
/**
 * Ana9a Blueprint Functions and Definitions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// 1. الإعدادات الأساسية للثيم والاستدعاءات (Core Setup)
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/admin-custom.php';

// 2. تخصيصات وتعديلات متجر ووكومرس (WooCommerce Engine)
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce-custom.php';
}

// 3. إضافات وبوابات الشحن الجزائرية (DZ Delivery)
if ( class_exists( 'Algeria_Delivery_Class' ) ) {
    require get_template_directory() . '/inc/algeria-delivery-integration.php';
}