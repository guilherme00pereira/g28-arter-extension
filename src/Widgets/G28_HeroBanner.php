<?php

namespace G28\ArterExtension\Widgets;

use Elementor\Arter_Hero_Banner_Widget;

class G28_HeroBanner extends Arter_Hero_Banner_Widget {

	public function get_name() {
		return 'g28-hero-banner';
	}

	public function get_title() {
		return esc_html__( 'G28 Hero Banner', 'arter-plugin' );
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'basic' );

		$text_rotate = '';
		$i = 0;
		foreach ( $settings['subtitle_rotate'] as $item ) {
			$i++;
			$text_rotate .= '"' . $item['text'] . '"';
			if ( $i != count( $settings['subtitle_rotate'] ) ) {
				$text_rotate .= ',';
			}
		}

		?>

		<!-- container -->
		<div class="container-fluid">
			<!-- row -->
			<div class="row p-30-0 p-lg-30-0 p-md-15-0">
			  <!-- col -->
			  <div class="col-lg-12">

			    <!-- banner -->
			    <div class="art-a art-banner"<?php if ( $settings['bg_image'] ) : ?> style="background-image: url(<?php echo esc_url( $settings['bg_image']['url'] ); ?>)"<?php endif; ?>>
			      <!-- banner back -->
			      <div class="art-banner-back"></div>
			      <!-- banner dec -->
			      <div class="art-banner-dec"></div>
			      <!-- banner overlay -->
			      <div class="art-banner-overlay">
			        <!-- main title -->
			        <div class="art-banner-title">
			          <?php if ( $settings['title'] ) : ?>
			          <!-- title -->
			          <<?php echo esc_attr( $settings['title_tag'] ); ?> class="art-banner-title-h mb-15">
			          <span <?php echo $this->get_render_attribute_string( 'title' ); ?>>
			          	<?php echo wp_kses_post( $settings['title'] ); ?>
			          </span>
			          </<?php echo esc_attr( $settings['title_tag'] ); ?>>
			      	  <?php endif; ?>
			      	  <?php if ( $settings['subtitle_show'] == 'yes' ) : ?>
			          <!-- suptitle -->
			          <div class="art-lg-text art-code mb-25">
			          	&lt;<i><?php echo esc_html__( 'code', 'arter-plugin' ); ?></i>&gt; 
			          	<?php echo esc_html( $settings['subtitle_start'] ); ?>
			          	<?php if ( $settings['subtitle_rotate'] ) : ?>
			          	<span class="txt-rotate" data-period="2000"
			              data-rotate='[ <?php echo esc_attr( $text_rotate ); ?> ]'></span>
			            <?php endif; ?>
			            &lt;/<i><?php echo esc_html__( 'code', 'arter-plugin' ); ?></i>&gt;
			          </div>
			          <?php endif; ?>
			          <?php if ( $settings['button'] ) : ?>
			          <div class="art-buttons-frame">
			            <!-- button -->
			            <a<?php if ( $settings['link'] ) : if ( $settings['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $settings['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $settings['link']['url'] ); ?>"<?php endif; ?> class="art-btn art-btn-md"><span><?php echo esc_html( $settings['button'] ); ?></span></a>
			          </div>
			          <?php endif; ?>
					  <?php if ( $settings['sec_button'] && $settings['sec_button_true'] ) : ?>
			          <div class="art-buttons-frame second">
			            <!-- button -->
			            <a<?php if ( $settings['sec_link'] ) : if ( $settings['sec_link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $settings['sec_link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $settings['sec_link']['url'] ); ?>"<?php endif; ?> class="art-btn art-btn-md"><span><?php echo esc_html( $settings['sec_button'] ); ?></span></a>
			          </div>
			          <?php endif; ?>
			        </div>
			        
			      </div>
			      <!-- banner overlay end -->
			    </div>
			    <!-- banner end -->

			  </div>
			  <!-- col end -->
			</div>
			<!-- row end -->
		</div>
		<!-- container end -->

		<?php
	}

	/**
	 * Render widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
		?>

		<#
		view.addInlineEditingAttributes( 'title', 'basic' );

		var text_rotate = '';
		_.each( settings.subtitle_rotate, function( item, index ) {
			text_rotate += '"' + item.text + '"';
			if ( index != settings.subtitle_rotate.length-1 ) {
				text_rotate += ',';
			}
		});
		#>

		<!-- container -->
		<div class="container-fluid">
			<!-- row -->
			<div class="row p-30-0 p-lg-30-0 p-md-15-0">
			  <!-- col -->
			  <div class="col-lg-12">

			    <!-- banner -->
			    <div class="art-a art-banner"<# if ( settings.bg_image ) { #> style="background-image: url({{{ settings.bg_image.url }}})"<# } #>>
			      <!-- banner back -->
			      <div class="art-banner-back"></div>
			      <!-- banner dec -->
			      <div class="art-banner-dec"></div>
			      <!-- banner overlay -->
			      <div class="art-banner-overlay">
			        <!-- main title -->
			        <div class="art-banner-title">
			          <# if ( settings.title ) { #>
			          <!-- title -->
			          <{{{ settings.title_tag }}} class="art-banner-title-h mb-15">
			          <span {{{ view.getRenderAttributeString( 'title' ) }}}>
			          	{{{ settings.title }}}
			          </span>
			          </{{{ settings.title_tag }}}>
			      	  <# } #>
			      	  <# if ( settings.subtitle_show == 'yes' ) { #>
			          <!-- suptitle -->
			          <div class="art-lg-text art-code mb-25">
			          	&lt;<i>code</i>&gt; 
			          	{{{ settings.subtitle_start }}}
			          	<# if ( settings.subtitle_rotate ) { #>
			          	<span class="txt-rotate" data-period="2000"
			              data-rotate='[ {{{ text_rotate }}} ]'></span>
			            <# } #>
			            &lt;/<i>code</i>&gt;
			          </div>
			          <# } #>
			          <# if ( settings.button ) { #>
			          <div class="art-buttons-frame">
			            <!-- button -->
			            <a<# if ( settings.link ) { if ( settings.link.is_external ) { #> target="_blank"<# } #><# if ( settings.link.nofollow ) { #> rel="nofollow"<# } #> href="{{{ settings.link.url }}}"<# } #> class="art-btn art-btn-md"><span>{{{ settings.button }}}</span></a>
			          </div>
			          <# } #>
					  <# if ( settings.sec_button && settings.sec_button_true ) { #>
			          <div class="art-buttons-frame">
			            <!-- button -->
			            <a<# if ( settings.sec_link ) { if ( settings.sec_link.is_external ) { #> target="_blank"<# } #><# if ( settings.sec_link.nofollow ) { #> rel="nofollow"<# } #> href="{{{ settings.sec_link.url }}}"<# } #> class="art-btn art-btn-md"><span>{{{ settings.sec_button }}}</span></a>
			          </div>
			          <# } #>
			        </div>
			        <!-- main title end -->
			        <# if ( settings.image ) { #>
			        <!-- photo -->
			        <img src="{{{ settings.image.url }}}" class="art-banner-photo" alt="Photo">
			        <# } #>
			      </div>
			      <!-- banner overlay end -->
			    </div>
			    <!-- banner end -->

			  </div>
			  <!-- col end -->
			</div>
			<!-- row end -->
		</div>
		<!-- container end -->

		<?php 
	}
}