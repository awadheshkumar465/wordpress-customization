<?php
function twentyseventeen_child_enqueue_styles() {
    
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.css' );
    wp_enqueue_style( 'font-awesome-min-style', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
    wp_enqueue_style( 'jquery-singlefull-style', get_stylesheet_directory_uri() . '/css/jquery.singlefull.css' );
    wp_enqueue_style( 'lightbox-style', get_stylesheet_directory_uri() . '/css/lightbox.css' );
    wp_enqueue_style( 'responsive-style', get_stylesheet_directory_uri() . '/css/responsive.css' );
    wp_enqueue_style( 'style-style', get_stylesheet_directory_uri() . '/css/dev_style.css' );
    wp_enqueue_style( 'fonts/fonts-c-css', get_stylesheet_directory_uri() . '/fonts/fonts-c.css' );

    /**script**/
    wp_enqueue_script( 'jquery-min-script', get_stylesheet_directory_uri() . '/js/jquery-1.12.3.min.js' );
    wp_enqueue_script( 'lightbox-plus-jquery-min-script', get_stylesheet_directory_uri() . '/js/lightbox-plus-jquery.min.js' );
    wp_enqueue_script( 'jquery-easing-min-script', get_stylesheet_directory_uri() . '/js/jquery.easing.min.js' );
    wp_enqueue_script( 'jquery-singlefull-script', get_stylesheet_directory_uri() . '/js/jquery.singlefull.js' );
    wp_enqueue_script( 'bootstrap-min-script', get_stylesheet_directory_uri() . '/js/bootstrap.min.js' );
    wp_enqueue_script( 'bootstrap-bundle-min-script', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js' );
}   
add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_enqueue_styles' );
    
/**register widgets**/
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Copy Right'),
        'id' => 'copyright-sidebar',
        'description' => __( '' ),
        'before_widget' => '',
	    'after_widget'  => '',
	    'before_title'  => '',
	    'after_title'   => '',
	) );
}





/** Step 2 (from text above). */
add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
    add_options_page( 'Justtannoor Options', 'Justtannoor Setting', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

/** Step 3. */
function my_plugin_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    $account_name = get_option( 'account_name' );
    $account_number = get_option( 'account_number' );
    $bank_name = get_option( 'bank_name' );
    $iban = get_option( 'iban' );
    //$bic_swift = get_option( 'bic_swift' );
    //$ifsc_code = get_option('ifsc_code');
    ?>
    <div class="container">
        <h1>Justtannoor Options</h1>
        <form class="form-horizontal" id="ach-form" action="" method="POST">
            <formset class="bank-account-details" style="float: left; padding: 1%; background-color: #fff; width: 96%;">
                <h2>Bank Account Details</h2>
                <div class="control-group">
                    <label class="control-label" for="name" style="width:  150px; float: left;">Account HolderName</label>
                    <input type="text" name="account_name" autofocus="autofocus" style="width: 400px;" value="<?php echo $account_name; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="routing_number" style="width:  150px; float: left;">Account Number</label>
                    <input type="text" name="account_number" style="width: 400px;" value="<?php echo $account_number; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="account_number" style="width:  150px; float: left;">Bank Name</label>
                    <input type="text" name="bank_name" style="width: 400px;" class="input-medium" value="<?php echo $bank_name; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="type" style="width:  150px; float: left;">IBAN</label>
                    <input type="text" name="iban" class="input-medium" style="width: 400px;" value="<?php echo $iban; ?>">
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="submit" value="Save" class="btn" style="width:  100px; margin-top: 3%; font-size: 18px;">
                    </div>
                </div>
            </formset>
        </form>
        <?php
        if($_POST){
            if(!empty($_POST['submit'])){
                $account_name = $_POST['account_name'];
                $account_number = $_POST['account_number'];
                $bank_name = $_POST['bank_name'];
                $iban = $_POST['iban'];
                update_option( 'account_name', $account_name );
                update_option( 'account_number', $account_number );
                update_option( 'bank_name', $bank_name );
                update_option( 'iban', $iban );
            }
        } ?>
    </div>
    <?php
    $sun_to_wed_order_limit = get_option( 'sun_to_wed_order_limit' );
    $thu_to_sat_order_limit = get_option( 'thu_to_sat_order_limit' );
    $pickup_order_limit = get_option('pickup_order_limit');
    $delivery_order_limit = get_option('delivery_order_limit');
    $per_kilometre_delivery_charge = get_option('per_kilometre_delivery_charge');
    $fix_kilometre_delivery_charge = get_option('fix_kilometre_delivery_charge');
    $latitude = get_option('latitude');
    $longitude = get_option('longitude');
    $admin_mobile_number = get_option('admin_mobile_number');
    $admin_email_address = get_option('admin_email_address');
    $admin_message = get_option('admin_message');
    $fix_discount_price = get_option('fix_discount_price');
    $total_offer_discount = get_option('total_offer_discount');
    $minimum_order = get_option('minimum_order');
    $admin_multiple_email = get_option('admin_multiple_email');
    ?>
    <div class="container" style="float:  left; width: 100%;">
        <form class="form-horizontal" id="order_setting" action="" method="POST" style="margin-top: 2%;">
            <formset class="bank-account-details" style="float: left; padding: 1%; background-color: #fff; width: 96%;">
                <h2>Order Setting</h2>
                <div class="control-group">
                    <label class="control-label" for="name" style="width:  190px; float: left;">Sunday to Wednesday</label>
                    <input type="text" name="sun_to_wed_order_limit" autofocus="autofocus" style="width: 400px;" value="<?php echo $sun_to_wed_order_limit; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="routing_number" style="width:  190px; float: left;">Thursday to Saturday</label>
                    <input type="text" name="thu_to_sat_order_limit" style="width: 400px;" value="<?php echo $thu_to_sat_order_limit; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="routing_number" style="width:  190px; float: left;">Pickup Order Limit</label>
                    <input type="text" name="pickup_order_limit" style="width: 400px;" value="<?php echo $pickup_order_limit; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="routing_number" style="width:  190px; float: left;">Delivery Order Limit</label>
                    <input type="text" name="delivery_order_limit" style="width: 400px;" value="<?php echo $delivery_order_limit; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="routing_number" style="width:  190px; float: left;">Per Kilometre Delivery Charge</label>
                    <input type="text" name="per_kilometre_delivery_charge" style="width: 400px;" value="<?php echo $per_kilometre_delivery_charge; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="routing_number" style="width:  190px; float: left;">Fix 30 Kilometre Delivery Charge </label>
                    <input type="text" name="fix_kilometre_delivery_charge" style="width: 400px;" value="<?php echo $fix_kilometre_delivery_charge; ?>">
                </div>
                <h2>Map Setting</h2>
                <div class="control-group">
                    <label class="control-label" for="latitude" style="width:  190px; float: left;">Latitude</label>
                    <input type="text" name="latitude" style="width: 400px;" value="<?php echo $latitude; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="longitude" style="width:  190px; float: left;">Longitude</label>
                    <input type="text" name="longitude" style="width: 400px;" value="<?php echo $longitude; ?>">
                </div>
                <!-- 01-10-2018 add extra information for Cash OnDelevery Information Start  -->
                <h2>Cash on delivery Information</h2>
                <div class="control-group">
                    <label class="control-label" for="mobile_number" style="width:  190px; float: left;">Mobile Number</label>
                    <input type="text" name="admin_mobile_number" style="width: 400px;" value="<?php echo $admin_mobile_number; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="email_address" style="width:  190px; float: left;">Email Address</label>
                    <input type="text" name="admin_email_address" style="width: 400px;" value="<?php echo $admin_email_address; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="message" style="width:  190px; float: left;">Message</label>
                    <textarea name="admin_message" style="width: 400px;"><?php echo $admin_message; ?></textarea>
                </div>
                <!-- 01-10-2018 add extra information for Cash OnDelevery Information End  -->
                <!-- 10-10-2018 add extra information for Total Discount Price Start  -->
                <h2>Total Discount Price</h2>
                <div class="control-group">
                    <label class="control-label" for="fix_discount_price" style="width:  190px; float: left;">Discount Price</label>
                    <input type="text" name="fix_discount_price" style="width: 400px;" value="<?php echo $fix_discount_price; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="total_offer_discount" style="width:  190px; float: left;">Total Offer Percentage</label>
                    <input type="text" name="total_offer_discount" style="width: 400px;" value="<?php echo $total_offer_discount; ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="minimum_order" style="width:  190px; float: left;">Minimum Order Price</label>
                    <input type="text" name="minimum_order" style="width: 400px;" value="<?php echo $minimum_order; ?>">
                </div>
                <!-- 10-10-2018 add extra information for Total Discount Price End  -->

                <!-- 22-10-2018 add extra field for admin email address Start-->
                <h2>Admin Email Address</h2>
                <div class="control-group">
                    <label class="control-label" for="admin_multiple_email" style="width:  190px; float: left;">Enter Email Address</label>
                    <input type="text" name="admin_multiple_email" style="width: 400px;" value="<?php echo $admin_multiple_email; ?>">
                    <br>
                    <span style="color:#0073aa; margin-left:17%;">Please use comma separate for multiple email.</span>
                </div>
                <!-- 22-10-2018 add extra field for admin email address End-->
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="order_setting" value="Save" class="btn" style="width:  100px; margin-top: 3%; font-size: 18px;">
                    </div>
                </div>
            </formset>
        </form>
        <?php
        if($_POST){
            if(!empty($_POST['order_setting'])){
                $sun_to_wed_order_limit = $_POST['sun_to_wed_order_limit'];
                $thu_to_sat_order_limit = $_POST['thu_to_sat_order_limit'];
                $pickup_order_limit = $_POST['pickup_order_limit'];
                $delivery_order_limit = $_POST['delivery_order_limit'];
                $per_kilometre_delivery_charge = $_POST['per_kilometre_delivery_charge'];
                $fix_kilometre_delivery_charge = $_POST['fix_kilometre_delivery_charge'];
                $latitude = $_POST['latitude'];
                $longitude = $_POST['longitude'];
                $admin_mobile_number = $_POST['admin_mobile_number'];
                $admin_email_address = $_POST['admin_email_address'];
                $admin_message = $_POST['admin_message'];
                $fix_discount_price = $_POST['fix_discount_price'];
                $total_offer_discount = $_POST['total_offer_discount'];
                $minimum_order = $_POST['minimum_order'];
                $admin_multiple_email = $_POST['admin_multiple_email'];

                update_option( 'sun_to_wed_order_limit', $sun_to_wed_order_limit );
                update_option( 'thu_to_sat_order_limit', $thu_to_sat_order_limit );
                update_option('pickup_order_limit',$pickup_order_limit);
                update_option('delivery_order_limit',$delivery_order_limit);
                update_option('per_kilometre_delivery_charge',$per_kilometre_delivery_charge);
                update_option('fix_kilometre_delivery_charge',$fix_kilometre_delivery_charge);
                update_option('latitude',$latitude);
                update_option('longitude',$longitude);
                update_option('admin_mobile_number',$admin_mobile_number);
                update_option('admin_email_address',$admin_email_address);
                update_option('admin_message',$admin_message);
                update_option('fix_discount_price',$fix_discount_price);
                update_option('total_offer_discount',$total_offer_discount);
                update_option('minimum_order',$minimum_order);
                update_option('admin_multiple_email',$admin_multiple_email);

            }
        } ?>
    </div>

<?php }







function product_remove_cart_section_ajax($cart_id){
    global $wpdb;
    if(isset($_POST['main_cartid'])){
        $cart_id = $_POST['main_cartid'];
        $sql = "DELETE FROM wp_sale_product_cart WHERE id = $cart_id"; 
        $result = $wpdb->query($sql);
        die();
    }
}
add_action('wp_ajax_product_remove_cart_section', 'product_remove_cart_section_ajax');
add_action('wp_ajax_nopriv_product_remove_cart_section', 'product_remove_cart_section_ajax');




add_role('workers', __(
    'Workers'),
    array(
        'read'              => true, // Allows a user to read
        'create_posts'      => false, // Allows user to create new posts
        'edit_posts'        => false, // Allows user to edit their own posts
        'edit_others_posts' => false, // Allows user to edit others posts too
        'publish_posts'     => false, // Allows the user to publish posts
        'manage_categories' => false, // Allows user to manage post categories
        )
);







function my_special_add_to_cart(){
global $wpdb;
$res = '';              

if(isset($_POST['product_ids']) && isset($_POST['product_name']) && isset($_POST['regular_price']) && isset($_POST['sale_price']) && isset($_POST['colorname']) && isset($_POST['quantity']))
{
    $product_ids = $_POST['product_ids'];
    $product_name = $_POST['product_name'];
    $regular_price = $_POST['regular_price'];
    $sale_price = $_POST['sale_price'];
    $colorname = $_POST['colorname'];
    $quantity = $_POST['quantity'];
    $user_id = $visitor_id = '';
    if(is_user_logged_in()){
        $user_id = get_current_user_id();
    }
    else
    {
        if($_SESSION['visitor_id']){
            
            $visitor_id = $_SESSION['visitor_id'];
            
        }else{
            $visitor_id = md5(rand());
            $_SESSION['visitor_id'] = $visitor_id;
        }
        
    }
    $table = $wpdb->prefix.'sale_product_cart';

    $sql = "INSERT INTO $table (user_id, product_id, visitor_id, product_name, regular_price, sale_price, color_name, quantity) VALUES ($user_id, $product_ids, '$visitor_id', '$product_name', $regular_price, $sale_price, '$colorname', $quantity)"; 
        $result = $wpdb->query($sql);
        $my_id = $wpdb->insert_id;
        echo site_url('sale-cart');
    
    die();
} // end if
    

    
}
add_action('wp_ajax_my_special_add_to_cart', 'my_special_add_to_cart');
add_action('wp_ajax_nopriv_my_special_add_to_cart', 'my_special_add_to_cart');//for users that are not logged in.




add_action('admin_menu', 'wpdocs_register_my_custom_submenu_page');

function wpdocs_register_my_custom_submenu_page() {
    add_submenu_page(
        'edit.php?post_type=saleproduct',
        'Product Order Listing',
        'Product Order Listing',
        'manage_options',
        'my-custom-submenu-page',
        'wpdocs_my_custom_submenu_page_callback'
         );
    /* add product Order View Page in admin section 24-08-2018 */
    add_submenu_page(
        'edit.php?post_type=saleproduct',
        "Package Layout Setting", 
        "Product Order View", 
        "manage_options", 
        "product-order-view", 
        "product_order_view_layout"
    );
    /* End 24-08-2018 */
}

function wpdocs_my_custom_submenu_page_callback() { ?>
    <?php global $wpdb; ?>
    <div class="container product-order-listing">
        <h2>All Orders</h2>                     
        <div class="table-responsive">          
            <table class="table">
                <thead>
                    <tr>
                        <th class="order-id">Order ID</th>
                        <th class="muname">UserName</th>
                        <th class="memail">Email Address</th>
                        <th class="baddress">Billing Address</th>
                        <th class="pcode">Delivery Type</th>
                        <th class="pcode">Delivery Date</th>
                        <th class="pcode">Delivery Time</th>
                        <th class="odate">Order Date</th>
                        <th class="slip_image">Slip Image</th>
                        <th class="ostatus">Status</th>
                        <th class="oaction">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $screen = get_current_screen();
                    $bkurl=admin_url().$screen->parent_file.'&page=my-custom-submenu-page';
                    $order_edit_url =admin_url().$screen->parent_file.'&page=my-product-order-edit-page';
                    $order_view_url =admin_url().$screen->parent_file.'&page=product-order-view';
                
                    $limit = 18;  
                    if (isset($_GET["paged"])) { $paged  = $_GET["paged"]; } else { $paged=1; };  
                    $paged;
                    $start_from = ($paged-1) * $limit;
                    $sql = "SELECT * FROM wp_sale_product_order ORDER BY created_at DESC  LIMIT $start_from, $limit";
                    $allorders = $wpdb->get_results($sql) or die(mysql_error());
                    foreach ($allorders as $allorder) {
                       $order_id = $allorder->order_id;
                       $product_id = $allorder->product_id;
                       $price = $allorder->price;
                       $price = number_format($price, 2);
                       $status = $allorder->status;
                       if($status == 1){
                            $status = "Completed"; 
                       }
                       elseif ($status == 2) {
                           $status = "Processing";
                       }
                       elseif ($status == 3) {
                            $status = "On hold";
                       }
                       elseif ($status == 4) {
                            $status = "Cancelled";
                       }
                       elseif ($status == 5) {
                            $status = "Refunded";
                       }
                       else{
                            $status = "Failed";
                        }
                       ?>
                       <tr>
                        <td><?php echo $allorder->order_id; ?></td>
                        <td><?php echo ucfirst($allorder->user_name); ?></td>
                        <td><?php echo $allorder->email_address; ?></td>
                        <td><?php echo $allorder->address; ?></td>
                        <td><?php echo $allorder->delivery_type; ?></td>
                        <td><?php echo $allorder->delivery_date; ?></td>
                        <td><?php echo $allorder->delivery_time; ?></td>
                        <td><?php echo $allorder->created_at; ?></td>
                        <td class="slip_img">
                            <img src="<?php echo $path = site_url(); ?>/webapi/uploads/<?php echo $allorder->image_upload; ?>" alt="" />
                        </td>
                        <td><?php echo ucfirst($status); ?></td>
                        <td class="action">
                            <a href="<?php echo $order_view_url;?>&productorderid=<?php echo $allorder->order_id; ?>">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/view.png">
                            </a>
                             <a href="<?php echo $order_edit_url;?>&productorder=<?php echo $allorder->id; ?>">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/edit.png">
                            </a>
                            <button id="delete_product_order_btn" class="delete_product_order" title="<?php echo $allorder->id; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/delete.png"></button>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php  
            $sqlNew = "SELECT * FROM wp_sale_product_order"; 
			
            $allorders = $wpdb->get_results($sqlNew);  
            
			$total_records = count($allorders);
            
            $total_pages = ceil($total_records / $limit);  
            $pagLink = "<div class='pagination'>";  
                for ($i=1; $i<=$total_pages; $i++) {  
                    $active = '';
                    if(isset($_GET['paged']) && $i == $_GET['paged'])
                    {
                        $active = 'active';        
                    }
                    $pagLink .= "<a href='". $bkurl."&paged=".$i."' class=".$active.">".$i."</a>";  
                };  
            echo $pagLink . "</div>";  
            ?>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
        jQuery('.delete_product_order').click(function(){
        var order_id = jQuery(this).attr('title');
        jQuery.ajax({
                    url:"<?php echo admin_url('admin-ajax.php'); ?>",
                    type:'POST',
                    data:'action=delete_product_order&main_product_order_id=' + order_id,
                    success:function(results)
                         {
                            //alert(results);
                            window.location.href = results;
                            
                        }
                });
        });
    });
    </script>
<?php } 



function delete_product_order($order_id){
    global $wpdb;
    if(isset($_POST['main_product_order_id'])){
        $order_id = $_POST['main_product_order_id'];
        $sql = "DELETE FROM wp_sale_product_order WHERE id = $order_id"; 
        $results = $wpdb->query($sql);
        die();
    }
}
add_action('wp_ajax_delete_product_order', 'delete_product_order');
add_action('wp_ajax_nopriv_delete_product_order', 'delete_product_order');





add_action('admin_menu', 'wpdocs_register_my_custom_product_order_edit_page');
function wpdocs_register_my_custom_product_order_edit_page() {
    add_submenu_page(
        'edit.php?post_type=saleproduct',
        'Edit Product Order',
        'Edit Product Order',
        'manage_options',
        'my-product-order-edit-page',
        'product_order_edit_submenu_page_callback'
         );
}

function product_order_edit_submenu_page_callback() { ?>
    <?php 
    global $wpdb;
    $order_id = $_GET['productorder'];
    $myordervalues = $wpdb->get_results("SELECT * FROM wp_sale_product_order WHERE id = '$order_id'");
    //print_r($myordervalues);
    foreach ($myordervalues as $myordervalue) {
        $product_id = $myordervalue->product_id;
        $product_price = $myordervalue->price;
        $product_quantity = $myordervalue->quantity;
        $order_date = $myordervalue->created_at;
        $payment_type = $myordervalue->payment_type;
        $user_name = $myordervalue->user_name;  
        $phone = $myordervalue->phone;
        $email_address = $myordervalue->email_address;
        $address = $myordervalue->address;
        $delivery_type = $myordervalue->delivery_type;
        $delivery_date = $myordervalue->delivery_date;
        $delivery_time = $myordervalue->delivery_time;
        $status = $myordervalue->status;
        if($status == 0){
            $status = "Failed";
        }
        elseif($status == 1){
            $status = "Completed";
        }
        elseif ($status == 2) {
            $status = "Processing";
        }
        elseif ($status == 3) {
            $status = "On hold";
        }
        elseif ($status == 4) {
            $status = "Cancelled";
        }
        elseif ($status == 5) {
            $status = "Refunded";
        }
        else{
            //$status = "Not Selected";
        }
    }
     ?>
    <div class="order-edit">
    <h2>Edit Order</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>UserName</label>
            <input type="text" name="user_name" value="<?php echo $user_name; ?>">
        </div>
        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group">
            <label>Email Address</label>
            <input type="text" name="email_address" value="<?php echo $email_address; ?>">
        </div>
        <div class="form-group">
            <label>Billing Address</label>
            <input type="text" name="address" value="<?php echo $address; ?>">
        </div>
        <div class="form-group">
            <label>Delivery Type</label>
            <input type="text" name="delivery_type" value="<?php echo $delivery_type; ?>">
        </div>
        <div class="form-group">
            <label>Delivery Date</label>
            <input type="date" name="delivery_date" value="<?php echo $delivery_date; ?>">
        </div>
        <div class="form-group">
            <label>Delivery Time</label>
            <input type="time" name="delivery_time" value="<?php echo $delivery_time; ?>">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select id="order_status" name="status" tabindex="-1" aria-hidden="true">
                <?php if($status == "Failed" || $status == "Completed" || $status == "Processing" || $status == "On hold" || $status == "Cancelled" || $status == "Refunded"){ ?>
                    <option value="<?php echo $myordervalue->status; ?>" selected="selected"><?php echo ucfirst($status); ?></option>
                <?php } ?>
                <option value="0">Failed</option>
                <option value="1">Completed</option>
                <option value="2">Processing</option>
                <option value="3">On hold</option>
                <option value="4">Cancelled</option>
                <option value="5">Refunded</option>

            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="submit">
        </div>
    </form>
    </div>
<?php
    
    if($_POST){
        if(!empty($_POST['submit'])){
            $user_name = $_POST['user_name'];
            $phone = $_POST['phone'];
            $email_address = $_POST['email_address'];
            $address = $_POST['address'];
            $delivery_type = $_POST['delivery_type'];
            $delivery_date = $_POST['delivery_date'];
            $delivery_time = $_POST['delivery_time'];
            $status = $_POST['status'];
            $order_update = $wpdb->update( 
                        'wp_sale_product_order', 
                        array( 
                            'user_name' => $user_name,
                            'phone' => $phone,
                            'email_address' => $email_address,
                            'address' => $address,
                            'delivery_type' => $delivery_type,
                            'delivery_date' => $delivery_date,
                            'delivery_time' => $delivery_time,
                            'status' => $status
                        ), 
                        array( 'ID' => $order_id )
                    );
            //print_r($order_update);
            /*$my_post = array(
              'ID'           => $product_id,
              'post_title'   => $product_name,
              'post_status'   => 'publish',
            );*/
            //wp_update_post( $my_post );
            $url = admin_url("edit.php?post_type=saleproduct&page=my-custom-submenu-page");
            echo "<script>window.location.href = '".$url."'";
            echo "</script>";
            exit();
        }
    }
}

/* Display Product Order View Section in admin Section 24-08-2018 */

function product_order_view_layout() { ?>
    <?php
    global $wpdb;
    $order_id = $_GET['productorderid'];
    if(!empty($order_id)){ ?>
    <div class="wrap container product-order-listing">
        <h1>Product Order View</h1>
        <div class="table-responsive">          
            <table class="table">
                <thead>
                    <tr>
                        <th class="order-id">Visitor ID</th>
                        <th class="muname">Product ID</th>
                        <th class="memail">Product Name</th>
                        <th class="baddress">Product Price</th>
                        <th class="pcode">Delivery Quantity</th>
                        <th class="pcode">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $myorders = $wpdb->get_results("SELECT * FROM wp_sale_product_order WHERE order_id = '$order_id'");
                    foreach ($myorders as $myorder) {
                        $payment_type = $myorder->payment_type;
                        $total_product_amount = $myorder->total_product_amount;
                        $discount_price = $myorder->discount_price;
                        $delivery_charge = $myorder->delivery_charge;
                        $alldata = $myorder->data;
                        $alldata = json_decode($alldata,true);
                        foreach ($alldata as $data) {
                            $visitor_id = $data['visitor_id'];
                            $product_id = $data['product_id'];
                            $product_name = $data['product_name'];
                            $price = $data['price'];
                            $quantity = $data['quantity'];
                            $total_price = $data['total_price'];
                            $status = $data['status']; ?>
                            <tr>
                                <td><?php echo $visitor_id; ?></td>
                                <td><?php echo $product_id; ?></td>
                                <td><?php echo $product_name; ?></td>
                                <td>AED <?php echo $price; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td>AED <?php echo number_format($total_price,2); ?></td>
                            </tr>
                        <?php
                        } ?>
                        <tr>
                            <td colspan='5' style='border:1px solid #ccc;padding: 10px;'><strong>Payment Method:</strong></td>
                            <td><strong style="text-transform: capitalize;"><?php echo $payment_type; ?></strong></td>
                        </tr>
                        <?php if(!empty($delivery_charge)){ ?>
                        <tr>
                            <td colspan='5' style='border:1px solid #ccc;padding: 10px;'><strong>Delivery Charges:</strong></td>
                            <td><strong>AED <?php echo number_format($delivery_charge,2); ?></strong></td>
                        </tr>
                        <?php } ?>
                        <?php if(!empty($discount_price)){ ?>
                        <tr>
                            <td colspan='5' style='border:1px solid #ccc;padding: 10px;'><strong>Discounted Amount:</strong></td>
                                <td><strong>AED <?php echo number_format($discount_price,2); ?></strong></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan='5' style='border:1px solid #ccc;padding: 10px;'><strong>Total Amount:</strong></td>
                            <?php if(!empty($total_product_amount)){ ?>
                                <td><strong>AED <?php echo number_format($total_product_amount,2); ?></strong></td>
                            <?php 
                            } 
                            else{ ?>
                                <td><strong>AED <?php echo number_format($total_price,2); ?></strong></td>
                            <?php } ?>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php 
    }
    else { 
        $url = admin_url("edit.php?post_type=saleproduct&page=my-custom-submenu-page");
        echo "<script>window.location.href = '".$url."'";
        echo "</script>";
        exit();
    }
}

/* End Product Order View Section in admin section 24-08-2018 */



function load_custom_wp_admin_style() {
       wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/admin-css/style.css' );
       wp_enqueue_style( 'admin-font-awesome-min-style', get_stylesheet_directory_uri() . '/admin-css/font-awesome.min.css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );



function add_page_parent_to_single( $classes, $item ) {
    if ( is_single() && $item->title == 'Shop' ) {
        $classes[] = 'current_page_item';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'add_page_parent_to_single', 10, 2 );


/* Insert Contact Information start */
add_action('wpcf7_before_send_mail', 'save_form' );

function save_form( $wpcf7 ) {
   global $wpdb;
   $submission = WPCF7_Submission::get_instance();
   if ( $submission ) {
       $submited = array();
       $submited['title'] = $wpcf7->title();
       $submited['posted_data'] = $submission->get_posted_data();
    }
     $data = array(
        'name'  => $submited['posted_data']['usName'],
        'email' => $submited['posted_data']['usemail'],
        'mobilenumber' => $submited['posted_data']['mobilenumber'],
        'address' => $submited['posted_data']['address'],
        'message'  => $submited['posted_data']['ustextarea']
         );

    $wpdb->insert( $wpdb->prefix . 'tps_forms', 
            array( 
               'form'  => $submited['title'], 
               'data' => serialize( $data ),
               'name'  => $submited['posted_data']['usName'],
               'email' => $submited['posted_data']['usemail'],
               'mobilenumber' => $submited['posted_data']['mobilenumber'],
               'address' => $submited['posted_data']['address'],
               'message'  => $submited['posted_data']['ustextarea'],
               'date' => date('Y-m-d H:i:s')
            )
        );
}

/* Insert Contact Information End */
?>

