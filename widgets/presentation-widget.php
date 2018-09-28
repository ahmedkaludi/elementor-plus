<?php
namespace LevelupWidgets\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Elementor Category widget
 *
 * Elementor widget for Category widget.
 *
 * @since 1.0.0
 */
class PresentationWidgets extends Widget_Base {
	/**
	 * Retrieve the widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'content-presentation';
	}
	/**
	 * Retrieve the widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Content Presentation', LEVELUP_TEXT_DOMAIN );
	}
	/**
	 * Retrieve the widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-list';
	}
	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'levelup-widgets' ];
	}
	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'content-presentation-widget' ];
	}
	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$design_controls['settings'] = array(
			array(
				'label'	=>	esc_html__( 'Content Presentation', LEVELUP_TEXT_DOMAIN ),
				'tab' 	=> 	'content'
			)
		);
		
		$this->start_controls_section(
			'section_content',
			array(
				'label' => esc_html__( 'Content Presentation', LEVELUP_TEXT_DOMAIN ),
			)
		);
		$designs = levelup_getDesignListByCategory('content-presentation');
		$defaultDesign = '';
		$defaultDesign = array_keys($designs);
		$defaultDesign = isset($defaultDesign[0])? $defaultDesign[0] : '';
		$this->add_control(
			'layoutDesignSelected',
			array(
				'label' 	=> esc_html__( 'design Selection', LEVELUP_TEXT_DOMAIN ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default'	=>$defaultDesign,
				'options'	=>$designs,
				'show_label'=>false,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelectionpoup',
							'value' => 'no',
						)
					)
				)
			)
		);

		// Content Presentation Design 1 Fields //
		$this->add_control(
			'cp1-heading1', [
				'label' => __( 'Heading', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Take a Look at Our Awesome New Product' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-1',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp1-block-1-desc', [
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Of course we haven\'t forgotten about the responsive layout. Create a website with full mobile support.' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-1',
						)
					)
				)
			]
		);
				$this->add_control(
			'cp1-ic',
			[
				'label' => __( 'Icons', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'include' =>[
							'fa fa-500px' ,
							'fa fa-address-book',
							'fa fa-address-book-o',
							'fa fa-address-card',
							'fa fa-address-card-o',
							'fa fa-adjust',
							'fa fa-adn',
							'fa fa-align-center',
							'fa fa-align-justify',
							'fa fa-align-left',
							'fa fa-align-right',
							'fa fa-amazon',
							'fa fa-ambulance',
							'fa fa-american-sign-language-interpreting',
							'fa fa-anchor',
							'fa fa-android',
							'fa fa-angellist',
							'fa fa-angle-double-down',
							'fa fa-angle-double-left',
							'fa fa-angle-double-right',
							'fa fa-angle-double-up',
							'fa fa-angle-down',
							'fa fa-angle-left',
							'fa fa-angle-right',
							'fa fa-angle-up',
							'fa fa-apple',
							'fa fa-archive',
							'fa fa-area-chart',
							'fa fa-arrow-circle-down',
							'fa fa-arrow-circle-left',
							'fa fa-arrow-circle-o-down',
							'fa fa-arrow-circle-o-left',
							'fa fa-arrow-circle-o-right',
							'fa fa-arrow-circle-o-up',
							'fa fa-arrow-circle-right',
							'fa fa-arrow-circle-up',
							'fa fa-arrow-down',
							'fa fa-arrow-left',
							'fa fa-arrow-right',
							'fa fa-arrow-up',
							'fa fa-arrows',
							'fa fa-arrows-alt',
							'fa fa-arrows-h',
							'fa fa-arrows-v',
							'fa fa-asl-interpreting',
							'fa fa-assistive-listening-systems',
							'fa fa-asterisk',
							'fa fa-at',
							'fa fa-audio-description',
							'fa fa-automobile',
							'fa fa-backward',
							'fa fa-balance-scale',
							'fa fa-ban',
							'fa fa-bandcamp',
							'fa fa-bank',
							'fa fa-bar-chart',
							'fa fa-bar-chart-o',
							'fa fa-barcode',
							'fa fa-bars',
							'fa fa-bath',
							'fa fa-bathtub',
							'fa fa-battery',
							'fa fa-battery-0',
							'fa fa-battery-1',
							'fa fa-battery-2',
							'fa fa-battery-3',
							'fa fa-battery-4',
							'fa fa-battery-empty',
							'fa fa-battery-full',
							'fa fa-battery-half',
							'fa fa-battery-quarter',
							'fa fa-battery-three-quarters',
							'fa fa-bed',
							'fa fa-beer',
							'fa fa-behance',
							'fa fa-behance-square',
							'fa fa-bell',
							'fa fa-bell-o',
							'fa fa-bell-slash',
							'fa fa-bell-slash-o',
							'fa fa-bicycle',
							'fa fa-binoculars',
							'fa fa-birthday-cake',
							'fa fa-bitbucket',
							'fa fa-bitbucket-square',
							'fa fa-bitcoin',
							'fa fa-black-tie',
							'fa fa-blind',
							'fa fa-bluetooth',
							'fa fa-bluetooth-b',
							'fa fa-bold',
							'fa fa-bolt',
							'fa fa-bomb',
							'fa fa-book',
							'fa fa-bookmark',
							'fa fa-bookmark-o',
							'fa fa-braille',
							'fa fa-briefcase',
							'fa fa-btc',
							'fa fa-bug',
							'fa fa-building',
							'fa fa-building-o',
							'fa fa-bullhorn',
							'fa fa-bullseye',
							'fa fa-bus',
							'fa fa-buysellads',
							'fa fa-cab',
							'fa fa-calculator',
							'fa fa-calendar',
							'fa fa-calendar-check-o',
							'fa fa-calendar-minus-o',
							'fa fa-calendar-o',
							'fa fa-calendar-plus-o',
							'fa fa-calendar-times-o',
							'fa fa-camera',
							'fa fa-camera-retro',
							'fa fa-car',
							'fa fa-caret-down',
							'fa fa-caret-left',
							'fa fa-caret-right',
							'fa fa-caret-square-o-down',
							'fa fa-caret-square-o-left',
							'fa fa-caret-square-o-right',
							'fa fa-caret-square-o-up',
							'fa fa-caret-up',
							'fa fa-cart-arrow-down',
							'fa fa-cart-plus',
							'fa fa-cc',
							'fa fa-cc-amex',
							'fa fa-cc-diners-club',
							'fa fa-cc-discover',
							'fa fa-cc-jcb',
							'fa fa-cc-mastercard',
							'fa fa-cc-paypal',
							'fa fa-cc-stripe',
							'fa fa-cc-visa',
							'fa fa-certificate',
							'fa fa-chain',
							'fa fa-chain-broken',
							'fa fa-check',
							'fa fa-check-circle',
							'fa fa-check-circle-o',
							'fa fa-check-square',
							'fa fa-check-square-o',
							'fa fa-chevron-circle-down',
							'fa fa-chevron-circle-left',
							'fa fa-chevron-circle-right',
							'fa fa-chevron-circle-up',
							'fa fa-chevron-down',
							'fa fa-chevron-left',
							'fa fa-chevron-right',
							'fa fa-chevron-up',
							'fa fa-child',
							'fa fa-chrome',
							'fa fa-circle',
							'fa fa-circle-o',
							'fa fa-circle-o-notch',
							'fa fa-circle-thin',
							'fa fa-clipboard',
							'fa fa-clock-o',
							'fa fa-clone',
							'fa fa-close',
							'fa fa-cloud',
							'fa fa-cloud-download',
							'fa fa-cloud-upload',
							'fa fa-cny',
							'fa fa-code',
							'fa fa-code-fork',
							'fa fa-codepen',
							'fa fa-codiepie',
							'fa fa-coffee',
							'fa fa-cog',
							'fa fa-cogs',
							'fa fa-columns',
							'fa fa-comment',
							'fa fa-comment-o',
							'fa fa-commenting',
							'fa fa-commenting-o',
							'fa fa-comments',
							'fa fa-comments-o',
							'fa fa-compass',
							'fa fa-compress',
							'fa fa-connectdevelop',
							'fa fa-contao',
							'fa fa-copy',
							'fa fa-copyright',
							'fa fa-creative-commons',
							'fa fa-credit-card',
							'fa fa-credit-card-alt',
							'fa fa-crop',
							'fa fa-crosshairs',
							'fa fa-css3',
							'fa fa-cube',
							'fa fa-cubes',
							'fa fa-cut',
							'fa fa-cutlery',
							'fa fa-dashboard',
							'fa fa-dashcube',
							'fa fa-database',
							'fa fa-deaf',
							'fa fa-deafness',
							'fa fa-dedent',
							'fa fa-delicious',
							'fa fa-desktop',
							'fa fa-deviantart',
							'fa fa-diamond',
							'fa fa-digg',
							'fa fa-dollar',
							'fa fa-dot-circle-o',
							'fa fa-download',
							'fa fa-dribbble',
							'fa fa-drivers-license',
							'fa fa-drivers-license-o',
							'fa fa-dropbox',
							'fa fa-drupal',
							'fa fa-edge',
							'fa fa-edit',
							'fa fa-eercast',
							'fa fa-eject',
							'fa fa-ellipsis-h',
							'fa fa-ellipsis-v',
							'fa fa-empire',
							'fa fa-envelope',
							'fa fa-envelope-o',
							'fa fa-envelope-open',
							'fa fa-envelope-open-o',
							'fa fa-envelope-square',
							'fa fa-envira',
							'fa fa-eraser',
							'fa fa-etsy',
							'fa fa-eur',
							'fa fa-euro',
							'fa fa-exchange',
							'fa fa-exclamation',
							'fa fa-exclamation-circle',
							'fa fa-exclamation-triangle',
							'fa fa-expand',
							'fa fa-expeditedssl',
							'fa fa-external-link',
							'fa fa-external-link-square',
							'fa fa-eye',
							'fa fa-eye-slash',
							'fa fa-eyedropper',
							'fa fa-fa',
							'fa fa-facebook',
							'fa fa-facebook-f',
							'fa fa-facebook-official',
							'fa fa-facebook-square',
							'fa fa-fast-backward',
							'fa fa-fast-forward',
							'fa fa-fax',
							'fa fa-feed',
							'fa fa-female',
							'fa fa-fighter-jet',
							'fa fa-file',
							'fa fa-file-archive-o',
							'fa fa-file-audio-o',
							'fa fa-file-code-o',
							'fa fa-file-excel-o',
							'fa fa-file-image-o',
							'fa fa-file-movie-o',
							'fa fa-file-o',
							'fa fa-file-pdf-o',
							'fa fa-file-photo-o',
							'fa fa-file-picture-o',
							'fa fa-file-powerpoint-o',
							'fa fa-file-sound-o',
							'fa fa-file-text',
							'fa fa-file-text-o',
							'fa fa-file-video-o',
							'fa fa-file-word-o',
							'fa fa-file-zip-o',
							'fa fa-files-o',
							'fa fa-film',
							'fa fa-filter',
							'fa fa-fire',
							'fa fa-fire-extinguisher',
							'fa fa-firefox',
							'fa fa-first-order',
							'fa fa-flag',
							'fa fa-flag-checkered',
							'fa fa-flag-o',
							'fa fa-flash',
							'fa fa-flask',
							'fa fa-flickr',
							'fa fa-floppy-o',
							'fa fa-folder',
							'fa fa-folder-o',
							'fa fa-folder-open',
							'fa fa-folder-open-o',
							'fa fa-font',
							'fa fa-font-awesome',
							'fa fa-fonticons',
							'fa fa-fort-awesome',
							'fa fa-forumbee',
							'fa fa-forward',
							'fa fa-foursquare',
							'fa fa-free-code-camp',
							'fa fa-frown-o',
							'fa fa-futbol-o',
							'fa fa-gamepad',
							'fa fa-gavel',
							'fa fa-gbp',
							'fa fa-ge',
							'fa fa-gear',
							'fa fa-gears',
							'fa fa-genderless',
							'fa fa-get-pocket',
							'fa fa-gg',
							'fa fa-gg-circle',
							'fa fa-gift',
							'fa fa-git',
							'fa fa-git-square',
							'fa fa-github',
							'fa fa-github-alt',
							'fa fa-github-square',
							'fa fa-gitlab',
							'fa fa-gittip',
							'fa fa-glass',
							'fa fa-glide',
							'fa fa-glide-g',
							'fa fa-globe',
							'fa fa-google',
							'fa fa-google-plus',
							'fa fa-google-plus-circle',
							'fa fa-google-plus-official',
							'fa fa-google-plus-square',
							'fa fa-google-wallet',
							'fa fa-graduation-cap',
							'fa fa-gratipay',
							'fa fa-grav',
							'fa fa-group',
							'fa fa-h-square',
							'fa fa-hacker-news',
							'fa fa-hand-grab-o',
							'fa fa-hand-lizard-o',
							'fa fa-hand-o-down',
							'fa fa-hand-o-left',
							'fa fa-hand-o-right',
							'fa fa-hand-o-up',
							'fa fa-hand-paper-o',
							'fa fa-hand-peace-o',
							'fa fa-hand-pointer-o',
							'fa fa-hand-rock-o',
							'fa fa-hand-scissors-o',
							'fa fa-hand-spock-o',
							'fa fa-hand-stop-o',
							'fa fa-handshake-o',
							'fa fa-hard-of-hearing',
							'fa fa-hashtag',
							'fa fa-hdd-o',
							'fa fa-header',
							'fa fa-headphones',
							'fa fa-heart',
							'fa fa-heart-o',
							'fa fa-heartbeat',
							'fa fa-history',
							'fa fa-home',
							'fa fa-hospital-o',
							'fa fa-hotel',
							'fa fa-hourglass',
							'fa fa-hourglass-1',
							'fa fa-hourglass-2',
							'fa fa-hourglass-3',
							'fa fa-hourglass-end',
							'fa fa-hourglass-half',
							'fa fa-hourglass-o',
							'fa fa-hourglass-start',
							'fa fa-houzz',
							'fa fa-html5',
							'fa fa-i-cursor',
							'fa fa-id-badge',
							'fa fa-id-card',
							'fa fa-id-card-o',
							'fa fa-ils',
							'fa fa-image',
							'fa fa-imdb',
							'fa fa-inbox',
							'fa fa-indent',
							'fa fa-industry',
							'fa fa-info',
							'fa fa-info-circle',
							'fa fa-inr',
							'fa fa-instagram',
							'fa fa-institution',
							'fa fa-internet-explorer',
							'fa fa-intersex',
							'fa fa-ioxhost',
							'fa fa-italic',
							'fa fa-joomla',
							'fa fa-jpy',
							'fa fa-jsfiddle',
							'fa fa-key',
							'fa fa-keyboard-o',
							'fa fa-krw',
							'fa fa-language',
							'fa fa-laptop',
							'fa fa-lastfm',
							'fa fa-lastfm-square',
							'fa fa-leaf',
							'fa fa-leanpub',
							'fa fa-legal',
							'fa fa-lemon-o',
							'fa fa-level-down',
							'fa fa-level-up',
							'fa fa-life-bouy',
							'fa fa-life-buoy',
							'fa fa-life-ring',
							'fa fa-life-saver',
							'fa fa-lightbulb-o',
							'fa fa-line-chart',
							'fa fa-link',
							'fa fa-linkedin',
							'fa fa-linkedin-square',
							'fa fa-linode',
							'fa fa-linux',
							'fa fa-list',
							'fa fa-list-alt',
							'fa fa-list-ol',
							'fa fa-list-ul',
							'fa fa-location-arrow',
							'fa fa-lock',
							'fa fa-long-arrow-down',
							'fa fa-long-arrow-left',
							'fa fa-long-arrow-right',
							'fa fa-long-arrow-up',
							'fa fa-low-vision',
							'fa fa-magic',
							'fa fa-magnet',
							'fa fa-mail-forward',
							'fa fa-mail-reply',
							'fa fa-mail-reply-all',
							'fa fa-male',
							'fa fa-map',
							'fa fa-map-marker',
							'fa fa-map-o',
							'fa fa-map-pin',
							'fa fa-map-signs',
							'fa fa-mars',
							'fa fa-mars-double',
							'fa fa-mars-stroke',
							'fa fa-mars-stroke-h',
							'fa fa-mars-stroke-v',
							'fa fa-maxcdn',
							'fa fa-meanpath',
							'fa fa-medium',
							'fa fa-medkit',
							'fa fa-meetup',
							'fa fa-meh-o',
							'fa fa-mercury',
							'fa fa-microchip',
							'fa fa-microphone',
							'fa fa-microphone-slash',
							'fa fa-minus',
							'fa fa-minus-circle',
							'fa fa-minus-square',
							'fa fa-minus-square-o',
							'fa fa-mixcloud',
							'fa fa-mobile',
							'fa fa-mobile-phone',
							'fa fa-modx',
							'fa fa-money',
							'fa fa-moon-o',
							'fa fa-mortar-board',
							'fa fa-motorcycle',
							'fa fa-mouse-pointer',
							'fa fa-music',
							'fa fa-navicon',
							'fa fa-neuter',
							'fa fa-newspaper-o',
							'fa fa-object-group',
							'fa fa-object-ungroup',
							'fa fa-odnoklassniki',
							'fa fa-odnoklassniki-square',
							'fa fa-opencart',
							'fa fa-openid',
							'fa fa-opera',
							'fa fa-optin-monster',
							'fa fa-outdent',
							'fa fa-pagelines',
							'fa fa-paint-brush',
							'fa fa-paper-plane',
							'fa fa-paper-plane-o',
							'fa fa-paperclip',
							'fa fa-paragraph',
							'fa fa-paste',
							'fa fa-pause',
							'fa fa-pause-circle',
							'fa fa-pause-circle-o',
							'fa fa-paw',
							'fa fa-paypal',
							'fa fa-pencil',
							'fa fa-pencil-square',
							'fa fa-pencil-square-o',
							'fa fa-percent',
							'fa fa-phone',
							'fa fa-phone-square',
							'fa fa-photo',
							'fa fa-picture-o',
							'fa fa-pie-chart',
							'fa fa-pied-piper',
							'fa fa-pied-piper-alt',
							'fa fa-pied-piper-pp',
							'fa fa-pinterest',
							'fa fa-pinterest-p',
							'fa fa-pinterest-square',
							'fa fa-plane',
							'fa fa-play',
							'fa fa-play-circle',
							'fa fa-play-circle-o',
							'fa fa-plug',
							'fa fa-plus',
							'fa fa-plus-circle',
							'fa fa-plus-square',
							'fa fa-plus-square-o',
							'fa fa-podcast',
							'fa fa-power-off',
							'fa fa-print',
							'fa fa-product-hunt',
							'fa fa-pull-left',
							'fa fa-pull-right',
							'fa fa-puzzle-piece',
							'fa fa-qq',
							'fa fa-qrcode',
							'fa fa-question',
							'fa fa-question-circle',
							'fa fa-question-circle-o',
							'fa fa-quora',
							'fa fa-quote-left',
							'fa fa-quote-right',
							'fa fa-ra',
							'fa fa-random',
							'fa fa-ravelry',
							'fa fa-rebel',
							'fa fa-recycle',
							'fa fa-reddit',
							'fa fa-reddit-alien',
							'fa fa-reddit-square',
							'fa fa-refresh',
							'fa fa-registered',
							'fa fa-remove',
							'fa fa-renren',
							'fa fa-reorder',
							'fa fa-repeat',
							'fa fa-reply',
							'fa fa-reply-all',
							'fa fa-resistance',
							'fa fa-retweet',
							'fa fa-rmb',
							'fa fa-road',
							'fa fa-rocket',
							'fa fa-rotate-left',
							'fa fa-rotate-right',
							'fa fa-rouble',
							'fa fa-rss',
							'fa fa-rss-square',
							'fa fa-rub',
							'fa fa-ruble',
							'fa fa-rupee',
							'fa fa-s15',
							'fa fa-safari',
							'fa fa-save',
							'fa fa-scissors',
							'fa fa-scribd',
							'fa fa-search',
							'fa fa-search-minus',
							'fa fa-search-plus',
							'fa fa-sellsy',
							'fa fa-send',
							'fa fa-send-o',
							'fa fa-server',
							'fa fa-share',
							'fa fa-share-alt',
							'fa fa-share-alt-square',
							'fa fa-share-square',
							'fa fa-share-square-o',
							'fa fa-shekel',
							'fa fa-sheqel',
							'fa fa-shield',
							'fa fa-ship',
							'fa fa-shirtsinbulk',
							'fa fa-shopping-bag',
							'fa fa-shopping-basket',
							'fa fa-shopping-cart',
							'fa fa-shower',
							'fa fa-sign-in',
							'fa fa-sign-language',
							'fa fa-sign-out',
							'fa fa-signal',
							'fa fa-signing',
							'fa fa-simplybuilt',
							'fa fa-sitemap',
							'fa fa-skyatlas',
							'fa fa-skype',
							'fa fa-slack',
							'fa fa-sliders',
							'fa fa-slideshare',
							'fa fa-smile-o',
							'fa fa-snapchat',
							'fa fa-snapchat-ghost',
							'fa fa-snapchat-square',
							'fa fa-snowflake-o',
							'fa fa-soccer-ball-o',
							'fa fa-sort',
							'fa fa-sort-alpha-asc',
							'fa fa-sort-alpha-desc',
							'fa fa-sort-amount-asc',
							'fa fa-sort-amount-desc',
							'fa fa-sort-asc',
							'fa fa-sort-desc',
							'fa fa-sort-down',
							'fa fa-sort-numeric-asc',
							'fa fa-sort-numeric-desc',
							'fa fa-sort-up',
							'fa fa-soundcloud',
							'fa fa-space-shuttle',
							'fa fa-spinner',
							'fa fa-spoon',
							'fa fa-spotify',
							'fa fa-square',
							'fa fa-square-o',
							'fa fa-stack-exchange',
							'fa fa-stack-overflow',
							'fa fa-star',
							'fa fa-star-half',
							'fa fa-star-half-empty',
							'fa fa-star-half-full',
							'fa fa-star-half-o',
							'fa fa-star-o',
							'fa fa-steam',
							'fa fa-steam-square',
							'fa fa-step-backward',
							'fa fa-step-forward',
							'fa fa-stethoscope',
							'fa fa-sticky-note',
							'fa fa-sticky-note-o',
							'fa fa-stop',
							'fa fa-stop-circle',
							'fa fa-stop-circle-o',
							'fa fa-street-view',
							'fa fa-strikethrough',
							'fa fa-stumbleupon',
							'fa fa-stumbleupon-circle',
							'fa fa-subscript',
							'fa fa-subway',
							'fa fa-suitcase',
							'fa fa-sun-o',
							'fa fa-superpowers',
							'fa fa-superscript',
							'fa fa-support',
							'fa fa-table',
							'fa fa-tablet',
							'fa fa-tachometer',
							'fa fa-tag',
							'fa fa-tags',
							'fa fa-tasks',
							'fa fa-taxi',
							'fa fa-telegram',
							'fa fa-television',
							'fa fa-tencent-weibo',
							'fa fa-terminal',
							'fa fa-text-height',
							'fa fa-text-width',
							'fa fa-th',
							'fa fa-th-large',
							'fa fa-th-list',
							'fa fa-themeisle',
							'fa fa-thermometer',
							'fa fa-thermometer-0',
							'fa fa-thermometer-1',
							'fa fa-thermometer-2',
							'fa fa-thermometer-3',
							'fa fa-thermometer-4',
							'fa fa-thermometer-empty',
							'fa fa-thermometer-full',
							'fa fa-thermometer-half',
							'fa fa-thermometer-quarter',
							'fa fa-thermometer-three-quarters',
							'fa fa-thumb-tack',
							'fa fa-thumbs-down',
							'fa fa-thumbs-o-down',
							'fa fa-thumbs-o-up',
							'fa fa-thumbs-up',
							'fa fa-ticket',
							'fa fa-times',
							'fa fa-times-circle',
							'fa fa-times-circle-o',
							'fa fa-times-rectangle',
							'fa fa-times-rectangle-o',
							'fa fa-tint',
							'fa fa-toggle-down',
							'fa fa-toggle-left',
							'fa fa-toggle-off',
							'fa fa-toggle-on',
							'fa fa-toggle-right',
							'fa fa-toggle-up',
							'fa fa-trademark',
							'fa fa-train',
							'fa fa-transgender',
							'fa fa-transgender-alt',
							'fa fa-trash',
							'fa fa-trash-o',
							'fa fa-tree',
							'fa fa-trello',
							'fa fa-tripadvisor',
							'fa fa-trophy',
							'fa fa-truck',
							'fa fa-try',
							'fa fa-tty',
							'fa fa-tumblr',
							'fa fa-tumblr-square',
							'fa fa-turkish-lira',
							'fa fa-tv',
							'fa fa-twitch',
							'fa fa-twitter',
							'fa fa-twitter-square',
							'fa fa-umbrella',
							'fa fa-underline',
							'fa fa-undo',
							'fa fa-universal-access',
							'fa fa-university',
							'fa fa-unlink',
							'fa fa-unlock',
							'fa fa-unlock-alt',
							'fa fa-unsorted',
							'fa fa-upload',
							'fa fa-usb',
							'fa fa-usd',
							'fa fa-user',
							'fa fa-user-circle',
							'fa fa-user-circle-o',
							'fa fa-user-md',
							'fa fa-user-o',
							'fa fa-user-plus',
							'fa fa-user-secret',
							'fa fa-user-times',
							'fa fa-users',
							'fa fa-vcard',
							'fa fa-vcard-o',
							'fa fa-venus',
							'fa fa-venus-double',
							'fa fa-venus-mars',
							'fa fa-viacoin',
							'fa fa-viadeo',
							'fa fa-viadeo-square',
							'fa fa-video-camera',
							'fa fa-vimeo',
							'fa fa-vimeo-square',
							'fa fa-vine',
							'fa fa-vk',
							'fa fa-volume-control-phone',
							'fa fa-volume-down',
							'fa fa-volume-off',
							'fa fa-volume-up',
							'fa fa-warning',
							'fa fa-wechat',
							'fa fa-weibo',
							'fa fa-weixin',
							'fa fa-whatsapp',
							'fa fa-wheelchair',
							'fa fa-wheelchair-alt',
							'fa fa-wifi',
							'fa fa-wikipedia-w',
							'fa fa-window-close',
							'fa fa-window-close-o',
							'fa fa-window-maximize',
							'fa fa-window-minimize',
							'fa fa-window-restore',
							'fa fa-windows',
							'fa fa-won',
							'fa fa-wordpress',
							'fa fa-wpbeginner',
							'fa fa-wpexplorer',
							'fa fa-wpforms',
							'fa fa-wrench',
							'fa fa-xing',
							'fa fa-xing-square',
							'fa fa-y-combinator',
							'fa fa-y-combinator-square',
							'fa fa-yahoo',
							'fa fa-yc',
							'fa fa-yc-square',
							'fa fa-yelp',
							'fa fa-yen',
							'fa fa-yoast',
							'fa fa-youtube',
							'fa fa-youtube-play',
							'fa fa-youtube-square',
				],
				'default' => 'fa fa-apple',
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-1',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp1-block-1-btn', [
				'label' => __( 'Button Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Avaliable on App Store' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-1',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp1-block-1-btnlnk', [
				'label' => __( 'Button Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '#' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-1',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp1-image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			'conditions'=> array(
				'terms'	=> array(
					array(
						'name' => 'layoutDesignSelected',
						'value' => 'content-presentation-design-1',
					)
				)
			)
			]
		);
		$repeater1 = new \Elementor\Repeater();

		$repeater1->add_control(
			'title-1', [
				'label' => __( 'Heading', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$repeater1->add_control(
			'text_description1',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'Description', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
			]
		);
		$this->add_control(
			'cp1-rep',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater1->get_controls(),
				'default' => [
					[
						'title-1'=>__( 'FULL CONTROL', 'plugin-domain' ),
						'text_description1'=>__( 'Easily change and tweak your content when you need to, however you want, No more third party wendor lock-in.', 'plugin-domain' ),
					],
					[
						'title-1'=>__( 'FOR FREELANCERS AND AGENCIES', 'plugin-domain' ),
						'text_description1'=>__( 'Easily change and tweak your content when you need to, however you want, No more third party wendor lock-in.', 'plugin-domain' ),
					],
					[
						'title-1'=>__( 'CMD + C / CMD + V', 'plugin-domain' ),
						'text_description1'=>__( 'Easily change and tweak your content when you need to, however you want, No more third party wendor lock-in.', 'plugin-domain' ),
					],
				],
				'title_field' => 'Repeater',
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-1',
						)
					)
				)
			]
		);
		// Content Presentation Design 2 Fields //
		$this->add_control(
			'cp2-heading1', [
				'label' => __( 'Heading', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Samples will show you the feeling on how to display around using the components in the website building process.' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-2',
						)
					)
				)
			]
		);		
		$this->add_control(
			'cp2-image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			'conditions'=> array(
				'terms'	=> array(
					array(
						'name' => 'layoutDesignSelected',
						'value' => 'content-presentation-design-2',
					)
				)
			)
			]
		);
		$repeater2 = new \Elementor\Repeater();

		$repeater2->add_control(
			'title-2', [
				'label' => __( 'Heading', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$repeater2->add_control(
			'text_description2',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'Description', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
			]
		);
		$repeater2->add_control(
			'cp2-btn', [
				'label' => __( 'Button Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Avaliable on App Store' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$repeater2->add_control(
			'cp2-btnlnk', [
				'label' => __( 'Button Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '#' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'cp2-rep',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'title-2'=>__( 'How Startup Frame works?', 'plugin-domain' ),
						'text_description2'=>__( 'The Generator App is an onlinetoll thta helps you to export ready made templates ready to work as your future website. It helps you to combine slides, panels and other components and export it as a set of static files: HYML/CSS/JS.', 'plugin-domain' ),
						'cp2-btn'=>__( 'View Tutorial', 'plugin-domain' ),
						'cp2-btnlnk'=>__( '#', 'plugin-domain' ),
					],
					[
						'title-2'=>__( 'Do you provide hosting with Startup Framework?', 'plugin-domain' ),
						'text_description2'=>__( 'No, hosting is on you. You upload the result on your hosting via FTP or using tools you like. You can use any server, just make sure it have a PHP installed in case if you need a contact form.', 'plugin-domain' ),
						'cp2-btn'=>__( 'Learn More', 'plugin-domain' ),
						'cp2-btnlnk'=>__( '#', 'plugin-domain' ),
					],
				],
				'title_field' => 'Repeater',
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-2',
						)
					)
				)
			]
		);
		// Content Presentation Design 3 Fields //
		$this->add_control(
			'cp3-heading1', [
				'label' => __( 'Heading', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Welcome Home Designers.' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-3',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp3-desc', [
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'We have created a new product that will help designers, developers and companies create websites for their startups quickly and easily.' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-3',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp3-btn', [
				'label' => __( 'Button Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Purchase Now for $248' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-3',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp3-btnlnk', [
				'label' => __( 'Button Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '#' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-3',
						)
					)
				)
			]
		);
		$repeater3 = new \Elementor\Repeater();

		$repeater3->add_control(
			'title-3', [
				'label' => __( 'Heading', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$repeater3->add_control(
			'text_description3',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'Description', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
			]
		);	
		$this->add_control(
			'cp3-rep',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater3->get_controls(),
				'default' => [
					[
						'title-3'=>__( 'Build Quick', 'plugin-domain' ),
						'text_description3'=>__( 'Get a beautiful site up and running in no time. Just choose Startup Framework you like and start tweaking it.', 'plugin-domain' ),
						
					],
					[
						'title-3'=>__( 'A Lot of blocks', 'plugin-domain' ),
						'text_description3'=>__( 'Enjoy endless possibilities nd results with many blocks to tinker and combine with.', 'plugin-domain' ),
					],
					[
						'title-3'=>__( 'Fully Responsive', 'plugin-domain' ),
						'text_description3'=>__( 'Your site will look great and work seamlessly across difference devices and platforms.', 'plugin-domain' ),
					],
					[
						'title-3'=>__( 'Build Today', 'plugin-domain' ),
						'text_description3'=>__( 'Transform you ideas into reality and lunch a beautiful site with minimal frustration.', 'plugin-domain' ),
					],
				],
				'title_field' => 'Repeater',
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-3',
						)
					)
				)
			]
		);
		// Content Presentation Design 4 Fields //
		$this->add_control(
			'cp4-heading1', [
				'label' => __( 'Heading', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Simple Design & prototyping' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-4',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp4-desc', [
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Startup Framework gives you complete freedom over your creative process--you don\'t have to think about any technical aspects.' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-4',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp4-btn', [
				'label' => __( 'Button Text', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Get Started' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-4',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp4-btnlnk', [
				'label' => __( 'Button Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '#' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-4',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp4-sub-heading', [
				'label' => __( 'Sub Heading', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'It is absolutely free.' , 'plugin-domain' ),
				'label_block' => true,
				'conditions'=> array(
					'terms'	=> array(
						array(
							'name' => 'layoutDesignSelected',
							'value' => 'content-presentation-design-4',
						)
					)
				)
			]
		);
		$this->add_control(
			'cp4-image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			'conditions'=> array(
				'terms'	=> array(
					array(
						'name' => 'layoutDesignSelected',
						'value' => 'content-presentation-design-4',
					)
				)
			)
			]
		);
		$this->end_controls_section();

	}//Control settings are closed
	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		$markup = \LevelupDesign\render($settings);
		if($markup){
			$markup = $this->replacements_procees($settings,$markup);
		}
		echo $markup;
	}
	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 */
	/*protected function _content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}*/
	private function query_data($rawhtml, $settings){
		//check is contain loop
		$allPostsMarkup = '';
		$loopPositionMarkup = array();
		$isSinglulerPost = false;
		if(strpos($rawhtml,'{{loop_html')!==false){
			//Case Studies
			/**
			* All Loop Design is Similar
			**/
			if(strpos($rawhtml,'{{loop_html_start}}')!==false){
				 preg_match("/({{loop_html_start}})(.*?)({{loop_html_end}})/s", $rawhtml, $matches);
				if(isset($matches[2])){
					$allPostsMarkup = $matches[2];
				}
			}
			/**
			* Multi Design Loop Familiar with position
			**/
			preg_match_All("/{{loop_html_start_(.*?)}}/s", $rawhtml, $positionmatches, PREG_OFFSET_CAPTURE);
			if(count(array_filter($positionmatches))>0){
				if(isset($positionmatches[1])){
					foreach ($positionmatches[1] as $positionArrayVal) {
						$loopPosition = $positionArrayVal[0];
						preg_match("/({{loop_html_start_".$loopPosition."}})(.*?)({{loop_html_end_".$loopPosition."}})/s", $rawhtml, $matchesPosHtml);
						if(isset($matchesPosHtml[2])){
							$loopPositionMarkup[$loopPosition] = $matchesPosHtml[2];
						}
					}
				}

			}
			//if(strpos($rawhtml,'{{loop_html_start}}')!==false)

		}else{
			//Normal single loop markup 
			$isSinglulerPost = true; 
			$replaceHtml = $rawhtml;
		}

		$args = array(
				'cat' => $settings['selected_category'],//$fieldValues['category_selection'],
				'has_password' => false,
				'post_status'=> 'publish'
			);
		if($isSinglulerPost){
			$args['posts_per_page'] = 1;
		}else{
			$args['posts_per_page'] = ( $settings['listShowNumbers']? $settings['listShowNumbers'] : get_option( 'posts_per_page' ) );
		}
		//print_r($args);die;
		$loopReplacedHtmls = '';
		$loopPositionReplacedMarkup = array();
		//The Query
		$the_query = new \WP_Query( $args );
		if ( $the_query->have_posts() ) {
			$key = 1;
			while ( $the_query->have_posts() ) {
				$the_query->the_post();		
				$postid = get_the_ID();
				$trakCurrentMarkup = array();
				if($isSinglulerPost){
					$replaceHtmls = $replaceHtml;
					$content = '';
					ob_start();
					eval('?>'.$replaceHtmls);
					$content = ob_get_contents();
					ob_end_clean();
					$replaceHtmls = $content;
				}else{
					if( isset($loopPositionMarkup[$key]) ){
						$replaceHtmls = $loopPositionMarkup[$key];
						$content = '';
						ob_start();
						eval('?>'.$replaceHtmls);
						$content = ob_get_contents();
						ob_end_clean();
						$loopPositionReplacedMarkup[$key] = $content;
					}else{
						$content = '';
						ob_start();
						eval("?>".$allPostsMarkup);
						$content = ob_get_contents();
						ob_end_clean();
						$loopReplacedHtmls .= $content;
					}
				}


				$key++;
			}//While Loop Closed

		}
		  wp_reset_postdata();
		  wp_reset_query();
		if($isSinglulerPost){
			return $replaceHtmls;
		}
		if(strpos($rawhtml,'{{loop_html')!==false){
			//Case Studies
			/**
			* All Loop Design is Similar
			**/
			if(strpos($rawhtml,'{{loop_html_start}}')!==false){
				$rawhtml = preg_replace("/({{loop_html_start}})(.*?)({{loop_html_end}})/s",$loopReplacedHtmls, $rawhtml);
			}
			/**
			* Multi Design Loop Familiar with position
			**/
			preg_match_All("/{{loop_html_start_(.*?)}}/s", $rawhtml, $positionmatches, PREG_OFFSET_CAPTURE);
			if(count(array_filter($positionmatches))>0){
				if(isset($positionmatches[1])){
					foreach ($positionmatches[1] as $positionArrayVal) {
						$loopPosition = $positionArrayVal[0];
						$rawhtml = preg_replace("/({{loop_html_start_".$loopPosition."}})(.*?)({{loop_html_end_".$loopPosition."}})/s", $loopPositionReplacedMarkup[$loopPosition],$rawhtml);
						
					}
				}

			}
			//if(strpos($rawhtml,'{{loop_html_start}}')!==false)

		}

		return $rawhtml;
	}

	private function replacements_procees( $settingArray, $markup ){
		//Start Replacement Process


		preg_match_all("/{{(.*?)}}/", $markup,$matches);
		if(isset($matches[1])){
			foreach ($matches[1] as $key => $fieldName) {
				$isReplace = false;
				$replacementVal = '';
				if( isset($settingArray[$fieldName]) ){
					if( !is_array($settingArray[$fieldName]) ){
						$isReplace = true;
						$replacementVal = $settingArray[$fieldName];
					}
				}

				if($isReplace){
					$markup = preg_replace("/{{".$fieldName."}}/i", $settingArray[$fieldName], $markup);
				}

			}//Closed Foreach $matches[1];
		}// closed isset($matches[1])
		$markup = $this->query_data($markup, $settingArray);
		return $markup;
	}

	private function replaceIfContentConditional($byReplace, $replaceWith, $string){
		preg_match_all("{{if_condition_".$byReplace."==(.*?)}}", $string,$matches);
		if(isset($matches[1]) && count($matches[1])>0){
			$matches[1] = array_unique($matches[1]);
			foreach ($matches[1] as $key => $matchValue) {
				if(trim($matchValue) != trim($replaceWith)){
					$string = str_replace(array("{{if_condition_".$byReplace."==".$matchValue."}}","{{ifend_condition_".$byReplace."_".$matchValue."}}"), array("<amp-condition>","</amp-condition>"), $string);
					
					$string = preg_replace_callback('/(<amp-condition>)(.*?)(<\/amp-condition>)/s', function($match){
						return "";
					}, $string);
				}else{
					$string = str_replace(array("{{if_condition_".$byReplace."==".$matchValue."}}","{{ifend_condition_".$byReplace."_".$matchValue."}}"), array("",""), $string);
				}
			}//FOreach Closed
		}//If Closed

		if(strpos($string,'{{if_'.$byReplace.'}}')!==false){
			$string = str_replace(array('{{if_'.$byReplace.'}}','{{ifend_'.$byReplace.'}}',), array("<amp-condition>","</amp-condition>"), $string);
			if($replaceWith=="" && trim($replaceWith)==""){
				$string = preg_replace("/<amp-condition>(.*)<\/amp-condition>/i", "", $string);
				$string = preg_replace("/<amp-condition>(.*)<\/amp-condition>/s", "", $string);
			}
			$string = str_replace(array('<amp-condition>','</amp-condition>'), array("",""), $string);
		}
		return $string;
	}

}//Class Closed