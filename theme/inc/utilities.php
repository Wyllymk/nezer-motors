<?php
/**
 * Nezer Motors — inc/utilities.php
 *
 * Reusable PHP helper functions: branch data, nav helpers,
 * gallery, partners, service lists, SEO meta.
 *
 * @package nezer-motors
 */

defined( 'ABSPATH' ) || exit;

/* ============================================================
   BRANCH DATA — single source of truth
============================================================ */

/**
 * Returns full data for both branches.
 *
 * @return array
 */
function nm_branch_data() : array {
	return [
		'autocare' => [
			'name'      => esc_html__( 'AutoCare Express', 'nezer-motors' ),
			'tagline'   => esc_html__( 'A Nezer Motors Branch', 'nezer-motors' ),
			'phone'     => '0733 204 672',
			'tel'       => '+254733204672',
			'email'     => 'info@nezermotors.com',
			'location'  => esc_html__( 'Kingongo, Opposite GK Prison, Nyeri', 'nezer-motors' ),
			'address'   => esc_html__( 'P.O. Box 643, 10100 Nyeri', 'nezer-motors' ),
			'hours'     => esc_html__( 'Mon – Sat, 8:00 AM – 5:00 PM', 'nezer-motors' ),
			'maps_url'  => 'https://maps.google.com/?q=Kingongo+GK+Prison+Nyeri+Kenya',
			'services'  => [
				esc_html__( 'Mechanical Repairs', 'nezer-motors' ),
				esc_html__( 'Engine Overhaul',    'nezer-motors' ),
				esc_html__( 'Suspension',          'nezer-motors' ),
				esc_html__( 'Shocks',              'nezer-motors' ),
			],
			'color'     => '#1e40af',
			'color_to'  => '#2563eb',
			'logo'      => 'autocare-logo.png',
			'logo_alt'  => esc_attr__( 'AutoCare Express logo', 'nezer-motors' ),
		],
		'qwikfix'  => [
			'name'      => esc_html__( 'QwikFix', 'nezer-motors' ),
			'tagline'   => esc_html__( 'Shell Service Station, Nyeri', 'nezer-motors' ),
			'phone'     => '0701 104 644',
			'tel'       => '+254701104644',
			'email'     => 'info@nezermotors.com',
			'location'  => esc_html__( 'Shell Service Station, Nyeri-Nyahururu Road', 'nezer-motors' ),
			'address'   => esc_html__( 'P.O. Box 643, 10100 Nyeri', 'nezer-motors' ),
			'hours'     => esc_html__( 'Mon – Sat, 8:00 AM – 5:00 PM', 'nezer-motors' ),
			'maps_url'  => 'https://maps.google.com/?q=Shell+Kingongo+Nyeri+Nyahururu+Road+Kenya',
			'services'  => [
				esc_html__( 'Wheel Balancing',  'nezer-motors' ),
				esc_html__( 'Alignment',        'nezer-motors' ),
				esc_html__( 'Oil Change',       'nezer-motors' ),
				esc_html__( 'Batteries',        'nezer-motors' ),
				esc_html__( 'Tyre Sales',       'nezer-motors' ),
				esc_html__( 'Car Accessories',  'nezer-motors' ),
			],
			'color'     => '#dc2626',
			'color_to'  => '#ef4444',
			'logo'      => 'qwikfix-logo.png',
			'logo_alt'  => esc_attr__( 'QwikFix logo', 'nezer-motors' ),
		],
	];
}

/**
 * Returns a single branch array by key.
 *
 * @param string $key 'autocare' or 'qwikfix'.
 * @return array
 */
function nm_branch( string $key ) : array {
	return nm_branch_data()[ $key ] ?? [];
}

/* ============================================================
   PRODUCT DATA
============================================================ */

/**
 * Returns product list for the products section.
 *
 * @return array
 */
function nm_products() : array {
	return [
		[
			'name'  => esc_html__( 'Tyres',       'nezer-motors' ),
			'desc'  => esc_html__( 'Quality tyres for all vehicle types. Wide range of brands and sizes in stock at both branches.', 'nezer-motors' ),
			'icon'  => '🔘',
			'img'   => 'tyres.webp',
			'alt'   => esc_attr__( 'Assorted car tyres on display', 'nezer-motors' ),
			'color' => '#1e3a8a',
		],
		[
			'name'  => esc_html__( 'Batteries',   'nezer-motors' ),
			'desc'  => esc_html__( 'Reliable batteries for all vehicles. Testing and professional fitting included.', 'nezer-motors' ),
			'icon'  => '⚡',
			'img'   => 'batteries.webp',
			'alt'   => esc_attr__( 'Car batteries ready for fitting', 'nezer-motors' ),
			'color' => '#713f12',
		],
		[
			'name'  => esc_html__( 'Shocks',      'nezer-motors' ),
			'desc'  => esc_html__( 'Genuine shock absorbers to restore ride comfort and vehicle handling.', 'nezer-motors' ),
			'icon'  => '🏎️',
			'img'   => 'shocks.webp',
			'alt'   => esc_attr__( 'Shock absorbers for cars', 'nezer-motors' ),
			'color' => '#1e40af',
		],
		[
			'name'  => esc_html__( 'Lubricants',  'nezer-motors' ),
			'desc'  => esc_html__( 'Engine oils and lubricants from trusted brands for optimal vehicle performance.', 'nezer-motors' ),
			'icon'  => '🛢️',
			'img'   => 'lubricants.webp',
			'alt'   => esc_attr__( 'Engine oil and lubricant products', 'nezer-motors' ),
			'color' => '#78350f',
		],
		[
			'name'  => esc_html__( 'Accessories', 'nezer-motors' ),
			'desc'  => esc_html__( 'A curated range of quality car accessories to enhance and personalise your vehicle.', 'nezer-motors' ),
			'icon'  => '🛒',
			'img'   => 'accessories.webp',
			'alt'   => esc_attr__( 'Car accessories and add-ons', 'nezer-motors' ),
			'color' => '#134e4a',
		],
	];
}

/* ============================================================
   PARTNERS DATA
============================================================ */

/**
 * Returns partner/brand list for the marquee strip.
 *
 * @return array
 */
/**
 * Returns partner/brand list for the marquee strip.
 *
 * @return array
 */
function nm_partners() : array {
    return [
        [ 'name' => 'Shell',          'logo' => 'shell.png',          'alt' => esc_attr__( 'Shell fuel and lubricants',  'nezer-motors' ) ],
        [ 'name' => 'Castrol',        'logo' => 'castrol.png',        'alt' => esc_attr__( 'Castrol engine oils',        'nezer-motors' ) ],
        [ 'name' => 'Mobil',          'logo' => 'mobil.png',          'alt' => esc_attr__( 'Mobil lubricants',           'nezer-motors' ) ],
        [ 'name' => 'Total Energies', 'logo' => 'total-energies.png', 'alt' => esc_attr__( 'TotalEnergies products',    'nezer-motors' ) ],
        [ 'name' => 'Michelin',       'logo' => 'michelin.png',       'alt' => esc_attr__( 'Michelin tyres',            'nezer-motors' ) ],
        [ 'name' => 'Bridgestone',    'logo' => 'bridgestone.png',    'alt' => esc_attr__( 'Bridgestone tyres',         'nezer-motors' ) ],
        [ 'name' => 'Goodyear',       'logo' => 'goodyear.png',       'alt' => esc_attr__( 'Goodyear tyres',            'nezer-motors' ) ],
        [ 'name' => 'Bosch',          'logo' => 'bosch.png',          'alt' => esc_attr__( 'Bosch automotive parts',    'nezer-motors' ) ],
        [ 'name' => 'NGK',            'logo' => 'ngk.png',            'alt' => esc_attr__( 'NGK spark plugs',           'nezer-motors' ) ],
        [ 'name' => 'Toyota',         'logo' => 'toyota.png',         'alt' => esc_attr__( 'Toyota vehicles',           'nezer-motors' ) ],
        [ 'name' => 'Hyundai',        'logo' => 'hyundai.png',        'alt' => esc_attr__( 'Hyundai vehicles',          'nezer-motors' ) ],
        [ 'name' => 'Nissan',         'logo' => 'nissan.png',         'alt' => esc_attr__( 'Nissan vehicles',           'nezer-motors' ) ],
    ];
}

/* ============================================================
   REUSABLE HTML COMPONENTS
============================================================ */

/**
 * Renders a branch logo img tag using WordPress standards.
 *
 * @param string $branch_key 'autocare' or 'qwikfix'.
 * @param string $classes    Additional Tailwind classes.
 */
function nm_branch_logo( string $branch_key, string $classes = 'h-12 w-auto object-contain' ) : void {
	$branch = nm_branch( $branch_key );
	if ( empty( $branch ) ) return;
	$src = esc_url( get_template_directory_uri() . '/assets/img/' . $branch['logo'] );
	$alt = $branch['logo_alt'];
	printf(
		'<img src="%s" alt="%s" class="%s" loading="lazy">',
		$src,
		$alt,
		esc_attr( $classes )
	);
}

/**
 * Renders a single branch info card (location, hours, phone).
 *
 * @param string $key     'autocare' or 'qwikfix'.
 * @param string $context 'footer' | 'contact' | 'card'.
 */
function nm_branch_info_card( string $key, string $context = 'card' ) : void {
	$b = nm_branch( $key );
	if ( empty( $b ) ) return;

	$ac  = $key === 'autocare';
	$col = $ac ? 'text-blue-400' : 'text-red-400';

	echo '<div class="space-y-2">';
	printf(
		'<div class="flex items-start gap-3"><svg class="w-4 h-4 %s flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg><p class="font-body text-sm text-white/70">%s</p></div>',
		esc_attr( $col ), esc_html( $b['location'] )
	);
	printf(
		'<div class="flex items-center gap-3"><svg class="w-4 h-4 %s flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg><p class="font-body text-sm text-white/70">%s</p></div>',
		esc_attr( $col ), esc_html( $b['hours'] )
	);
	printf(
		'<div class="flex items-center gap-3"><svg class="w-4 h-4 %s flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg><a href="%s" class="font-body text-sm text-white/70 hover:text-white transition-colors">%s</a></div>',
		esc_attr( $col ),                  
		esc_url( 'tel:' . $b['tel'] ),
		esc_html( $b['phone'] )
	);
	printf(
		'<div class="flex items-center gap-3"><svg class="w-4 h-4 %s flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg><p class="font-body text-sm text-white/70">%s</p></div>',
		esc_attr( $col ), esc_html( $b['address'] )
	);
	echo '</div>';
}

/**
 * Outputs a service badge chip.
 *
 * @param string $service Service name.
 * @param string $branch  'autocare' or 'qwikfix'.
 */
function nm_service_chip( string $service, string $branch = 'autocare' ) : void {
	$is_ac = $branch === 'autocare';
	$style = $is_ac
		? 'background:rgba(30,64,175,0.2);border:1px solid rgba(59,130,246,0.3);color:#0078ff;'
		: 'background:rgba(220,38,38,0.2);border:1px solid rgba(239,68,68,0.3);color:#ff0000;';
	printf(
		'<span class="text-xs px-2.5 py-1 rounded-full font-sub font-700" style="%s">%s</span>',
		esc_attr( $style ),
		esc_html( $service )
	);
}

/**
 * Renders the partners marquee strip.
 * Outputs two sets for infinite loop.
 */
/**
 * Renders the partners marquee strip.
 * Outputs two sets for infinite loop.
 */
/**
 * Renders the partners marquee strip.
 * Outputs two sets for infinite loop.
 */
function nm_partners_strip() : void {
    $partners = nm_partners();
    $base_url = get_template_directory_uri() . '/assets/img/';

    $set = '';
    foreach ( $partners as $p ) {
        $set .= sprintf(
            '<div class="flex-shrink-0 mx-5 w-28 h-14 rounded-xl bg-white dark:bg-white/[0.06] border border-gray-200 dark:border-white/10 overflow-hidden" role="listitem" aria-label="%s">
                <img src="%s" alt="%s" class="w-full h-full object-contain p-2" loading="lazy">
            </div>',
            esc_attr( $p['alt'] ),
            esc_url( $base_url . $p['logo'] ),
            esc_attr( $p['alt'] )
        );
    }

    echo '<div class="nm-marquee-track" role="list" aria-label="' . esc_attr__( 'Brand partners', 'nezer-motors' ) . '">';
    echo $set . $set;
    echo '</div>';
}

/**
 * Renders a masonry gallery grid with lightbox support.
 *
 * @param string $branch_key  'autocare' or 'qwikfix'.
 * @param string $gallery_id  HTML id for the gallery wrapper.
 * @param int    $count       Number of placeholder slots.
 */
function nm_gallery_grid( string $branch_key, string $gallery_id, int $count = 12 ) : void {
	$is_ac   = $branch_key === 'autocare';
	$folder  = $is_ac ? 'autocare' : 'qwikfix';
	$col     = $is_ac ? 'rgba(30,64,175,0.22)' : 'rgba(220,38,38,0.22)';
	$label   = $is_ac
		? esc_html__( 'AutoCare Express workshop photos', 'nezer-motors' )
		: esc_html__( 'QwikFix service bay photos', 'nezer-motors' );

	// Heights for visual variety (px)
	$heights = [ 220, 280, 240, 200, 260, 230, 280, 220, 250, 210, 240, 270 ];

	echo '<div id="' . esc_attr( $gallery_id ) . '" class="nm-gallery-grid" role="list" aria-label="' . $label . '">';

	for ( $i = 1; $i <= $count; $i++ ) {
		$h      = $heights[ ( $i - 1 ) % count( $heights ) ];
		$src    = esc_url( get_template_directory_uri() . "/assets/img/{$folder}/photo{$i}.jpg" );
		/* translators: %1$s = branch name, %2$d = photo number */
		$alt    = sprintf( esc_attr__( '%1$s — photo %2$d', 'nezer-motors' ), $is_ac ? 'AutoCare Express' : 'QwikFix', $i );

		printf(
			'<div class="nm-gallery-item group relative overflow-hidden rounded-xl cursor-pointer" data-gallery-item style="--nm-h:%dpx" role="listitem">
				<img src="%s" alt="%s" loading="lazy" decoding="async"
					class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
					onerror="this.parentElement.classList.add(\'nm-placeholder\')">
				<div class="nm-placeholder-inner absolute inset-0 flex-col items-center justify-center gap-2 hidden">
					<svg class="w-8 h-8 opacity-25 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
					<span class="font-sub text-xs font-700 text-white/40">%s %d</span>
				</div>
				<div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center" style="background:%s" aria-hidden="true">
					<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
				</div>
			</div>',
			$h, $src, $alt,
			esc_html__( 'Photo', 'nezer-motors' ),
			$i,
			esc_attr( $col )
		);
	}

	echo '</div>';

	// Lightbox (shared, rendered once per page via footer.php)
}

/**
 * Renders the shared lightbox markup. Call once per page.
 */
function nm_lightbox() : void {
	?>
<div id="nm-lightbox" class="nm-lightbox" role="dialog" aria-modal="true"
    aria-label="<?php esc_attr_e( 'Photo lightbox', 'nezer-motors' ); ?>">
    <button id="nm-lb-prev" class="nm-lb-btn nm-lb-prev"
        aria-label="<?php esc_attr_e( 'Previous photo', 'nezer-motors' ); ?>">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
        </svg>
    </button>
    <div class="nm-lb-content">
        <img id="nm-lb-img" src="" alt="" class="nm-lb-image">
        <div class="nm-lb-meta">
            <span id="nm-lb-count" class="font-body text-white/60 text-sm"></span>
            <button id="nm-lb-close" class="font-sub font-700 text-white/60 hover:text-white text-sm transition-colors"
                aria-label="<?php esc_attr_e( 'Close lightbox', 'nezer-motors' ); ?>">
                <?php esc_html_e( 'Close ✕', 'nezer-motors' ); ?>
            </button>
        </div>
    </div>
    <button id="nm-lb-next" class="nm-lb-btn nm-lb-next"
        aria-label="<?php esc_attr_e( 'Next photo', 'nezer-motors' ); ?>">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
        </svg>
    </button>
</div>
<?php
}

/* ============================================================
   SEO HELPERS
============================================================ */

/**
 * Outputs Open Graph and Twitter card meta tags for a page.
 *
 * @param string $title       Page title.
 * @param string $description Page description.
 * @param string $image_url   Absolute URL to OG image.
 */
function nm_seo_meta( string $title = '', string $description = '', string $image_url = '' ) : void {
	$title = $title ?: get_bloginfo( 'name' );
	$desc  = $description ?: get_bloginfo( 'description' );
	$img   = $image_url   ?: get_template_directory_uri() . '/assets/img/og-default.jpg';
	$url   = esc_url( get_permalink() ?: home_url() );

	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $img ) . '">' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta name="twitter:image" content="' . esc_url( $img ) . '">' . "\n";
}

/**
 * Outputs LocalBusiness JSON-LD for a given branch.
 *
 * @param string $key 'autocare' or 'qwikfix'.
 */
function nm_local_business_schema( string $key ) : void {
	$b = nm_branch( $key );
	if ( empty( $b ) ) return;

	$schema = [
		'@context'    => 'https://schema.org',
		'@type'       => 'AutoRepair',
		'name'        => wp_strip_all_tags( $b['name'] ),
		'url'         => esc_url( get_permalink() ),
		'telephone'   => $b['tel'],
		'email'       => NM_EMAIL,
		'address'     => [
			'@type'           => 'PostalAddress',
			'streetAddress'   => wp_strip_all_tags( $b['location'] ),
			'postOfficeBoxNumber' => '643',
			'postalCode'      => '10100',
			'addressLocality' => 'Nyeri',
			'addressCountry'  => 'KE',
		],
		'openingHoursSpecification' => [
			'@type'       => 'OpeningHoursSpecification',
			'dayOfWeek'   => [ 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday' ],
			'opens'       => '08:00',
			'closes'      => '17:00',
		],
		'parentOrganization' => [
			'@type' => 'Organization',
			'name'  => 'Nezer Motors',
		],
	];

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}

/**
 * Outputs Organization JSON-LD for Nezer Motors (home page).
 */
function nm_organization_schema() : void {
	$schema = [
		'@context'         => 'https://schema.org',
		'@type'            => 'Organization',
		'name'             => 'Nezer Motors',
		'url'              => esc_url( home_url() ),
		'email'            => NM_EMAIL,
		'telephone'        => '+254733204672',
		'address'          => [
			'@type'               => 'PostalAddress',
			'postOfficeBoxNumber' => '643',
			'postalCode'          => '10100',
			'addressLocality'     => 'Nyeri',
			'addressCountry'      => 'KE',
		],
		'sameAs'           => [
			'https://www.facebook.com/nezermotors',
			'https://www.instagram.com/shell_kingongo',
		],
		'subOrganization'  => [
			[
				'@type'     => 'AutoRepair',
				'name'      => 'AutoCare Express',
				'telephone' => '+254733204672',
			],
			[
				'@type'     => 'AutoRepair',
				'name'      => 'QwikFix',
				'telephone' => '+254701104644',
			],
		],
	];

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}

/* ============================================================
   NAVIGATION HELPER
============================================================ */

/**
 * Returns an array of primary nav links.
 * Used in header.php to render both desktop and mobile menus.
 *
 * @return array  [ 'label' => string, 'url' => string, 'page' => string ]
 */
function nm_nav_links() : array {
	return [
		[
			'label' => esc_html__( 'Home',             'nezer-motors' ),
			'url'   => esc_url( home_url( '/' ) ),
			'page'  => 'home',
		],
		[
			'label' => esc_html__( 'About',            'nezer-motors' ),
			'url'   => esc_url( home_url( '/about/' ) ),
			'page'  => 'about',
		],
		[
			'label' => esc_html__( 'AutoCare Express', 'nezer-motors' ),
			'url'   => esc_url( home_url( '/autocare-express/' ) ),
			'page'  => 'autocare',
		],
		[
			'label' => esc_html__( 'QwikFix',          'nezer-motors' ),
			'url'   => esc_url( home_url( '/qwikfix/' ) ),
			'page'  => 'qwikfix',
		],
		[
			'label' => esc_html__( 'Contact',          'nezer-motors' ),
			'url'   => esc_url( home_url( '/contact/' ) ),
			'page'  => 'contact',
		],
	];
}

/**
 * Returns the current page identifier for active nav highlighting.
 *
 * @return string
 */
function nm_current_page() : string {
	if ( is_front_page() )                             return 'home';
	if ( is_page( 'about' ) )                         return 'about';
	if ( is_page( [ 'autocare-express', 'autocare' ] ) ) return 'autocare';
	if ( is_page( 'qwikfix' ) )                        return 'qwikfix';
	if ( is_page( 'contact' ) )                        return 'contact';
	return '';
}