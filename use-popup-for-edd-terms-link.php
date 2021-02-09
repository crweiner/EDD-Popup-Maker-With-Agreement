function edd_popup_terms_agreement() {
	if ( edd_get_option( 'show_agree_to_terms', true ) ) {
	  $popup_id = '123';
		$agree_text  = edd_get_option( 'agree_text', 'I agree to the EULA' );
		$agree_label = edd_get_option( 'agree_label', __( 'Agree to Terms?', 'easy-digital-downloads' ) );
?>
		<fieldset id="edd_terms_agreement">
			<div id="edd_terms" style="display:none;">
				<?php
					do_action( 'edd_before_terms' );
					echo wpautop( stripslashes( $agree_text ) );
					do_action( 'edd_after_terms' );
				?>
			</div>
			<div id="edd_show_terms">
				<h4><a href="#" class="edd_popup_terms_links popmake-<?php echo $popup_id; ?>"><?php _e( 'Show and agree to our EULA', 'easy-digital-downloads' ); ?></a></h4>
			</div>
			<div id="edd_terms_agreement">
				<input name="edd_agree_to_terms" class="required" type="checkbox" id="edd_agree_to_terms" value="1" /> <label for="edd_agree_to_terms">I have read and agree to the EULA</label>
			</div>
				
		</fieldset>
<?php
	}
}
remove_action( 'edd_purchase_form_before_submit', 'edd_terms_agreement' );
add_action( 'edd_purchase_form_before_submit', 'edd_popup_terms_agreement' );