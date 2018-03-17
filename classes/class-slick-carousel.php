<?php

class Slick_Carousel extends WP_Widget{

    private $carousel_options = array(
        array(
            'title' => 'Accessibility',
            'label_for' => 'carousel-accessibility',
            'option_name' => 'accessibility',
            'default_value' => 1,
            'description' => 'Enables tabbing and arrow key navigation',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Adaptive Height',
            'label_for' => 'carousel-adaptive-height',
            'option_name' => 'adaptiveHeight',
            'default_value' => 0,
            'description' => 'Enables adaptive height for single slide horizontal carousels',
            'type' => 'checkbox'
        ),
        array(
            'title' => 'Autoplay',
            'label_for' => 'carousel-autoplay',
            'option_name' => 'autoplay',
            'default_value' => 0,
            'description' => 'Enables autoplay',
            'type' => 'checkbox'
        ),
        array(
            'title' => 'Autoplay speed',
            'label_for' => 'carousel-autoplay-speed',
            'option_name' => 'autoplaySpeed',
            'default_value' => 3000,
            'description' => 'Autoplay speed in milliseconds (only relevant if autoplay is enabled).',
            'type' => 'integer'
        ),
        array(
            'title' => 'Arrows',
            'label_for' => 'carousel-arrows',
            'option_name' => 'arrows',
            'default_value' => 1,
            'description' => 'Show prev/next arrows',
            'type' => 'checkbox'
        ),
        array(
            'title' => 'Previous Arrow',
            'label_for' => 'carousel-prevArrow',
            'option_name' => 'prevArrow',
            'default_value' => '<button type=\'button\' class=\'slick-prev\'>Previous</button>',
            'description' => 'Customize the "Previous" arrow HTML (also will accept jQuery selector, if you know one)',
            'type' => 'text'
        ),
        array(
            'title' => 'Next Arrow',
            'label_for' => 'carousel-nextArrow',
            'option_name' => 'nextArrow',
            'default_value' => '<button type=\'button\' class=\'slick-next\'>Next</button>',
            'description' => 'Customize the "Next" arrow HTML (also will accept jQuery selector, if you know one)',
            'type' => 'text'
        ),
        array(
            'title' => 'Center Mode',
            'label_for' => 'carousel-center-mode',
            'option_name' => 'centerMode',
            'default_value' => 0,
            'description' => 'Enables center view with partial prev/next slides. Use with odd-numbered slidesToShow counts',
            'type' => 'checkbox'
        ),
        array(
            'title' => 'Center Padding',
            'label_for' => 'carousel-center-padding',
            'option_name' => 'centerPadding',
            'default_value' => '50px',
            'description' => 'Side padding when in center mode (px or %)',
            'type' => 'text',
        ),
        array(
            'title' => 'CSS Ease',
            'label_for' => 'carousel-css-ease',
            'option_name' => 'cssEase',
            'default_value' => 'ease',
            'description' => 'CSS3 animation easing (see <a href="https://www.w3schools.com/cssref/css3_pr_animation-timing-function.asp" target="_blank">W3Schools</a>)',
            'type' => 'text',
        ),
        array(
            'title' => 'Dots',
            'label_for' => 'carousel-dots',
            'option_name' => 'dots',
            'default_value' => 0,
            'description' => 'Show dot indicators',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Dots Class',
            'label_for' => 'carousel-dots-class',
            'option_name' => 'dotsClass',
            'default_value' => 'slick-dots',
            'description' => 'Class for slide indicator dots container',
            'type' => 'text',
        ),
        array(
            'title' => 'Draggable',
            'label_for' => 'carousel-draggable',
            'option_name' => 'draggable',
            'default_value' => 1,
            'description' => 'Enable mouse dragging',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Fade',
            'label_for' => 'carousel-fade',
            'option_name' => 'fade',
            'default_value' => 0,
            'description' => 'Enable fade on transition',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Focus On Select',
            'label_for' => 'carousel-focus-on-select',
            'option_name' => 'focusOnSelect',
            'default_value' => 0,
            'description' => 'Enable focus on selected element (click)',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Easing',
            'label_for' => 'carousel-easing',
            'option_name' => 'easing',
            'default_value' => 'linear',
            'description' => 'Add easing for jQuery animate. Use with easing libraries or default easing methods',
            'type' => 'text',
        ),
        array(
            'title' => 'Edge Friction',
            'label_for' => 'carousel-edge-friction',
            'option_name' => 'edgeFriction',
            'default_value' => 0.15,
            'description' => 'Resistance when swiping edges of non-infinite carousels',
            'type' => 'decimal',
        ),
        array(
            'title' => 'Infinite Loop',
            'label_for' => 'carousel-infinite',
            'option_name' => 'infinite',
            'default_value' => 1,
            'description' => 'Infinite loop sliding',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Lazy Loading',
            'label_for' => 'carousel-lazyload',
            'option_name' => 'lazyLoad',
            'default_value' => 'ondemand',
            'description' => 'Set lazy loading technice. Accepts "ondemand" or "progressive"',
            'type' => 'text',
        ),
        //array(
        //    'title' => 'Mobile First',
        //    'label_for' => 'carousel-mobile-first',
        //    'option_name' => 'mobileFirst',
        //    'default_value' => 0,
        //    'description' => 'Responsive settins use mobile first calculation',
        //    'type' => 'checkbox',
        //),
        array(
            'title' => 'Pause on Focus',
            'label_for' => 'carousel-pause-focus',
            'option_name' => 'pauseOnFocus',
            'default_value' => 1,
            'description' => 'Pause autoplay on focus event (autoplay must be turned on to be effective)',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Pause on Hover',
            'label_for' => 'carousel-pause-hover',
            'option_name' => 'pauseOnHover',
            'default_value' => 1,
            'description' => 'Pause autoplay on hover event (autoplay must be turned on to be effective)',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Pause on Dots Hover',
            'label_for' => 'carousel-pause-dots-hover',
            'option_name' => 'pauseOnDotsHover',
            'default_value' => 0,
            'description' => 'Pause autoplay when a dot is hovered (autoplay must be turned on)',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Number of Rows',
            'label_for' => 'carouseel-rows',
            'option_name' => 'rows',
            'default_value' => '1',
            'description' => 'Setting this to more than one initializes grid mode. Use Slides Per Row to set how many slides should be in each row.',
            'type' => 'integer',
        ),
        //slide??
        array(
            'title' => 'Slides Per Row',
            'label_for' => 'carousel-slides-per-row',
            'option_name' => 'slidesPerRow',
            'default_value' => '1',
            'description' => 'With grid mode intialized via the rows option, this sets how many slides are in each grid row',
            'type' => 'integer',
        ),
        array(
            'title' => 'Slides To Show',
            'label_for' => 'carousel-slides-to-show',
            'option_name' => 'slidesToShow',
            'default_value' => '1',
            'description' => 'Number of slides to show',
            'type' => 'integer',
        ),
        array(
            'title' => 'Slides to Scroll',
            'label_for' => 'carousel-slides-to-scroll',
            'option_name' => 'slidesToScroll',
            'default_value' => '1',
            'description' => 'Number of slides to scroll on click / swipe',
            'type' => 'integer',
        ),
        array(
            'title' => 'Speed',
            'label_for' => 'carousel-transition-speed',
            'option_name' => 'speed',
            'default_value' => '300',
            'description' => 'Slide/fade animation speed',
            'type' => 'integer',
        ),
        array(
            'title' => 'Swipe',
            'label_for' => 'carousel-swipe',
            'option_name' => 'swipe',
            'default_value' => 1,
            'description' => 'Enable/Disable swiping',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Swipe to slide',
            'label_for' => 'carousel-swipe-to-slide',
            'option_name' => 'swipeToSlide',
            'default_value' => 0,
            'description' => 'Allow users to drag or swipe directly to a slide irrespective of slidesToScroll',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Touch move',
            'label_for' => 'carousel-touchmove',
            'option_name' => 'touchMove',
            'default_value' => 1,
            'description' => 'Enable/disable slide motion with touch',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Touch threshold',
            'label_for' => 'carousel-touch-threshold',
            'option_name' => 'touchThreshold',
            'default_value' => '5',
            'description' => 'To advance slides, the user must swipe a length of (1/threshold)*the width of the slider',
            'type' => 'integer',
        ),
        array(
            'title' => 'Variable Width Slides',
            'label_for' => 'carousel-variable-width',
            'option_name' => 'variableWidth',
            'default_value' => 0,
            'description' => 'Enable support for variable width slides. If your images are not all the same size, select this.',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Vertical Slide Mode',
            'label_for' => 'carousel-vertical',
            'option_name' => 'vertical',
            'default_value' => 0,
            'description' => 'Enables vertical slide mode',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Vertical Swiping',
            'label_for' => 'carousel-vertical-swiping',
            'option_name' => 'verticalSwiping',
            'default_value' => 0,
            'description' => 'Enable vertical swiping mode',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Right to Left',
            'label_for' => 'carousel-rtl',
            'option_name' => 'rtl',
            'default_value' => 0,
            'description' => 'Invert the direction of the carousel to become right-to-left',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Wait for Animate',
            'label_for' => 'carousel-wfa',
            'option_name' => 'waitForAnimate',
            'default_value' => 1,
            'description' => 'Ignores requests to advance the slide while animating',
            'type' => 'checkbox',
        ),
        array(
            'title' => 'Z-index',
            'label_for' => 'carousel-zindex',
            'option_name' => 'zindex',
            'default_value' => '1000',
            'description' => 'Set the z-index values for slides (useful for IE9 and older)',
            'type' => 'integer',
        ),
        array(
            'title' => 'Unslick',
            'label_for' => 'carousel-unslick',
            'option_name' => 'unslick',
            'default_value' => 0,
            'description' => 'Disable the slider for this size of window AND SMALLER (Warning: Don\'t do this unless you understand the consequences. Original HTML will be rendered, and resizing the window larger than this size will not re-enable the slider. Once a slider is disabled, it is disabled until page reload.)',
            'type' => 'checkbox'
        ),
    );

    private $responsive_option = array(
        'title' => 'Responsive Design',
        'label_for' => 'carousel-responsive',
        'option_name' => 'responsive',
        'default_value' => 0,
        'description' => 'Set this option to enable responsive design settings. Additional tabs will appear, which will give you control over how the slider is handled as the size of the window changes.',
        'type' => 'checkbox',
    );


    private $tabs = array(
        'pv' => 'Preview',
        'cf' => 'Image Configuration',
        'lg' => 'Large Screens',
        'md' => 'Medium Screens',
        'sm' => 'Small Screens',
        'xs' => 'Mobile Screens'
    );

    private $option_prefix = "slick-carousel-";
    private $admin_page_slug = 'slick-carousel';
    private $available_themes = array('light','dark');
    private $dir_path;
    private $dir_url;
    private $options_string;

    public function __construct(){

        $this->options_string = "<optgroup><option value='-1'>Nowhere</option></optgroup>";
        $this->options_string .= $this->generate_options_group('posts', null, array(
            'numberposts' => -1,
            'orderby' => 'date',
        ));
        //woocommerce support
        $this->options_string .= $this->generate_options_group('products', null, array(
            'numberposts' => -1,
            'orderby' => 'date',
            'post_type' => 'product'
        ));
        parent::__construct('slick-carousel', 'Slick Carousel', array(
            'description' => 'The visual representation of the Slick Carousel configured Carousel Options page'
        ));
    }

    public function init($dir_path, $dir_url){
        $this->dir_path = $dir_path;
        $this->dir_url = $dir_url;
        add_action('admin_menu', array($this, 'add_admin_page'));
        add_action('admin_init', array($this, 'configure_options'));
        add_action('admin_enqueue_scripts', array($this, 'register_scripts'));
        add_action('after_setup_theme', array($this, 'register_image_sizes'));
        
        add_action('wp_ajax_slick_carousel_add_image', array($this, 'add_image'));
        add_action('wp_ajax_slick_carousel_drop_image', array($this, 'drop_image'));
        add_action('wp_ajax_slick_carousel_update_destination', array($this, 'change_destination'));

        add_action('widgets_init', function(){ register_widget('Slick_Carousel'); });
        
        add_filter('wp_prepare_attachment_for_js', array($this, 'prepare_attachments'),10,3);
    }

    public function register_scripts(){
        //slick script / style
        wp_register_script('slick-js', $this->dir_url.'/slick/slick.min.js', array('jquery'), '1.8', true);
        wp_register_style('slick-css', $this->dir_url.'/slick/slick.css', array(), '1.8', 'screen');
        wp_register_style('slick-css-theme', $this->dir_url.'/slick/slick-theme.css', array(), '1.8', 'screen');

        //my scripts
        wp_register_script('carousel-admin-js', $this->dir_url.'js/carousel-admin.js', array('jquery'), false, true); 
        wp_localize_script('carousel-admin-js', 'slickCarousel', 
            array(
                'optionsString' => $this->options_string,
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'addAction' => 'slick_carousel_add_image',
                'dropAction' => 'slick_carousel_drop_image',
                'changeDestinationAction' => 'slick_carousel_update_destination'
            )
        );

        wp_register_script('carousel-render-js', $this->dir_url.'js/carousel-render.js', array('jquery','slick-js'), false, true);
        $responsive_enabled = '1' === get_option($this->option_prefix.$this->responsive_option['option_name'].'-lg', '0');
        error_log(var_export($responsive_enabled, true));


        $slick_settings = array();
        $this->parse_carousel_options($slick_settings, 'lg');
        //foreach($this->carousel_options as $option){
        //    $db_setting = get_option($this->option_prefix."{$option['option_name']}-lg", null);
        //    if($option['type'] == 'checkbox') $db_setting = $db_setting === '1';
        //    if($db_setting != null) $slick_settings[$option['option_name']] = $db_setting;
        //}

        if($responsive_enabled){
            //TODO: fix this mess
            $responsive_settings = array();
            foreach(array('md','sm','xs') as $suffix){
                error_log($suffix);
                $size_setting = array();
                $size_setting['breakpoint'] = ($suffix == 'md') ? 1200 : ($suffix == 'sm') ? 992 : 768; 
                $size_setting['settings'] = array();
                $this->parse_carousel_options($size_setting['settings'], $suffix);

                //foreach($this->carousel_options as $option){
                //    $db_setting = get_option($this->option_prefix."{$option['option_name']}-$suffix", null);
                //    if($option['type'] == 'checkbox') $db_setting = $db_setting === '1';
                //    if($db_setting != null || $db_setting == $option['default_value']) 
                //        $size_setting['settings'][$option['option_name']] = $db_setting;
                //}
                array_push($responsive_settings, $size_setting);
            }
            $slick_settings['responsive'] = $responsive_settings;
        }

        wp_localize_script('carousel-render-js', 'slickSettings', array('all' => $slick_settings));

        wp_register_style('carousel-admin-css', $this->dir_url.'css/slick-carousel-admin.css');
    }

    private function parse_carousel_options(&$arr, $suffix){
        if(!is_array($arr) || empty($suffix)) 
            throw new Exception('Invalid parameters passed to Slick_Carousel::parse_carousel_options');
        foreach($this->carousel_options as $option){
            $db_setting = get_option($this->option_prefix."{$option['option_name']}-$suffix", null);
            if($db_setting != $option['default_value']) {
                if($option['type'] == 'checkbox') $db_setting = $db_setting === '1';
                    $arr[$option['option_name']] = $db_setting;
            }
        }
    
    }

    private function generate_options_group($label, $selected, $args){
        $posts = get_posts($args);
        if(sizeof($posts) == 0) return "";
        return "<optgroup label='$label'>" . implode("", array_map(function($post) use ($selected){
            $selected_attr = $post->ID == $selected ? 'selected' : '';
            return "<option value='{$post->ID}' $selected_attr>{$post->post_title}</option>";
        }, $posts)) . "</optgroup>" ;
    }

    public function add_admin_page(){
        add_theme_page('Carousel Options', 'Carousel Options', 'edit_theme_options', $this->admin_page_slug, array($this,'slick_carousel_admin_content'));
    }

    public function register_image_sizes(){
        add_image_size('slick-carousel-display', 350, 600, true);
        add_image_size('slick-carousel-admin-preview', 175, 300, true);
    }

    public function slick_carousel_admin_content(){
        if(!current_user_can('edit_theme_options')){
            wp_die(__('You do not have permission to access this page', 'sewchic'));
        }
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'cf';

        echo '<h1>Carousel Customization Options</h1>' ;
        echo '<h2 class="nav-tab-wrapper">';
        
        $responsive_enabled = get_option($this->option_prefix.$this->responsive_option['option_name'].'-lg');
        foreach($this->tabs as $key => $title){
            if(!$responsive_enabled && !in_array($key, array('pv', 'cf', 'lg'), true)){
                continue;
            } 
            $class = 'nav-tab';
            $class .= ($active_tab == $key) ? ' nav-tab-active' : '';
            echo "<a href='?page={$this->admin_page_slug}&tab=$key' class='$class'>$title</a>";
        }
        echo '</h2>';

        if(!in_array($active_tab, array('pv','cf'))){
            echo '<form action="options.php" method="POST">';
            settings_fields($this->option_prefix.'tab-'.$active_tab);
            submit_button();
        }
        do_settings_sections($this->option_prefix.'tab-'.$active_tab);
        if(!in_array($active_tab, array('pv','cf'))){
            submit_button();
            echo '</form>';
        }
    }

    public function configure_options(){
        //the preview section
        add_settings_section(
            $this->option_prefix.'section-preview',
            'Carousel Preview',
            array($this, 'output_admin_preview'),
            $this->option_prefix.'tab-pv'
        );

        //the settings section for uploading images
        add_settings_section(
            $this->option_prefix.'section-images',
            'Image upload and configuration',
            array($this, 'output_section_images_configs_for_admin'),
            $this->option_prefix.'tab-cf'
        );

        //tabs
        //the settings section for enabling the other tabs for responsive design settings
        add_settings_section(
            $this->option_prefix.'section-responsive',
            $this->responsive_option['title'],
            function(){},
            $this->option_prefix.'tab-lg'
        ); 

        add_settings_field(
            $this->option_prefix.$this->responsive_option['option_name'].'-lg',
            $this->responsive_option['title'],
            array($this, 'generic_input_callback'),
            $this->option_prefix.'tab-lg',
            $this->option_prefix.'section-responsive',
            $this->responsive_option
        );

        //register the only setting in the group
        register_setting(
            $this->option_prefix.'tab-lg',
            $this->option_prefix.$this->responsive_option['option_name'].'-lg'
        );


        foreach(array_slice($this->tabs, 2, 4, true) as $suffix => $title){
            add_settings_section(
                $this->option_prefix."section-$suffix",
                '',
                array($this, "section_header_$suffix"),
                $this->option_prefix."tab-$suffix" 
            );


            foreach($this->carousel_options as $option){
                $option['suffix'] = $suffix;
                add_settings_field(
                    $this->option_prefix."{$option['option_name']}-$suffix",
                    $option['title'],
                    array($this, 'generic_input_callback'),
                    $this->option_prefix."tab-$suffix",
                    $this->option_prefix."section-$suffix",
                    $option
                );
                register_setting(
                    $this->option_prefix."tab-$suffix",
                    $this->option_prefix."{$option['option_name']}-$suffix"
                );
            }
        }
    }

    public function section_header_lg(){
        echo '<h3>Full-screen and large view carousel settings</h3> <p class="description">The breakpoint for large screens is 1200 pixels</p> ';
    }

    public function section_header_md(){
        echo '<h3>Medium view carousel settings</h3> <p class="description">The breakpoint for medium screens is 992 pixels</p> ';
    }

    public function section_header_sm(){
        echo '<h3>Small view carousel settings</h3> <p class="description">The breakpoint for medium screens is 762 pixels</p> '; 
    }

    public function section_header_xs(){
        echo '<h3>Small and mobile view carousel settings</h3> <p class="description">These settings apply for any screen less than 762 pixels wide.</p> ';
    }

    public function output_admin_preview(){
        $args = array(
            'before_widget' => '<div class="slick-carousel-widget" style="width:50%;margin:auto;">',
            'after_widget' => '</div>'
        );
        $this->widget($args, array('container_width' => "100%", 'theme' => 'dark'));
    }

    public function output_section_images_configs_for_admin(){
        wp_enqueue_media();
        wp_enqueue_script('carousel-admin-js');
        wp_enqueue_style('carousel-admin-css');
        $prefix = $this->option_prefix;
        //this array stores attachment ids of the images selected for the carousel and the posts they are supposed to link to 
        $elements = get_option($this->option_prefix.'elements',array()); 
        $images = array();
        

        foreach($elements as $el){
            $options_string = "<optgroup><option value='-1'>Nowhere</option></optgroup>";
            $options_string .= $this->generate_options_group('posts', $el['dest_id'], array(
                'numberposts' => -1,
                'orderby' => 'date',
            ));
            //woocommerce support
            $options_string .= $this->generate_options_group('products', $el['dest_id'], array(
                'numberposts' => -1,
                'orderby' => 'date',
                'post_type' => 'product'
            ));

            $images[] = array(
                'img_id' => $el['img_id'],
                'img_src' => wp_get_attachment_image_src($el['img_id'], 'slick-carousel-admin-preview'),
                'dest_id' => $el['dest_id'],
                'options' => $options_string
            );
        }
        require_once $this->dir_path.'/templates/admin-config.php';
    }

    public function add_image(){
        //receives: img id
        //sets initial dest id to -1 (for nothing)
        //returns ok

        $elements = get_option($this->option_prefix.'elements', array());
        $elements[] = array(
            'img_id' => $_POST['attachmentId'],
            'dest_id' => -1
        ); 
        error_log("after add_image, here's the option value: " . json_encode($elements));
        update_option($this->option_prefix.'elements', $elements);
        
        $result = array('result' => 'ok');
        error_log('returning this to javascript '. json_encode($result));
        echo json_encode($result);
        
        wp_die();
    }

    public function drop_image(){
        extract($_POST);
        error_log("received index to drop: $index");
        $elements = get_option($this->option_prefix.'elements', array());
        if(sizeof($elements) - 1 >= $index) { 
            array_splice($elements, $index, 1);
            //unset($elements[$index]);
            //$elements = array_values($elements);
            update_option($this->option_prefix.'elements', $elements);
            error_log("what's left of elements array after delete: ". json_encode($elements));
            echo json_encode(array("result" => "ok"));
        } else {
            error_log("no deletion occurred. index could not be located");
            echo json_encode(array("result" => "error", "message" => "index doesn't exist in db obj"));
        }
        wp_die();
    }

    public function change_destination(){
        extract($_POST); //index and dest
        $elements = get_option($this->option_prefix.'elements', array());
        if(sizeof($elements) - 1 >= $index && 0 <= $index){
            $elements[$index]['dest_id'] = $dest;
            update_option($this->option_prefix.'elements', $elements);
            error_log("elements array after destination change: ". json_encode($elements));
            echo json_encode(array("result" => 'ok'));
        } else {
            error_log("no update occured because the index was out of bounds");
            echo json_encode(array("result" => "error", "message" => "index received was out of bounds"));
        }
        wp_die();
    }

    public function prepare_attachments($response, $attachment, $meta){
        $size = 'slick-carousel-admin-preview';
        
        if(isset($meta['sizes'][$size])){
            $size_meta = $meta['sizes'][$size];
            $attachment_url = wp_get_attachment_url($attachment->ID);
            $base_url = str_replace(wp_basename($attachment_url), '', $attachment_url);

            $response['sizes'][$size] = array(
                'height' => $size_meta['height'],
                'width' => $size_meta['width'],
                'url' => $base_url . $size_meta['file'],
                'orientation' => $size_meta['height'] > $size_meta['width'] ? 'portrait' : 'landscape'
            );

        }
        return $response;
    }

    public function generic_input_callback($args){
        if(!isset($args['suffix'])) $args['suffix'] = 'lg';
        extract($args);
        $option = get_option("{$this->option_prefix}$option_name-$suffix");
        $option = ($option === false || (empty($option) && $type != 'checkbox')) ? $default_value : $option;

        $setDefaults = true;
        switch($type){
            case "checkbox":
                $value = '1';
                $checked = checked(1, $option, false);
                $style = '';
                $setDefaults = false;
                break;
            case "decimal":
                $type = 'number" step=".01';
                break;
            case "integer":
                $type = 'number';
                break;
            default: 
                break;
        }
        if($setDefaults){ //text (or similar)
            $value = $option;
            $checked = '';
            $style = "max-width:300px; width:100%;";
        }
        
        echo <<< EOT
            <input type="$type" name="{$this->option_prefix}$option_name-$suffix" style="$style" id="$label_for" value="$value" $checked />
EOT;
        if($type !== 'hidden'){
            echo <<< EOT
                <br /><span class="description">$description</span>
EOT;
        } 
    
    }

    //the following functions are for widget output and integration
    
    public function form($instance){
        $admin_url = admin_url("themes.php?page=slick-carousel");
        echo "<p>For all settings other than container width and theme, please visit the <a href='$admin_url'>carousel settings page</a></p>";
        if(!isset($instance['container_width'])) $instance['container_width'] = "100%";
        if(!isset($instance['theme'])) $instance['theme'] = $this->available_themes[0];
        $selected_theme = $instance['theme'];
        //outputting this form will require object methods, so can't template without doing major gymnastics
        $theme_opts = implode("\r\n",array_map(function($theme) use ($selected_theme){ 
            $selected = $selected_theme == $theme ? 'selected' : '';
            return "<option $selected>$theme</option>"; 
        }, $this->available_themes));

        if(isset($instance['errors'])){
            foreach($instance['errors'] as $error){
                echo "<div class='notice notice-error'><p>$error</p></div>";
            }
        }

        echo "<p>
                <label for='{$this->get_field_id('container_width')}'>Container Width (px or %)</label>
                <input 
                    id='{$this->get_field_id('container_width')}'
                    name='{$this->get_field_name('container_width')}'
                    type='text'
                    value='{$instance['container_width']}'
                />
            </p>
            <p>
                <label for='{$this->get_field_id('theme')}'>Theme</label>
                <select id='{$this->get_field_id('theme')}' name='{$this->get_field_name('theme')}'>
                    $theme_opts
                </select>
            </p>
        ";
    }
    
    public function update($new_instance, $old_instance){
        $sanitized_instance = array('errors' => array());
        
        $valid_width = preg_match("/^\d+(px|%)$/", $new_instance['container_width']);

        if($valid_width){
            $sanitized_instance['container_width'] = $new_instance['container_width'];
        } else {
            $sanitized_instance['container_width'] = $old_instance['container_width'];
            $sanitized_instance['errors'][] = "Invalid width entered";
        }

        $sanitized_instance['theme'] = $new_instance['theme'];

        return $sanitized_instance;
    }

    public function widget($args, $instance){
        //per-instance settings: 
        //width
        //no titles are output either
        wp_enqueue_script('slick-js');
        wp_enqueue_style('slick-css');

        //TODO: enqueue style based on option selected
        wp_enqueue_style('slick-css-theme');
        wp_enqueue_script('carousel-render-js');

        echo $args['before_widget']; 

        $elements = get_option($this->option_prefix.'elements');
        
        echo '<div style="width:'.$instance['container_width'].';" class="slick-carousel-wrapper">';

        foreach($elements as $element){
            $image_src = wp_get_attachment_image_src($element['img_id'], 'slick-carousel-display');
            $href = $element['dest_id'] == -1 ? "#" : get_post_permalink($element['dest_id']);
            require $this->dir_path.'templates/slick-element.php';

        }

        echo '</div>';

        echo $args['after_widget']; 

    }


}


?>
