	<footer class="footer-wrap">
	
	<!--  Get Options -->
	<?php $footer_options = get_option( 'adenit_footer' ); ?>

		<!-- Get footer Widget -->
		<?php $instagram_boxed = ( $footer_options['instagram_boxed'])?'center-max-width':''; ?>
		<div class="footer-instagram <?php echo esc_attr( $instagram_boxed ); ?>" data-instscroll="<?php echo esc_attr( $footer_options['social'] ); ?>"> 
		
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) {
			dynamic_sidebar( 'sidebar-2' );
		}
		?>
	
		<?php
		if ( $footer_options['social'] !== 'off' ) {
			adenit_social( 'footer-social');
		}
		?>
		
		</div>
		
		<div class="footer-widget-area">	
			<div  class="center-max-width">

				<?php if ( is_active_sidebar( 'sidebar-4' ) ): ?>
				<div class="footer-widget">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div>
				<?php endif; ?>
						
				<?php if ( is_active_sidebar( 'sidebar-5' ) ): ?>
				<div class="footer-widget">
				<?php dynamic_sidebar( 'sidebar-5' ); ?>
				</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-6' ) ): ?>
				<div class="footer-widget adenit-last">
				<?php dynamic_sidebar( 'sidebar-6' ); ?>
				</div>
				<?php endif; ?>
			
				<div class="clear"></div>	
			</div>
		</div>

		<div class="footer-bottom">	
			<div  class="center-max-width">
				
				<!-- Footer Logo -->
				<?php if ( $footer_options['logo']!=='' ): ?>
				<div class="footer-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( bloginfo('name') ); ?>" >
						<img src="<?php echo esc_url( $footer_options['logo'] ); ?>" alt="<?php esc_attr( bloginfo('name') ); ?>">
					</a>	
				</div>
				<?php endif; ?>

				<!-- Copyright -->
				<div class="copyright">
					<p>			
					<?php 
					echo wp_kses( $footer_options['copyright'], array(
					    'a' => array(
					        'href' => array(),
					        'target' => array(),
					        'title' => array()
					    ),
					    'br' => array(),
					    'em' => array(),
					    'strong' => array(),
					) );
					?>
					</p>
				</div>

				<!-- Scroll top button -->
				<span class="scrolltotop">
					<i class="fa fa-angle-double-up"></i>
					<br>
					<?php esc_html_e( 'Back to top', 'aden' ); ?>
				</span>

				<div class="clear"></div>
			</div>
		</div>
	</footer> <!-- // end Fotter copyright -->
</div>
<?php wp_footer(); ?>
</body>
</html>