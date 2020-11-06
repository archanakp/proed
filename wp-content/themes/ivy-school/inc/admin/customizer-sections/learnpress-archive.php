<?php
/**
 * Section Thim Our Team plugin
 *
 */

thim_customizer()->add_section(
	array(
		'id'       => 'learnpress_archive',
		'panel'    => 'learnpress',
		'title'    => esc_html__( 'Archive Page', 'ivy-school' ),
		'priority' => 5,
	)
);

// Select Archive Layout
thim_customizer()->add_field(
    array(
        'id'            => 'learnpress_archive_layout',
        'type'          => 'radio-image',
        'label'         => esc_html__( 'Archive Layouts', 'ivy-school' ),
        'tooltip'       => esc_html__( 'Allows you to choose a layout to display for archive pages on your site.', 'ivy-school' ),
        'section'       => 'learnpress_archive',
        'priority'      => 5,
        'choices'       => array(
            'sidebar-left'     => THIM_URI . 'assets/images/layout/sidebar-left.jpg',
            'no-sidebar'       => THIM_URI . 'assets/images/layout/body-full.jpg',
            'sidebar-right'    => THIM_URI . 'assets/images/layout/sidebar-right.jpg',
            'full-sidebar'     => THIM_URI . 'assets/images/layout/body-left-right.jpg'
        ),
    )
);

thim_customizer()->add_field(
    array(
        'id'       => 'layout_courses',
        'type'     => 'select',
        'label'    => esc_html__( 'Layout Courses', 'ivy-school' ),
        'section'  => 'learnpress_archive',
        'priority' => 6,
        'multiple' => 0,
        'default'  => 'default_courses',
        'choices'  => array(
            'default_courses' => esc_html__( 'Default', 'ivy-school' ),
            'left_courses' => esc_html__( 'Layout Courses Left', 'ivy-school' ),
        ),
    )

);

// Enable or Disable Page Title
thim_customizer()->add_field(
    array(
        'id'       => 'learnpress_archive_hide_page_title',
        'type'     => 'switch',
        'label'    => esc_html__( 'Hidden Page Title', 'ivy-school' ),
        'tooltip'  => esc_html__( 'Allows you can hidden or show page title on heading top. ', 'ivy-school' ),
        'section'       => 'learnpress_archive',
        'default'  => false,
        'priority' => 10,
        'choices'  => array(
            true  => esc_html__( 'On', 'ivy-school' ),
            false => esc_html__( 'Off', 'ivy-school' ),
        ),
    )
);

// Enable or Disable Breadcrumb
thim_customizer()->add_field(
    array(
        'id'       => 'learnpress_archive_hide_breadcrumb',
        'type'        => 'switch',
        'label'       => esc_html__( 'Hide Breadcrumb', 'ivy-school' ),
        'tooltip'     => esc_html__( 'Allows you can HIDE breadcrumb on page title bar. ', 'ivy-school' ),
        'section'   => 'learnpress_archive',
        'default'     => false,
        'priority'    => 15,
        'choices'     => array(
            true  	  => esc_html__( 'On', 'ivy-school' ),
            false	  => esc_html__( 'Off', 'ivy-school' ),
        ),
    )
);

// Background Image
thim_customizer()->add_field(
    array(
        'id'       => 'learnpress_archive_heading_background_image',
        'type'     => 'image',
        'label'    => esc_html__( 'Background Image', 'ivy-school' ),
        'tooltip'  => esc_html__( 'You can upload image make to background image for page title on heading top. ', 'ivy-school' ),
        'section'   => 'learnpress_archive',
        'priority' => 20,
        'js_vars'  => array(
            array(
                'element'  => '.main-top',
                'function' => 'css',
                'property' => 'background-image',
            ),
        ),
        'default'  => THIM_URI . "assets/images/page-title.jpg",
    )
);

// Background Color
thim_customizer()->add_field(
    array(
        'id'        => 'learnpress_archive_heading_background_color',
        'type'      => 'color',
        'label'     => esc_html__( 'Background Color', 'ivy-school' ),
        'tooltip'   => esc_html__( 'If you do not use background image, then can use background color for page title on heading top. ', 'ivy-school' ),
        'section'   => 'learnpress_archive',
        'default'   => '#222222',
        'priority'  => 25,
        'alpha'     => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'color',
                'element'  => '.page-title .main-top .overlay-top-header',
                'property' => 'background',
            )
        )
    )
);

// Background Color opacity
thim_customizer()->add_field(
    array(
        'id'        => 'learnpress_archive_background_opacity',
        'type'      => 'text',
        'label'     => esc_html__( 'Background Color Opacity', 'ivy-school' ),
        'section'   => 'learnpress_archive',
        'default'   => '0.5',
        'priority'  => 35,
        'alpha'     => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'text',
                'element'  => '.page-title .main-top .overlay-top-header',
                'property' => 'opacity',
            )
        )
    )
);