// 1. Register new endpoint
// Note: Resave Permalinks or it will give 404 error  
function QuadLayers_add_support_endpoint() {
    add_rewrite_endpoint( 'support', EP_ROOT | EP_PAGES );
}  
add_action( 'init', 'QuadLayers_add_support_endpoint' );  
// ------------------
// 2. Add new query
function QuadLayers_support_query_vars( $vars ) {
    $vars[] = 'support';
    return $vars;
}  
add_filter( 'query_vars', 'QuadLayers_support_query_vars', 0 );  
// ------------------
// 3. Insert the new endpoint 
function QuadLayers_add_support_link_my_account( $items ) {
    $items['support'] = 'Support ™';
    return $items;
}  
add_filter( 'woocommerce_account_menu_items', 'QuadLayers_add_support_link_my_account' );
// ------------------
// 4. Add content to the new endpoint  
function QuadLayers_support_content() {
echo '<h3>Support</h3><p>Welcome to the support area. As a premium customer, manage your support tickets from here, you can submit a ticket if you have any issues with your website. We\'ll put our best to provide you with a fast and efficient solution</p>';
echo do_shortcode( '[tickets-shortcode]' );
echo do_shortcode( '[wpforms id="1082"]' );
}  
add_action( 'woocommerce_account_support_endpoint', 'QuadLayers_support_content' );
