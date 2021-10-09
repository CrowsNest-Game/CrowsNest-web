<?php

/**
 * Form settings view for the plugin
 *
 * @link       http://www.webfactoryltd.com
 * @since      1.0
 */

if (!defined('WPINC')) {
	die;
}

?>

<div class="signals-tile" id="form">
	<div class="signals-tile-body">
		<div class="signals-tile-title"><?php _e( 'FORM', 'signals' ); ?></div>
		<p><?php _e( 'Leads are the lifeline of any business. Make sure your form looks trustworthy. Configure technical details on the <a href="#email" class="csmm-change-tab">email tab</a>.', 'signals' ); ?></p>


    <div id="csmm-setting-form-mc" style="<?php if ($signals_csmm_options['mail_system_to_use'] != 'mc') echo 'display: none;' ?>">
		<div class="signals-section-content">
			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_input_text" class="signals-strong"><?php _e( 'Input Text', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_input_text" id="signals_csmm_input_text" value="<?php esc_attr_e( stripslashes( $signals_csmm_options['input_text'] ) ); ?>" placeholder="<?php _e( 'Text for the Input field', 'signals' ); ?>" class="signals-form-control">

					<p class="signals-form-help-block"><?php _e( 'Enter the text which you would like to use as a placeholder text for the text input field.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_button_text" class="signals-strong"><?php _e( 'Button Text', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_button_text" id="signals_csmm_button_text" value="<?php esc_attr_e( stripslashes( $signals_csmm_options['button_text'] ) ); ?>" placeholder="<?php _e( 'Text for the Button', 'signals' ); ?>" class="signals-form-control">

					<p class="signals-form-help-block"><?php _e( 'Enter the text for the button. Usually, it will be "Subscribe" or something like that.', 'signals' ); ?></p>
				</div>
			</div>

      <div class="signals-double-group signals-clearfix">
        <div class="signals-form-group">
          <label for="signals_csmm_gdpr_text" class="signals-strong"><?php _e( 'GDPR Consent Checkbox Text', 'signals' ); ?></label>
          <textarea name="signals_csmm_gdpr_text" id="signals_csmm_gdpr_text" placeholder="<?php _e( '', 'signals' ); ?>" class="signals-form-control" rows="3"><?php echo esc_textarea( stripslashes( $signals_csmm_options['gdpr_text'] ) ); ?></textarea>

          <p class="signals-form-help-block"><?php _e( 'Checkbox and the text above are displayed below the form email field. User has to check the checkbox in order to subscribe. Leave the field empty if you don\'t want to display the checkbox.', 'signals' ); ?></p>
        </div>

        <div class="signals-form-group">
          <label for="signals_csmm_gdpr_fail" class="signals-strong"><?php _e( 'GDPR Consent Fail Notice', 'signals' ); ?></label>
          <textarea name="signals_csmm_gdpr_fail" id="signals_csmm_gdpr_fail" placeholder="<?php _e( '', 'signals' ); ?>" class="signals-form-control" rows="3"><?php echo esc_textarea( stripslashes( $signals_csmm_options['gdpr_fail'] ) ); ?></textarea>

          <p class="signals-form-help-block"><?php _e( 'Alert text shown when user does not comply with the GPDR consent checkbox.', 'signals' ); ?></p>
        </div>

      </div>

      <div class="signals-double-group signals-clearfix">
			<div class="signals-form-group">
				<label for="signals_csmm_ignore_styles" class="signals-strong"><?php _e( 'Ignore Default Form Styles?', 'signals' ); ?></label>
				<input type="checkbox" class="signals-form-ios" name="signals_csmm_ignore_styles" id="signals_csmm_ignore_styles" value="1"<?php checked( '1', $signals_csmm_options['ignore_form_styles'] ); ?>>

				<p class="signals-form-help-block"><?php _e( 'Enable this option if you would like to use your custom form styles. The settings below will only be applicable when this option is turned on.', 'signals' ); ?></p>
      </div>

      <div class="signals-form-group">
          <label for="signals_show_name" class="signals-strong pro-option">Show Name Field<sup>PRO</sup></label>
          <input disabled="disabled" type="checkbox" class="signals-form-ios skip-save pro-option" name="signals_show_name" id="signals_show_name" value="1">
          <p class="signals-form-help-block">It's preferable to ask for a name as it gives you the option to personalize communication later on. This is a <a href="#pro" class="csmm-change-tab">PRO feature</a>.</p>
        </div>
			</div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_input_size" class="signals-strong"><?php _e( 'Input Text Size', 'signals' ); ?></label>

					<select name="signals_csmm_input_size" id="signals_csmm_input_size">
						<?php

							// Loading font sizes with the help of a loop
							for ( $i = 11; $i < 41; $i++ ) {
								echo '<option value="' . $i . '"' . selected( $signals_csmm_options['input_font_size'], $i ) . '>' . $i . __( 'px', 'signals' ) . '</option>';
							}

						?>
					</select>

					<p class="signals-form-help-block"><?php _e( 'Font size for the text input field.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_button_size" class="signals-strong"><?php _e( 'Button Text Size', 'signals' ); ?></label>

					<select name="signals_csmm_button_size" id="signals_csmm_button_size">
						<?php

							// Loading font sizes with the help of a loop
							for ( $i = 11; $i < 41; $i++ ) {
								echo '<option value="' . $i . '"' . selected( $signals_csmm_options['button_font_size'], $i ) . '>' . $i . __( 'px', 'signals' ) . '</option>';
							}

						?>
					</select>

					<p class="signals-form-help-block"><?php _e( 'Font size for the button text.', 'signals' ); ?></p>
				</div>
			</div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_input_color" class="signals-strong"><?php _e( 'Input Text Color', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_input_color" id="signals_csmm_input_color" value="<?php esc_attr_e( $signals_csmm_options['input_font_color'] ); ?>" placeholder="<?php _e( 'Font color for the Input text', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select font color for the input text field.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_button_color" class="signals-strong"><?php _e( 'Button Text Color', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_button_color" id="signals_csmm_button_color" value="<?php esc_attr_e( $signals_csmm_options['button_font_color'] ); ?>" placeholder="<?php _e( 'Font color for the Button text', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select font color for the button text.', 'signals' ); ?></p>
				</div>
			</div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_input_bg" class="signals-strong"><?php _e( 'Input Background Color', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_input_bg" id="signals_csmm_input_bg" value="<?php esc_attr_e( $signals_csmm_options['input_bg'] ); ?>" placeholder="<?php _e( 'Background color for the Input field', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select background color for the input text field.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_button_bg" class="signals-strong"><?php _e( 'Button Background Color', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_button_bg" id="signals_csmm_button_bg" value="<?php esc_attr_e( $signals_csmm_options['button_bg'] ); ?>" placeholder="<?php _e( 'Background color for the Button', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select background color for the button.', 'signals' ); ?></p>
				</div>
			</div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_input_bg_hover" class="signals-strong"><?php _e( 'Input Focus Background Color', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_input_bg_hover" id="signals_csmm_input_bg_hover" value="<?php esc_attr_e( $signals_csmm_options['input_bg_hover'] ); ?>" placeholder="<?php _e( 'Background color for the Input field when it gets clicked', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select background color for the input text field when it gets clicked.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_button_bg_hover" class="signals-strong"><?php _e( 'Button Hover Background Color', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_button_bg_hover" id="signals_csmm_button_bg_hover" value="<?php esc_attr_e( $signals_csmm_options['button_bg_hover'] ); ?>" placeholder="<?php _e( 'Background color for the Button on hover', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select background color for the button on mouse hover.', 'signals' ); ?></p>
				</div>
			</div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_input_border" class="signals-strong"><?php _e( 'Input Border Color', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_input_border" id="signals_csmm_input_border" value="<?php esc_attr_e( $signals_csmm_options['input_border'] ); ?>" placeholder="<?php _e( 'Border color for the Input field', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select border color for the input field.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_button_border" class="signals-strong"><?php _e( 'Button Border Color', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_button_border" id="signals_csmm_button_border" value="<?php esc_attr_e( $signals_csmm_options['button_border'] ); ?>" placeholder="<?php _e( 'Border color for the Button', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select border color for the button.', 'signals' ); ?></p>
				</div>
			</div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_input_border_hover" class="signals-strong"><?php _e( 'Input Focus Border Color', 'signals' ); ?> </label>
					<input type="text" name="signals_csmm_input_border_hover" id="signals_csmm_input_border_hover" value="<?php esc_attr_e( $signals_csmm_options['input_border_hover'] ); ?>" placeholder="<?php _e( 'Border color for the Input field when it gets clicked', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select border color for the input field when it gets clicked.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_button_border_hover" class="signals-strong"><?php _e( 'Button Hover Border Color', 'signals' ); ?> </label>
					<input type="text" name="signals_csmm_button_border_hover" id="signals_csmm_button_border_hover" value="<?php esc_attr_e( $signals_csmm_options['button_border_hover'] ); ?>" placeholder="<?php _e( 'Border color for the Button on hover', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select border color for the button on mouse hover.', 'signals' ); ?></p>
				</div>
			</div>

      <div class="signals-double-group signals-clearfix">
        <div class="signals-form-group">
          <label for="form_placeholder_color" class="signals-strong">Input Fields Placeholder Color</label>
          <input type="text" name="form_placeholder_color" id="form_placeholder_color" value="<?php esc_attr_e( $signals_csmm_options['form_placeholder_color'] ); ?>" class="signals-form-control color jscolor {required:false}">
          <p class="signals-form-help-block"><?php _e( 'Placeholder (default text) color in input fields.', 'signals' ); ?></p>
        </div>
      </div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_success_bg" class="signals-strong"><?php _e( 'Success Message Background Color', 'signals' ); ?></span></label>
					<input type="text" name="signals_csmm_success_bg" id="signals_csmm_success_bg" value="<?php esc_attr_e( $signals_csmm_options['success_background'] ); ?>" placeholder="<?php _e( 'Background color for the success message', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select background color for the success message.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_success_color" class="signals-strong"><?php _e( 'Success Message Text Color', 'signals' ); ?> </label>
					<input type="text" name="signals_csmm_success_color" id="signals_csmm_success_color" value="<?php esc_attr_e( $signals_csmm_options['success_color'] ); ?>" placeholder="<?php _e( 'Text color for the success message', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select text color for the success message.', 'signals' ); ?></p>
				</div>
			</div>

			<div class="signals-double-group signals-clearfix">
				<div class="signals-form-group">
					<label for="signals_csmm_error_bg" class="signals-strong"><?php _e( 'Error Message Background Color', 'signals' ); ?></span></label>
					<input type="text" name="signals_csmm_error_bg" id="signals_csmm_error_bg" value="<?php esc_attr_e( $signals_csmm_options['error_background'] ); ?>" placeholder="<?php _e( 'Background color for the error message', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select background color for the error message.', 'signals' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_csmm_error_color" class="signals-strong"><?php _e( 'Error Message Text Color', 'signals' ); ?></label>
					<input type="text" name="signals_csmm_error_color" id="signals_csmm_error_color" value="<?php esc_attr_e( $signals_csmm_options['error_color'] ); ?>" placeholder="<?php _e( 'Text color for the error message', 'signals' ); ?>" class="signals-form-control color jscolor {required:false}">

					<p class="signals-form-help-block"><?php _e( 'Select text color for the error message.', 'signals' ); ?></p>
				</div>
			</div>
		</div>
		</div>

	</div>
</div><!-- #form -->
