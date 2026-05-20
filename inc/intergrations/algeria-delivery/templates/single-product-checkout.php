<?php
/**
 * Quick Checkout — Maison Rym Style
 * Matches the red-bordered Arabic card design
 */
if ( ! defined( 'ABSPATH' ) ) exit;

global $product;
if ( ! $product || ! $product->is_purchasable() || ! $product->is_in_stock() ) return;

$wilayas = Algeria_Data::get_wilayas();
$prices  = get_option( 'algeria_delivery_prices', [] );
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">

<div class="p-0 m-0" dir="rtl">

    

    <!-- Main Card Container -->
    <div class="bg-white max-w-2xl rounded-[15px] border-2  border-brand-black py-6 px-5 ">
        
        <h2 id="qmc-title" class="text-center font-bold text-[1.1rem] mb-5 text-gray-800">
            أملأ الاستمارة للطلب السريع
        </h2>

        <form id="qmc-form" class="main-order-form space-y-6" novalidate>
            <?php wp_nonce_field( 'algeria_delivery_nonce', 'opc_nonce' ); ?>
            <input type="hidden" name="product_id"    value="<?php echo esc_attr( $product->get_id() ); ?>">
            <input type="hidden" name="variation_id"  id="opc_variation_id"  value="">
            <input type="hidden" name="quantity"      id="opc_quantity"      value="1">
            <input type="hidden" name="delivery_type" id="opc_delivery_type" value="home">

            <!-- Personal Info Row -->
            <div class="grid grid-cols-2 gap-3" >
                <div class="relative flex items-center ">
                    <div class="absolute top-1/2 -translate-y-1/2 inset-s-3  pointer-events-none text-brand-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                             fill="none" stroke="currentColor" stroke-width="2" 
                             stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="5"/>
                            <path d="M20 21a8 8 0 0 0-16 0"/>
                        </svg>
                    </div>
                    <input type="text" name="full_name" 
                           class="w-full border border-gray-300 rounded-lg py-3 ps-12  text-sm 
                                  focus:ring-2 focus:ring-brand-black focus:border-transparent 
                                  outline-none transition-all" 
                           placeholder="الإسم واللقب" required>
                </div>
                <div class="relative flex items-center">
                    <div class="absolute top-1/2 -translate-y-1/2 inset-s-3  pointer-events-none text-brand-black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone">
                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
                    </div>
                    <input type="tel" name="phone" id="opc_phone" 
                           class="w-full border border-gray-300 rounded-lg py-3 ps-12 text-sm
                             focus:ring-2 focus:ring-brand-black focus:border-transparent outline-none transition-all" 
                             dir="rtl" placeholder="رقم الهاتف" maxlength="10" required>
                </div>
            </div>

            <!-- Commune + Wilaya -->
            <div class="qmc-row grid grid-cols-2 gap-4">
                <div class="qmc-field relative">
                    <div class="absolute top-1/2 -translate-y-1/2 inset-s-3  pointer-events-none text-brand-black">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 298 298" version="1.1"><path d="" stroke="none" fill="#282c3c" fill-rule="evenodd"></path><path d="M 241.136 5.740 C 236.787 7.021, 234.895 7.107, 231.136 6.197 C 228.586 5.580, 221.907 5.092, 216.293 5.113 C 206.494 5.149, 205.935 5.270, 202.329 8.136 C 199.794 10.151, 197.910 10.930, 196.536 10.532 C 182.840 6.570, 179.544 6.423, 173.636 9.505 C 172.060 10.327, 169.544 11, 168.045 11 C 166.545 11, 163.109 11.670, 160.409 12.489 C 157.709 13.308, 153.250 13.986, 150.500 13.996 C 144.853 14.016, 130.352 17.250, 126.139 19.428 C 124.608 20.220, 122.770 21.573, 122.055 22.434 C 121.340 23.295, 120.023 24.004, 119.128 24.010 C 116.485 24.026, 106.983 28.808, 103.476 31.887 C 101.690 33.455, 97.253 35.805, 93.615 37.110 C 89.977 38.415, 87 39.949, 87 40.519 C 87 41.089, 87.787 42.668, 88.750 44.027 C 91.833 48.384, 93.069 53.249, 93.856 64.140 C 94.379 71.365, 95.168 75.607, 96.313 77.355 C 99.130 81.655, 98.529 82.492, 92.564 82.578 C 88.301 82.639, 86.390 83.228, 83.637 85.328 C 81.710 86.798, 79.382 88, 78.464 88 C 75.702 88, 66.959 93.385, 67.100 95 C 67.172 95.825, 67.178 98.336, 67.115 100.579 C 67.005 104.475, 66.769 104.766, 61.855 107.068 C 59.026 108.393, 55.350 111.170, 53.688 113.239 C 50.938 116.661, 50.225 117, 45.783 117 C 40.769 117, 36.347 118.672, 34.055 121.434 C 33.340 122.295, 31.671 123, 30.345 123 C 26.603 123, 21.349 125.556, 13.360 131.264 C 9.143 134.277, 5.388 137.838, 4.516 139.651 C 2.371 144.110, 2.367 165.652, 4.510 168.711 C 5.341 169.897, 19.524 180.364, 36.029 191.971 C 52.534 203.578, 75.367 219.716, 86.769 227.835 C 98.171 235.953, 112.599 246.120, 118.832 250.429 C 125.065 254.738, 130.381 258.992, 130.646 259.882 C 131.855 263.945, 134.276 267.645, 136.775 269.251 C 138.274 270.214, 141.029 272.127, 142.898 273.501 C 144.767 274.876, 147.692 276.020, 149.398 276.045 C 151.104 276.070, 153.822 276.654, 155.438 277.344 C 158.072 278.468, 158.385 279.084, 158.464 283.302 C 158.658 293.624, 165.964 295.787, 188 292.048 C 205.276 289.116, 206.573 288.577, 214.500 281.036 C 226.324 269.788, 231.914 265.588, 248.040 255.838 C 266.888 244.442, 281.697 234.215, 287.754 228.411 C 292.102 224.245, 292.246 223.920, 291.775 219.295 C 291.239 214.034, 285.407 203.252, 281.386 200.089 C 280.101 199.078, 276.369 197.407, 273.093 196.376 C 267.570 194.637, 267.088 194.245, 266.494 191 C 266.141 189.075, 265.173 186.446, 264.343 185.158 C 263.097 183.225, 263.047 182.300, 264.057 179.862 C 264.835 177.984, 265.066 174.611, 264.692 170.603 C 264.344 166.882, 264.515 163.885, 265.108 163.292 C 265.769 162.631, 265.824 156.997, 265.268 146.859 C 264.577 134.258, 264.030 130.639, 262.284 127.108 C 261.107 124.731, 260.385 122.161, 260.677 121.398 C 260.970 120.635, 259.730 113.146, 257.921 104.755 L 254.632 89.500 249.316 84.379 C 246.392 81.562, 244 78.588, 244 77.770 C 244 76.951, 242.200 74.237, 240 71.737 C 237.800 69.238, 236 66.812, 236 66.347 C 236 65.881, 237.557 64.258, 239.460 62.739 C 242.224 60.534, 243.441 58.330, 245.509 51.781 C 247.872 44.302, 247.992 43.140, 246.872 38.541 C 245.142 31.432, 245.718 26.124, 248.592 22.708 C 251.251 19.548, 251.537 16.603, 249.917 9.049 C 248.723 3.481, 248.762 3.495, 241.136 5.740 M 209.800 28.092 C 208.946 28.570, 205.695 29.626, 202.576 30.438 C 197.372 31.794, 196.419 31.764, 191 30.077 C 187.752 29.066, 184.848 28.485, 184.547 28.786 C 184.246 29.087, 184 34.463, 184 40.732 C 184 52.640, 183.479 54.652, 179.212 59.228 L 176.668 61.956 183.466 61.321 C 189.181 60.787, 190.920 61.017, 194.382 62.761 C 197.596 64.381, 210.641 68, 213.264 68 C 213.527 68, 214.027 65.862, 214.376 63.250 C 215.166 57.320, 217.904 52.736, 222.419 49.781 C 226.528 47.092, 227.442 44.354, 226.008 39.028 C 225.430 36.885, 225.056 33.851, 225.175 32.287 C 225.294 30.723, 225.073 28.927, 224.683 28.296 C 223.852 26.952, 212.125 26.791, 209.800 28.092 M 162 33 C 160.625 33.440, 157.131 33.845, 154.235 33.900 C 144.934 34.076, 136.978 36.884, 132.885 41.434 C 129.627 45.056, 128.766 45.470, 124.157 45.623 C 119.812 45.768, 118.666 46.244, 116.522 48.791 C 114.326 51.401, 114 52.739, 114.001 59.144 C 114.002 67.248, 116.253 74.698, 119.762 78.206 C 122.330 80.775, 131.090 81.785, 136.192 80.102 C 138.729 79.265, 139.932 78.078, 140.868 75.489 C 142.319 71.477, 147.300 67.308, 152.290 65.930 C 155.208 65.125, 156.125 64.099, 158.274 59.239 C 159.669 56.083, 161.610 50.913, 162.588 47.750 C 163.565 44.587, 164.733 42, 165.183 42 C 165.632 42, 166 39.750, 166 37 C 166 34.250, 165.662 32.045, 165.250 32.100 C 164.838 32.155, 163.375 32.560, 162 33 M 166.640 80.633 C 165.127 81.935, 163.080 83, 162.092 83 C 160.561 83, 160.202 84.217, 159.654 91.250 C 159.301 95.787, 159.009 103.662, 159.006 108.750 L 159 118 162.250 118.006 C 167.713 118.015, 173.246 120.052, 176.096 123.103 C 179.077 126.294, 184.913 129.543, 198.323 135.477 C 207.205 139.408, 210 142.104, 210 146.742 C 210 148.731, 218.477 163.125, 223.277 169.288 C 224.900 171.371, 227.885 173.921, 229.911 174.954 C 234.737 177.417, 241 178.615, 241 177.076 C 241 176.446, 241.787 174.725, 242.750 173.252 C 244.576 170.458, 244.767 168.277, 244.859 149.150 C 244.911 138.361, 244.764 137.522, 241.873 132.150 C 239.282 127.334, 238.897 125.696, 239.265 121.056 C 239.694 115.640, 236.979 100.454, 235.332 99.060 C 234.874 98.673, 232.612 96.907, 230.304 95.137 C 227.997 93.367, 225.834 91.052, 225.498 89.994 C 225.091 88.710, 223.657 87.888, 221.194 87.526 C 210.586 85.964, 190.326 81.711, 188.208 80.601 C 186.443 79.676, 184.506 79.583, 181.085 80.260 C 177.524 80.964, 175.541 80.835, 172.890 79.727 C 169.583 78.346, 169.242 78.395, 166.640 80.633 M 116.556 100.705 C 113.149 103.636, 107.923 104.502, 101.104 103.266 C 96.041 102.348, 95.262 102.453, 92.874 104.376 C 91.311 105.635, 89.995 107.926, 89.643 110 C 88.716 115.464, 86.487 117.714, 78.222 121.533 C 72.947 123.970, 69.134 126.598, 66.024 129.940 C 61.477 134.826, 56.809 136.982, 50.750 136.994 C 49.237 136.997, 48 137.438, 48 137.974 C 48 139.582, 42.834 141.683, 37.365 142.299 C 33.833 142.698, 30.791 143.893, 27.615 146.132 C 23.360 149.131, 23 149.717, 23 153.642 C 23 157.726, 23.254 158.078, 29.250 162.316 C 32.688 164.745, 52.600 178.801, 73.500 193.551 C 105.660 216.247, 118.541 225.328, 138.099 239.092 C 140.588 240.844, 140.534 240.608, 136.827 233.533 C 131.314 223.013, 128.912 212.781, 129.070 200.500 C 129.150 194.338, 128.591 188.005, 127.615 184 C 125.184 174.033, 125.387 173.126, 132.040 164.188 C 137.576 156.752, 138.202 155.383, 139.539 147.787 C 140.499 142.329, 140.998 132.502, 140.999 119 L 141 98.500 130.060 98.500 C 120.222 98.500, 118.862 98.722, 116.556 100.705 M 159 138.869 C 159 141.410, 156.948 154.779, 155.417 162.211 C 155.109 163.703, 152.640 167.697, 149.929 171.089 C 144.755 177.562, 144.292 179.094, 146.123 183.685 C 146.743 185.241, 147.196 191.421, 147.135 197.500 C 146.996 211.252, 148.264 215.857, 156.490 231.500 C 163.125 244.117, 164.300 247.672, 164.159 254.696 C 164.078 258.756, 164.303 259.114, 168.175 261.089 C 170.431 262.240, 174.439 265.344, 177.081 267.986 L 181.885 272.790 188.918 271.449 C 195.726 270.152, 196.275 269.819, 206.101 261.007 C 217.463 250.817, 222.398 247.288, 239 237.480 C 252.714 229.379, 269 218.220, 269 216.925 C 269 216.416, 266.953 216, 264.450 216 C 255.098 216, 247 208.080, 247 198.935 C 247 196.030, 246.941 196, 241.250 195.988 C 231.101 195.967, 220.664 192.156, 213.477 185.846 C 209.496 182.350, 198.647 166.403, 194.505 157.958 C 191.857 152.557, 191.699 152.436, 181.667 148.103 C 170.318 143.201, 164.181 139.635, 163.345 137.457 C 163.038 136.656, 161.934 136, 160.893 136 C 159.476 136, 159 136.721, 159 138.869" stroke="none" fill="#242c3c" fill-rule="evenodd"></path></svg>                     
</div>
                    <select name="wilaya" id="opc_wilaya" class="w-full border border-gray-300 rounded-lg py-3 ps-12 text-sm appearance-none bg-white disabled:bg-gray-100 disabled:cursor-not-allowed focus:ring-2 focus:ring-brand-black outline-none" required>
                        <option value="">اختر ولايتك</option>
                        <?php foreach ( $wilayas as $code => $name ) : ?>
                            <option value="<?php echo esc_attr( $code ); ?>"
                                data-home="<?php echo esc_attr( $prices[ $code ]['home']   ?? 400 ); ?>"
                                data-office="<?php echo esc_attr( $prices[ $code ]['office'] ?? 300 ); ?>">
                                <?php echo esc_html( sprintf( '%02d — %s', $code, $name ) ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="qmc-field relative">
                    <div class="absolute top-1/2 -translate-y-1/2 inset-s-3  pointer-events-none text-brand-black">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building2-icon lucide-building-2"><path d="M10 12h4"/><path d="M10 8h4"/><path d="M14 21v-3a2 2 0 0 0-4 0v3"/><path d="M6 10H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2"/><path d="M6 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16"/></svg>
                     </div>
                    <select name="commune" id="opc_commune" class="w-full border border-gray-300 rounded-lg py-3 ps-12 text-sm appearance-none bg-white focus:ring-2 focus:ring-brand-black outline-none" disabled required>
                       <option value="">اختر البلدية</option>
                    </select>
                </div>
            </div>

            <!-- Delivery type -->
            <div class="flex flex-col  items-start gap-2 py-2 border-t border-gray-50">
                <span class="text-[10px] text-gray-400 uppercase tracking-wider">مكان التوصيل</span>
                
                <label class="flex items-center gap-3 cursor-pointer group w-full justify-start">
                    <input type="radio" name="_qmc_delivery_ui" value="home" checked 
                    class="w-5 h-5  accent-brand-black focus:ring-brand-black border-gray-300">
                    <span class="text-sm font-semibold text-gray-700">للمنزل</span>
                </label>
                
                <label class="flex items-center gap-3 cursor-pointer group w-full justify-start">
                    <input type="radio" name="_qmc_delivery_ui" value="office" 
                    class="w-5 h-5  accent-brand-black focus:ring-brand-black border-gray-300">
                    <span class="text-sm font-semibold text-gray-700 ">لمكتب التوصيل</span>
                </label>
            </div>

<?php if ( $product->is_type( 'variable' ) ) : ?>
<div class="flex flex-col gap-4 py-2 border-t border-gray-100">
    <?php
    $attributes = $product->get_variation_attributes();
    foreach ( $attributes as $attr_name => $options ) :
        $attr_label = wc_attribute_label( $attr_name );
        $attr_key   = 'attribute_' . sanitize_title( $attr_name );
        $is_color   = preg_match( '/color|colour|loun|لون/i', $attr_name );
    ?>
    <div class="flex flex-col gap-2">

        <div class="flex items-center gap-2">
            <span class="text-[10px] text-gray-400 uppercase tracking-wider">
                <?php echo esc_html( $attr_label ); ?>
            </span>
            <span class="qmc-attr-label text-[10px] font-semibold text-gray-800"
                  data-attr="<?php echo esc_attr( $attr_key ); ?>"></span>
        </div>

        <div class="qmc-attr-options flex flex-wrap gap-2"
             data-attr="<?php echo esc_attr( $attr_key ); ?>">

            <?php foreach ( $options as $opt ) :
                $term  = get_term_by( 'slug', $opt, $attr_name );
                $label = $term ? $term->name : $opt;
                $color = $term
                       ? get_term_meta( $term->term_id, 'product_attribute_color', true )
                       : '';

                if ( $is_color && $color ) : ?>

                    <!-- Color swatch — round filled circle -->
                    <button type="button"
                       data-value="<?php echo esc_attr( $opt ); ?>"
                       data-label="<?php echo esc_attr( $label ); ?>"
                       title="<?php echo esc_attr( $label ); ?>"
                       style="background-color:<?php echo esc_attr( $color ); ?>;"
                       class="qmc-swatch w-9 h-9 rounded-full border-2 border-white
                              ring-2 ring-gray-200 hover:ring-gray-400
                              aria-pressed:swatch-active
                              transition-all duration-200 cursor-pointer"
                       aria-pressed="false">
                   </button>

                <?php elseif ( $is_color ) : ?>

                    <!-- Color swatch fallback — no hex available -->
                    <button type="button"
                        data-value="<?php echo esc_attr( $opt ); ?>"
                        data-label="<?php echo esc_attr( $label ); ?>"
                        title="<?php echo esc_attr( $label ); ?>"
                        class="qmc-swatch px-3 py-1 rounded-full text-xs font-semibold
                               border border-gray-300 bg-white text-gray-700
                               hover:border-gray-400
                               aria-pressed:btn-active
                               transition-all duration-200 cursor-pointer"
                        aria-pressed="false">
                        <?php echo esc_html( $label ); ?>
                    </button>

                <?php else : ?>

                    <!-- Size / generic attribute button -->
                    <button type="button"
                    data-value="<?php echo esc_attr( $opt ); ?>"
                    data-label="<?php echo esc_attr( $label ); ?>"
                    class="qmc-size-btn min-w-[2.75rem] h-10 px-3
                           flex items-center justify-center
                           rounded-lg border border-gray-300 bg-white
                           text-sm font-bold text-gray-700
                           hover:border-gray-400
                           aria-pressed:btn-active
                           transition-all duration-200 cursor-pointer"
                    aria-pressed="false">
                    <?php echo esc_html( strtoupper( $label ) ); ?>
                </button>

                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <input type="hidden" class="qmc-attr-val"
               name="<?php echo esc_attr( $attr_key ); ?>"
               data-attr="<?php echo esc_attr( $attr_key ); ?>"
               value="">
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

            <!-- Summary -->
            <div class="qmc-summary flex flex-col gap-1">
                <div class="flex justify-between">
                    <span class="qmc-sum-key">سعر التوصيل</span>
                    <span class="qmc-sum-val qmc-shipping-val bg-brand-black/90 text-white text-sm p-1 rounded-xl">اختر الولاية </span>
                </div>
                <div class="flex justify-between">
                    <span class="qmc-sum-key">سعر المنتجات</span>
                    <span class="qmc-sum-val qmc-product-val "><?php echo number_format( floatval( $product->get_price() ), 0 ); ?> دج</span>
                </div>
                <div class="flex justify-between">
                    <span class="qmc-sum-key">التكلفة الإجمالية</span>
                    <span class="qmc-total-val text-green-500 font-black"><?php echo number_format( floatval( $product->get_price() ), 0 ); ?> دج</span>
                </div>
            </div>

            <div id="qmc-error" class="qmc-error hidden text-red-500 bg-red-50 border border-red-300 rounded-lg px-4 py-2 text-sm font-semibold text-center" style="display:none;"></div>

            <!-- Order row -->
            <div class="flex items-center gap-3 ">
                <div class=" flex items-center shrink-0">
                    <button type="button" class="w-10 h-10 text-3xl bg-white border border-brand-gray-800 rounded-lg cursor-pointer hover:bg-brand-gray-200 transition-all duration-300 ease-in-out " id="qmc-plus">+</button>
                    <span class="w-10 h-10 flex items-center justify-center" id="qmc-qty-display">1</span>
                    <button type="button" class="w-10 h-10 text-3xl bg-white border border-brand-gray-800 rounded-lg cursor-pointer hover:bg-brand-gray-200 transition-all duration-300 ease-in-out " id="qmc-minus">&#8722;</button>
                </div>
                <button type="submit" class="btn-primary  flex-1 sticky w-full text-lg rounded-2xl cursor-pointer" id="qmc-submit">
                    <span class="qmc-btn-txt">اطلب الآن</span>
                    <span class="qmc-btn-spin" style="display:none;">&#9203;</span>
                </button>
            </div>
        </form>

<!-- Success Message Container -->
<div id="qmc-success" style="display:none;" class="flex flex-col items-center justify-center text-center p-10 bg-white rounded-[30px]">
    
    <!-- Modern Animated Circle Check -->
    <div class="relative mb-8 animate-success">
        <!-- Outer Glow/Pulse -->
        <div class="absolute inset-0 rounded-full bg-green-500/20 animate-ping duration-300"></div>
        
        <!-- Main Circle -->
<div class="relative  rounded-full flex items-center justify-center  mx-auto">
    <svg xmlns="http://www.w3.org/2000/svg"
     width="30" height="30"
      viewBox="0 0 24 24" 
      fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round"
       stroke-linejoin="round" 
       class="lucide lucide-circle-check-big w-10 h-10 text-green-600">
        <path d="M21.801 10A10 10 0 1 1 17 3.335">
    </path><path d="m9 11 3 3L22 4"></path>
</svg>
</div>
    </div>

    <!-- Typography -->
    <h3 class="text-3xl font-black text-gray-900 mb-3 tracking-tight reveal-on-scroll">تم استلام طلبك!</h3>
    <p class="text-gray-500 max-w-[280px] mx-auto leading-relaxed mb-8 reveal-on-scroll">
تم تأكيد طلبك. سنتصل بك قريباً للتأكيد.  </p>

    <!-- Order Summary Badge -->
    <div class="inline-flex flex-col items-center bg-gray-50 border border-gray-100 rounded-2xl px-8 py-4 mb-10">
        <span class="text-[10px] uppercase tracking-[0.2em] text-gray-400 font-bold mb-1">رقم التتبع المحلي</span>
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
            <strong id="qmc-order-num" class="text-2xl font-mono text-brand-black">#----</strong>
        </div>
    </div>

    <!-- Primary Action -->
    <button onclick="window.location.href='<?php echo esc_url(wc_get_page_permalink('shop')); ?>'" 
            class="flex items-center justify-center  bg-brand-black text-white px-10 py-4 rounded-xl font-bold transition-all hover:bg-gray-800 active:scale-95 shadow-lg shadow-black/10 cursor-pointer">
                  تسوق المزيد
    </button>
</div>
    </div>
</div>



<script>
(function($){
    // جلب رابط AJAX ديناميكياً ليتوافق مع السيرفر المحلي أو الحي تلقائياً
    var ajaxUrl = '<?php echo admin_url("admin-ajax.php"); ?>';

    var OPC = {
        basePrice: <?php echo floatval($product->get_price()); ?>,
        qty: 1,
        shippingCost: 0,
        allCommunes: <?php echo json_encode(Algeria_Data::get_communes()); ?>,
        hasVariations: <?php echo $product->is_type('variable') ? 'true' : 'false'; ?>,
        selectedAttrs: {},

        fmt: function(n){
            return parseFloat(n).toLocaleString('ar-DZ', {maximumFractionDigits: 0}) + ' دج';
        },

        init: function(){
            this.bindWilaya();
            this.bindDelivery();
            this.bindQty();
            this.bindVariations();
            this.bindSubmit();
            this.updateTotals();
            
            if (this.hasVariations) {
                // الفحص المبدئي عند تحميل الصفحة لأول مرة
                this.updateSwatchesStockStatus();
            }
        },

        bindWilaya: function(){
            $(document).on('change', '#opc_wilaya', function(){
                var $opt = $(this).find('option:selected'), w = $(this).val();
                var $com = $('#opc_commune');
                $com.html('<option value="">اختر البلدية</option>');
                var list = (OPC.allCommunes && OPC.allCommunes[w]) ? OPC.allCommunes[w] : [];
                $.each(list, function(i, c){ $com.append($('<option>', {value: c, text: c})); });
                $com.prop('disabled', !list.length);
                OPC.updateShipping($opt);
            });
        },

        updateShipping: function($opt){
            var type = $('#opc_delivery_type').val() || 'home';
            if (!$opt || !$opt.val()){
                OPC.shippingCost = 0;
                $('.qmc-shipping-val').text('اختر الولاية ومكان التوصيل');
            } else {
                OPC.shippingCost = parseFloat($opt.data(type)) || 0;
                $('.qmc-shipping-val').text(OPC.fmt(OPC.shippingCost));
            }
            OPC.updateTotals();
        },

        bindDelivery: function(){
            $(document).on('change', 'input[name="_qmc_delivery_ui"]', function(){
                $('#opc_delivery_type').val($(this).val());
                OPC.updateShipping($('#opc_wilaya option:selected'));
            });
        },

        bindQty: function(){
            $('#qmc-minus').on('click', function(){ if (OPC.qty > 1){ OPC.qty--; OPC.syncQty(); } });
            $('#qmc-plus').on('click', function(){ OPC.qty++; OPC.syncQty(); });
        },

        syncQty: function(){
            $('#opc_quantity').val(OPC.qty);
            $('#qmc-qty-display').text(OPC.qty);
            OPC.updateTotals();
        },

        updateTotals: function(){
            var sub = OPC.basePrice * OPC.qty, total = sub + OPC.shippingCost;
            $('.qmc-product-val').text(OPC.fmt(sub));
            $('.qmc-total-val').text(OPC.fmt(total));
            $('.qmc-top-price').text(OPC.fmt(total));
        },

        bindVariations: function() {
            if (!OPC.hasVariations) return;

            $(document).on('click', '.qmc-swatch, .qmc-size-btn', function() {
                var $btn = $(this);
                // منع الضغط إذا كان الزر معطلاً أو نافداً
                if ($btn.prop('disabled') || $btn.hasClass('out-of-stock-x')) return;

                var $group = $btn.closest('.qmc-attr-options');
                var attr   = $group.data('attr'); // اسم الخاصية (مثال: attribute_pa_color)
                var val    = $btn.data('value');  // القيمة المحددة (مثال: blanc)
                var label  = $btn.data('label') || val;

                $group.find('.qmc-swatch').removeClass('swatch-active').attr('aria-pressed', 'false');
                $group.find('.qmc-size-btn').removeClass('btn-active').attr('aria-pressed', 'false');

                if ($btn.hasClass('qmc-swatch')) {
                    $btn.addClass('swatch-active');
                } else {
                    $btn.addClass('btn-active');
                }
                $btn.attr('aria-pressed', 'true');

                $('.qmc-attr-label[data-attr="' + attr + '"]').text('— ' + label);

                // حفظ الخيار الحالي داخل كائن الخصائص النشطة
                OPC.selectedAttrs[attr] = val;
                
                // تحديث حقول المدخلات المخفية
                var $hiddenInput = $('input.qmc-attr-val[data-attr="' + attr + '"]');
                if(!$hiddenInput.length) { $hiddenInput = $('input[name="' + attr + '"]'); }
                $hiddenInput.val(val).trigger('change');

                // مزامنة حقول ووكومرس الافتراضية إذا كانت موجودة بالصفحة
                var $wcForm = $('form.variations_form');
                if ($wcForm.length) {
                    var $sel = $wcForm.find('select[name="' + attr + '"]');
                    if ($sel.length) { $sel.val(val).trigger('change'); } 
                    else { OPC.resolveVariationAjax(); }
                } else {
                    OPC.resolveVariationAjax();
                }

                // الكود السحري: إعادة فحص المقاسات والخيارات الأخرى بناءً على هذا التحديد فوراً!
                OPC.updateSwatchesStockStatus();
            });
        },

        updateSwatchesStockStatus: function() {
            var $form = $('form.variations_form');
            var variations = $form.length ? $form.data('product_variations') : null;

            if (!variations) {
                variations = $('[data-product_variations]').data('product_variations');
            }

            if (!variations || !variations.length) return;

            // أخذ نسخة من الخيارات المحددة حالياً من طرف الزبون
            var currentSelected = $.extend({}, OPC.selectedAttrs);

            // المرور على مجموعات الخصائص (مجموعة الألوان، ومجموعة المقاسات)
            $('.qmc-attr-options').each(function() {
                var $container = $(this);
                var attrKey = $container.data('attr'); 

                $container.find('.qmc-swatch, .qmc-size-btn').each(function() {
                    var $button = $(this);
                    var buttonVal = $button.data('value');

                    // اختبار افتراضي: كأن العميل قام باختيار هذا الزر بالتحديد
                    var testSelected = $.extend({}, currentSelected);
                    testSelected[attrKey] = buttonVal;

                    var isAvailable = false;

                    // مطابقة هذا الاختيار الافتراضي مع البيانات الفعلية للمخزن القادمة من ووردبريس
                    variations.forEach(function(variation) {
                        var match = true;

                        for (var key in testSelected) {
                            if (variation.attributes[key] !== undefined && 
                                variation.attributes[key] !== "" && 
                                variation.attributes[key] !== testSelected[key]) {
                                match = false;
                            }
                        }

                        // إذا كان المقاس متوافقاً مع اللون المختار، نفحص كميته في قاعدة البيانات
                        if (match) {
                            if (variation.is_purchasable && variation.is_in_stock) {
                                // التحقق من أن الكمية ليست صفراً وليست سالبة (مثل حالة الـ -6 لديك)
                                if (variation.max_qty !== 0 && variation.max_qty !== null) {
                                    if (variation.max_qty > 0 || variation.max_qty === "") {
                                        isAvailable = true;
                                    }
                                }
                            }
                        }
                    });

                    // التعامل البصري الفوري وتجميد الزر في حال النفاد
                    if (!isAvailable) {
                        $button.prop('disabled', true);
                        $button.addClass('out-of-stock-x');
                        $button.attr('aria-disabled', 'true');
                        
                        $button.css({
                            'position': 'relative',
                            'opacity': '0.3',
                            'pointer-events': 'none',
                            'cursor': 'not-allowed',
                            'background-color': '#f3f4f6',
                            'color': '#9ca3af',
                            'border-color': '#e5e7eb'
                        });

                        // إضافة خط الـ X ديناميكياً عبر الجافا سكريبت للتأكيد
                        if (!$button.find('.x-line').length) {
                            $button.append('<span class="x-line" style="position: absolute; top: 50%; left: 0; width: 100%; height: 1.5px; background: #ef4444; transform: rotate(-45deg); display: block; pointer-events: none;"></span>');
                        }
                        
                        // إذا تم إلغاء الخيار النشط حالياً لأنه نفد، نقوم بإلغاء تحديده كأكتيف
                        if ($button.hasClass('swatch-active') || $button.hasClass('btn-active')) {
                            $button.removeClass('swatch-active btn-active').attr('aria-pressed', 'false');
                            delete OPC.selectedAttrs[attrKey];
                        }
                    } else {
                        // إرجاع الزر للوضعية النشطة والطبيعية في حال توفره
                        $button.prop('disabled', false);
                        $button.removeClass('out-of-stock-x');
                        $button.attr('aria-disabled', 'false');
                        $button.css({
                            'opacity': '1',
                            'pointer-events': 'auto',
                            'cursor': 'pointer',
                            'background': '',
                            'color': '',
                            'border-color': ''
                        });
                        $button.find('.x-line').remove();
                    }
                });
            });
        },

        resolveVariationAjax: function(){
            var productId = $('[name="product_id"]').val();
            var data = { action: 'woocommerce_get_variation', product_id: productId };
            $.each(OPC.selectedAttrs, function(attr, val){ data[attr] = val; });

            $.post(ajaxUrl, data, function(variation){
                if (variation && variation.variation_id){
                    $('#opc_variation_id').val(variation.variation_id);
                    if (variation.display_price){
                        OPC.basePrice = parseFloat(variation.display_price);
                        OPC.updateTotals();
                    }
                } else {
                    $('#opc_variation_id').val('');
                }
            }, 'json');
        },

        bindSubmit: function(){
            $('#qmc-form').on('submit', function(e){
                e.preventDefault();
                var ok = true;
                
                if (OPC.hasVariations){
                    var totalAttrs = $('.qmc-attr-options').length;
                    var selectedCount = Object.keys(OPC.selectedAttrs).length;
                    if (selectedCount < totalAttrs || !$('#opc_variation_id').val()){
                        ok = false;
                        alert('الرجاء اختيار مواصفات متوفرة للمنتج');
                    }
                }
                if (ok) OPC.submit();
            });
        },

        submit: function(){
    var $btn = $('#qmc-submit');
    $btn.prop('disabled', true);
    
    // إظهار سبينر التحميل إن وُجد
    $('.qmc-btn-txt').hide();
    $('.qmc-btn-spin').show();
    
    $.post(ajaxUrl, {
        action: 'algeria_opc_order',
        nonce: $('[name="opc_nonce"]').val(),
        product_id: $('[name="product_id"]').val(),
        variation_id: $('#opc_variation_id').val(),
        quantity: $('#opc_quantity').val(),
        first_name: $('[name="full_name"]').val(),
        phone: $('#opc_phone').val(),
        wilaya: $('#opc_wilaya').val(),
        commune: $('#opc_commune').val(),
        delivery_type: $('#opc_delivery_type').val()
    }, function(r){
        if (r.success){
            // 1. إخفاء نموذج الطلب تماماً
            $('#qmc-form').hide(); 
            $('#qmc-title').hide();
            
            // 2. تحديث رقم الطلب داخل حاوية النجاح إن وُجدت
            if(r.data && (r.data.order_number || r.data.order_id)) {
                $('#qmc-order-num').text(r.data.order_number || r.data.order_id);
            }
            
            // 3. إظهار حاوية رسالة الشكر (Thank You Page / Section)
            $('#qmc-success').show(); 
            
            // 4. التحديث الذكي للمخزن في الخلفية بدون عمل ريفريش يفسد تجربة المستخدم
            // نقوم بإنقاص الكمية محلياً في مصفوفة الجافا سكريبت للتشكيلة المختار حالياً
            var currentVarId = $('#opc_variation_id').val();
            var $form = $('form.variations_form');
            var variations = $form.length ? $form.data('product_variations') : null;
            if (!variations) { variations = $('[data-product_variations]').data('product_variations'); }
            
            if (variations && currentVarId) {
                variations.forEach(function(v) {
                    if (v.variation_id == currentVarId) {
                        if (v.max_qty !== "" && v.max_qty !== null) {
                            v.max_qty = v.max_qty - OPC.qty; // إنقاص الكمية المطلوبة
                            if(v.max_qty <= 0) {
                                v.is_in_stock = false;
                            }
                        }
                    }
                });
                // إعادة تشغيل فحص الأزرار لتقفل التشكيلة التي نفدت فوراً أمام العميل وهو في صفحة النجاح
                OPC.updateSwatchesStockStatus();
            }

        } else {
            alert(r.data || 'حدث خطأ أثناء إرسال الطلب');
            $btn.prop('disabled', false);
            $('.qmc-btn-txt').show();
            $('.qmc-btn-spin').hide();
        }
    }).fail(function(){
        alert('فشل الاتصال بالسيرفر، يرجى المحاولة مرة أخرى');
        $btn.prop('disabled', false);
        $('.qmc-btn-txt').show();
        $('.qmc-btn-spin').hide();
    });
}
    };

    $(document).ready(function(){ OPC.init(); });
})(jQuery);
</script>