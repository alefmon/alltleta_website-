// Customizer UI javaScript

jQuery(document).ready(function( $ ) {

	"use strict";

	// disable priority re-arrange
	$(window).on('load',function(){
		
		setTimeout(function(){						
			var api = wp.customize;
			$( [ api.panel, api.section, api.control ] ).each( function ( i, values ) {
				values.unbind( 'add', api.reflowPaneContents );
				values.unbind( 'change', api.reflowPaneContents );
				values.unbind( 'remove', api.reflowPaneContents );
			} );
		},1000);

	});

	// Social Icons
	function adenitSocial( social ) {
		return '#customize-control-adenit_social-' + social + ' .customize-control-title';
	}

	$( ( adenitSocial('facebook') ) ).prepend('<i class="fa fa-facebook"></i>');
	$( ( adenitSocial('google_plus') ) ).prepend('<i class="fa fa-google-plus"></i>');
	$( ( adenitSocial('twitter') ) ).prepend('<i class="fa fa-twitter"></i>');
	$( ( adenitSocial('youtube') ) ).prepend('<i class="fa fa-youtube"></i>');
	$( ( adenitSocial('flickr') ) ).prepend('<i class="fa fa-flickr"></i>');
	$( ( adenitSocial('linkedin') ) ).prepend('<i class="fa fa-linkedin"></i>');
	$( ( adenitSocial('bloglovin') ) ).prepend('<i class="fa fa-heart"></i>');
	$( ( adenitSocial('tumblr') ) ).prepend('<i class="fa fa-tumblr"></i>');
	$( ( adenitSocial('pinterest') ) ).prepend('<i class="fa fa-pinterest"></i>');
	$( ( adenitSocial('soundcloud') ) ).prepend('<i class="fa fa-soundcloud"></i>');
	$( ( adenitSocial('behance') ) ).prepend('<i class="fa fa-behance"></i>');
	$( ( adenitSocial('vimeo') ) ).prepend('<i class="fa fa-vimeo"></i>');
	$( ( adenitSocial('instagram') ) ).prepend('<i class="fa fa-instagram"></i>');
	// theme activation checkbox hide
	$('#customize-control-adenit_social-theme_activation').hide();


	// Prevent rendering sections if panel not loaded
	$('li.accordion-section').children('h3').click( function(event) {

		// if already loaded
		if ( $(this).parent().hasClass('adenit-section-render') ) {
			$('.section-open #customize-info, .section-open #customize-theme-controls').removeAttr('style');
			$('.wp-full-overlay-sidebar-content').removeAttr('style');
			return;
		}

		// if not loaded
		$(this).parent().addClass('adenit-section-notrender');

		if ( $(this).parent().hasClass('adenit-section-notrender') ) {
			event.preventDefault();
			$('.section-open #customize-info, .section-open #customize-theme-controls').css('left', '0');
			$('.wp-full-overlay-sidebar-content').css('visibility', 'visible').css('overflow-y', 'auto');
			$(this).parent().removeClass('open');
		}

	});

	// add render class on load
	$(window).on('load', function(){
		$('li.accordion-section').removeClass('adenit-section-notrender').addClass('adenit-section-render');
	});

	// Group Controlles /#customize-control-adenit_header-effect
	function adenitGroupControles( section, custom, ids, title, groupID ) {

		var prefix = ( custom ) ? '-adenit_' : '';

		$('#accordion-section-'+ prefix.replace('-', '') + section).children('h3').click(function() {

			var selector = ids.split(',');
				section = ( custom ) ? section : '';

			for ( var i = 0; i < selector.length; i++ ) {
				selector[i] = '#customize-control'+ prefix + section +'-'+ selector[i];
			}

			selector = selector.join();

			if ( ! $('.cs-group'+ groupID).hasClass('adenit-group-render') ) {
				$( selector ).wrapAll('<div class="adenit-customiser-group cs-group'+ groupID +'"></div>');
				$('.cs-group'+ groupID).addClass('adenit-group-render');
				$('.cs-group'+ groupID).prepend('<h3>'+ title +'</h3>').append('<div style="clear: both;"></div>');
			}

			$('.adenit-customiser-group').css({
				'position' : 'relative',
				'padding' : '15px',
				'margin' : '50px 0',
				'background' : '#fff',
				'border' : '1px solid #ddd',
			});

			$('.adenit-customiser-group').children('h3').css({
				'display' : 'inline-block',
				'position' : 'absolute',
				'top' : '-24px',
				'left' : '-1px',
				'padding' : '5px 10px 0',
				'margin' : '0',
				'background' : '#fff',
				'border' : '1px solid #ddd',
				'border-bottom' : 'none'
			});

		}); // end click

	}

	// adenitGroupControles( '', true, '', '', 0);

	$(window).on('load', function(){

		adenitGroupControles( 'header', true, 'effect,boxed,top_menu,fixed_menu,left_nav,center_height,bg_img,bg_size,bg_att', 'Header General', 1);
		adenitGroupControles( 'header', true, 'logo,retina_logo,logo_width,logo_top_magin,mini_logo', 'Setup Logo', 2);
		adenitGroupControles( 'carousel', true, 'show,effect,boxed,column,posts_amount,orderby,width,height,textarea,pagination,navigation,autoplay', 'Carousel General', 3);
		adenitGroupControles( 'carousel', true, 'like,comment,category,title,date', 'Carousel Slides', 4);
		adenitGroupControles( 'content', true, 'boxed,single_boxed,width,sidebar_width,sidebar_position,sidebar_single_position,bg_img,bg_size,bg_att', 'Content General', 5);
		adenitGroupControles( 'content', true, 'post_width,post_height,post_column,horizontal_gutter,vertical_gutter,pagination,post_thumbnail,post_like,post_comment,post_categories,post_description,post_excerpt_length,dropcap,grid_read_more,post_author,post_date,facebook_share,twitter_share,pinterest_share,googleplus_share,linkedin_share,tumblr_share,reddit_share', 'Blog Grid', 6);
		adenitGroupControles( 'content', true, 'post_tags,breadcrumb,similar_posts,similar_posts_title,post_author_description,post_pagination,post_comment_area,page_comment_area', 'Content Single', 7);
		adenitGroupControles( 'topbar_color', true, 'background,nav,nav_hv', 'General', 8);
		adenitGroupControles( 'topbar_color', true, 'sidebar_btn,sidebar_btn_hv,sidebar_btn_background', 'Sidebar Fold Icon', 9);
		adenitGroupControles( 'topbar_color', true, 'search,search_hv,search_background', 'Search Icon', 10);
		adenitGroupControles( 'menu_color', true, 'background,nav,nav_hv,submenu_border', 'Menu General', 11);
		adenitGroupControles( 'general_color', true, 'background,accent,text,sub_text,meta,border,alt', 'General', 12);
		adenitGroupControles( 'general_color', true, 'read_more,read_more_hv,read_more_background,read_more_background_hv', 'Read More Button', 13);
		adenitGroupControles( 'footer_color', true, 'top_background,social,social_hv,social_icon_hv', 'Footer General', 14);
		adenitGroupControles( 'footer_color', true, 'bottom_background,copyright,scrolltotop,scrolltotop_hv', 'Copyright', 15);
		adenitGroupControles( 'footer', true, 'social,instagram_boxed,boxed,logo,logo_width,copyright', 'Setup Footer', 16);
		adenitGroupControles( 'social', true, 'facebook,google_plus,twitter,youtube,flickr,linkedin,bloglovin,tumblr,pinterest,soundcloud,behance,vimeo,instagram', 'Social Icons', 17);
		adenitGroupControles( 'custom', true, 'css', 'Code Snippets', 18);
		adenitGroupControles( 'google_analytics', true, 'code', 'Setup Analitycs', 19);
		adenitGroupControles( 'static_front_page', false, 'show_on_front,page_on_front,page_for_posts', 'Setup Pages', 20);
		adenitGroupControles( 'title_tagline', false, 'blogname,blogdescription,site_icon', 'Site Meta', 21);

	});

}); // end ready