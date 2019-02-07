<?php 
/**
 * @Packge     : Industry Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Car Bokking scripts enqueue
add_action( 'admin_enqueue_scripts', 'industry_appointment_scripts' );
function industry_appointment_scripts() {
    wp_enqueue_style( 'appointment-style', INDUSTRY_COMPANION_DIR_URL . 'css/booking.css', array(), '1.0', false );
    wp_enqueue_script( 'repeater-script', INDUSTRY_COMPANION_DIR_URL . 'js/repeater.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'appointment-script', INDUSTRY_COMPANION_DIR_URL . 'js/booking.js', array('jquery'), '1.0', true );
}


// Register car appointment post type
function industry_custom_init() {
    $args = array(
      'public' => false,
      'label'  => esc_html__( 'Appointment', 'industry-companion' )
    );
    register_post_type( 'appointment', $args );
}
add_action( 'init', 'industry_custom_init' );

// remove post type menu
function industry_remove_menu_items() {

    remove_menu_page( 'edit.php?post_type=appointment' );

}
add_action( 'admin_menu', 'industry_remove_menu_items' );

// Add admin menu for car appointment list
add_action( 'admin_menu', 'industry_admin_menu' );

function industry_admin_menu() {
    add_menu_page( esc_html__( 'Appointment Lists', 'industry-companion' ), esc_html__( 'Appointment', 'industry-companion' ), 'manage_options', 'industry-appointment', 'industry_booking_admin_page', '
dashicons-calendar-alt', 6  );
}

// Car booking admin page
function industry_booking_admin_page() {
?>
    <div class="booking-settings-nav">
        <ul>
            <li class="tablist" ><?php esc_html_e( 'List', 'industry-companion' ); ?></li>
            <li class="tabsettings"><?php esc_html_e( 'Form Settings', 'industry-companion' ); ?></li>
        </ul>
    </div>
    <div class="booking-area booking-lists" style="display:block;">
        <?php industry_booking_lists(); ?>
    </div>
    <div class="booking-area booking-settings" style="display:none">
        <?php
        // Form handling
        industry_booking_settings_form_data(); 
        // Form
        industry_booking_settings_form();
        ?>

    </div>

<?php

}

// Booking settings form
function industry_booking_settings_form() {
?>
<h2 style="text-align: center;"><?php esc_html_e( 'Settings', 'industry-companion' ); ?></h2>
<form action="#" method="post">
    
    <!-- Car model -->
    <div id="repeater">
        <div class="repeater-heading">
            <h5 class="pull-left"><?php esc_html_e( ' Company Types Settings', 'industry-companion' ); ?></h5>
            <span class="btn btn-primary pt-5 pull-right repeater-add-btn">
                <?php esc_html_e( 'Add Company Types Dropdown', 'industry-companion' ); ?>
            </span>
        </div>
        <div class="clearfix"></div>
        <?php 
        
        $companytypes = unserialize( get_option( 'companytypes' ) );

        if( is_array( $companytypes ) ):

        foreach( $companytypes as $val ) :

        ?>
        <!-- Repeater Items -->
        <div class="items" data-group="companytypes">
            <!-- Repeater Content -->
            <div class="item-content">
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label"><?php esc_html_e( 'Company Type', 'industry-companion' ); ?></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="<?php echo $val; ?>" id="inputName" placeholder="Company Type" data-name="name">
                    </div>
                </div>
            </div>
            <!-- Repeater Remove Btn -->
            <div class="pull-right repeater-remove-btn">
                <span class="btn btn-danger remove-btn">
                <?php esc_html_e( 'Remove', 'industry-companion' ); ?>
                </span>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php 
        endforeach;
        else:
        ?>
        <!-- Repeater Items -->
        <div class="items" data-group="companytypes">
            <!-- Repeater Content -->
            <div class="item-content">
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label"><?php esc_html_e( 'Company Type', 'industry-companion' ); ?></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Company Type" data-name="name">
                    </div>
                </div>
            </div>
            <!-- Repeater Remove Btn -->
            <div class="pull-right repeater-remove-btn">
                <span class="btn btn-danger remove-btn">
                <?php esc_html_e( 'Remove', 'industry-companion' ); ?>
                </span>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php
        endif;
        ?>

    </div>
    
    <button type="submit" class="booking-submit" name="updateopt"><?php esc_html_e( 'Submit', 'industry-companion' ); ?></button>
</form>
<?php
}
// Booking Settings form data
function industry_booking_settings_form_data() {

    if( isset( $_POST['updateopt'] ) ) {

        // Car Model
        if( isset( $_POST[ 'companytypes' ] ) ) {

            $companytypes = serialize( $_POST[ 'companytypes' ] );

            update_option( 'companytypes', $companytypes );

        }
    }


}

// Booking List
function industry_booking_lists() {
    $args = array(
        'post_type'     => 'appointment',
        'posts_per_page' => '-1'
    );

    $booking_lists = get_posts( $args );

    
    echo '<div class="booking-list"><ul>';
    echo '<h2 style="text-align:center;">Booking List</h2>';

    industry_delete_booking();
    //
    echo '<li style="padding: 8px;background-color:#f8f8f8;"><strong>Name</strong><span style="margin-left: 30px;"><strong>Service</strong></span><span style="float:right;"><strong>Action</strong></span></li>';
    foreach( $booking_lists as $list ) {

    $uname      = get_post_meta( $list->ID, 'industry_username', true );
    $uservice   = get_post_meta( $list->ID, 'industry_uservice', true );


    if( $uname ) {
        echo '<li style="padding: 8px;background-color:#f8f8f8;">'.esc_html( $uname ).'<span style="margin-left: 30px;">'.esc_html( $uservice ).'</span><span style="float:right;"><button class="view-booking" data-target="modal-'.esc_attr( $list->ID ).'" >'.esc_html__( 'View', 'industry-companion' ).'</button></span>'.industry_booking_admin_modal( $list->ID ).'</li>';
    }
        
    }
    echo '</ul></div>';

    ?>
    <script>
        ( function( $ ) {

            $( '.view-booking' ).on( 'click', function() {

                var modal = $(this).attr( 'data-target' );

                $('.' + modal ).show();

            });

            $( '.close-btn' ).on( 'click', function() {

                var modal = $(this).parent();

                $( modal ).hide();

            });

        } )( jQuery );
    </script>
    <?php
}
    
// Booking view modal
function industry_booking_admin_modal( $id ) {

    $username   = get_post_meta( $id, 'industry_username', true );
    $useremail  = get_post_meta( $id, 'industry_useremail', true );
    $userphone  = get_post_meta( $id, 'industry_userphone', true );
    $uservice   = get_post_meta( $id, 'industry_uservice', true );
    $umessage   = get_post_meta( $id, 'industry_umessage', true );
    
?>
    <div class="booking-modal modal-<?php echo esc_attr( $id ); ?>" style="position:absolute;top:0;background-color:#0003;top:0;bottom:0;left:0;right:0;display:none;">
        <div class="close-btn"><?php esc_html_e( 'Close', 'industry-companion' ) ?></div>
        <div style="background-color: #f9f9f9;padding: 10px;max-width: 300px;margin: 0 auto;margin-top: 10%;">
            <h3 class="text-center"><?php esc_html_e( 'Appointment Info', 'industry-companion' ) ?></h3>
            <ul class="modal-list">
                <li><strong><?php esc_html_e( 'Service:', 'industry-companion' ); ?></strong> <?php echo esc_html( $uservice ); ?> </li>
                <li><strong><?php esc_html_e( 'Name:', 'industry-companion' ); ?></strong> <?php echo esc_html( $username ); ?> </li>           
                <li><strong><?php esc_html_e( 'Email:', 'industry-companion' ); ?> </strong><?php echo esc_html( $useremail ); ?> </li>
                <li><strong><?php esc_html_e( 'Phone:', 'industry-companion' ); ?></strong> <?php echo esc_html( $userphone ); ?> </li>
                <p><?php echo esc_textarea( $umessage ) ?></p>
            </ul>
            <form action="#" method="post">
                <input type="hidden" name="bookingid" value="<?php echo absint( $id ) ?>" >
                <button name="deletebooking" class="deletebooking" type="submit"><?php esc_html_e( 'Delete', 'industry-companion' ) ?></button>                
            </form>
        </div>
    </div>
<?php
}

// Booking Form Data 
add_action( 'wp_ajax_industry_booking_form_data' , 'industry_booking_form_data');
add_action( 'wp_ajax_nopriv_industry_booking_form_data', 'industry_booking_form_data');
function industry_booking_form_data() {

    $error = new WP_Error();



    if(  isset( $_POST['request_submit_nonce_check'] ) 
    &&  wp_verify_nonce( $_POST['request_submit_nonce_check'], 'request_nonce_action' )  ) {

        // 
        if( ! empty( $_POST['uname'] ) ) {
            $username = $_POST['uname'];
        } else {
            $error->add( 'field', __( 'Name field can\'t be empty.', 'industry-companion' ) );
        }
        // 
        if( ! empty( $_POST['uemail'] ) ) {
            $useremail = $_POST['uemail'];
        } else {
            $error->add( 'field', __( 'Email field can\'t be empty.', 'industry-companion' ) );
        }
        // 
        if( ! empty( $_POST['uphone'] ) ) {
            $userphone = $_POST['uphone'];
        } else {
            $error->add( 'field', __( 'Phone number field can\'t be empty.', 'industry-companion' ) );
        }

        // 
        if( ! empty( $_POST['uservice'] ) ) {
            $uservice = $_POST['uservice'];
        } else {
            $error->add( 'field', __( 'Select service field can\'t be empty.', 'industry-companion' ) );
        }

        // 
        if( ! empty( $_POST['umessage'] ) ) {
            $umessage = $_POST['umessage'];
        } else {
            $error->add( 'field', __( 'Message field can\'t be empty.', 'industry-companion' ) );
        }

        if( 1 > count( $error->get_error_messages() ) ) {

            $args = array(
                'post_type'     => 'appointment',
                'post_title'    => sanitize_text_field( $username ),
                'post_status'   => 'publish',
            );

            $insert_ID = wp_insert_post( $args );

            if( $insert_ID ) {

            update_post_meta( $insert_ID, 'industry_username', sanitize_text_field( $username ) );
            update_post_meta( $insert_ID, 'industry_useremail', sanitize_text_field( $useremail ) );
            update_post_meta( $insert_ID, 'industry_userphone', sanitize_text_field( $userphone ) );
            update_post_meta( $insert_ID, 'industry_uservice', sanitize_text_field( $uservice ) );
            update_post_meta( $insert_ID, 'industry_umessage',  sanitize_textarea_field( $umessage ) );

            echo '<div class="alert alert-info">Your submission successfully done.</div>';

            }

        } else {
            $messages = $error->get_error_messages();
            echo '<div class="alert alert-danger">'.esc_html( $messages[0] ).'</div>';
        }
    }else {
        echo '<div class="alert alert-danger">Illegal submissions</div>';
    }

   die();

}
// Delete Booking 
function industry_delete_booking() {

    if ( isset( $_POST['deletebooking'] ) && isset( $_POST['bookingid'] ) ) {
        $delete = wp_delete_post( absint( $_POST['bookingid'] ) );

        if( $delete ) {
            echo '<h4 style="text-align:center;">'.esc_html__( 'Successfully Deleted', 'industry-companion' ).'</h4>';
        }

    }
    
}

