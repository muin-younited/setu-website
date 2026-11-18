<?php
require __DIR__ . '/../private/layout.php';
$c = setu_site_config()['contact'];
$baseUrl = setu_base_url();

setu_render_header([
    'active'       => 'home',
    'path'         => '/',
    'title'        => 'Setu Digital Solutions | Tally Prime Customization, TDL Development, ERP Integration & Business Software',
    'description'  => 'Setu Digital Solutions is a trusted business technology partner in Lucknow, India providing Tally Prime customization, TDL development, ERP & API integration, SetuLink, eDocSuite, Setu AI, and industry-specific Tally solutions.',
    'extra_schema' => [
        [
            '@type'           => 'ItemList',
            '@id'             => $baseUrl . '/#products-list',
            'name'            => 'Setu Digital Solutions Featured Products',
            'itemListElement' => [
                [
                    '@type'    => 'ListItem',
                    'position' => 1,
                    'item'     => [
                        '@type'               => 'SoftwareApplication',
                        'name'                => 'SetuLink',
                        'url'                 => $baseUrl . '/products.php#setulink',
                        'applicationCategory' => 'BusinessApplication',
                        'operatingSystem'     => 'Web, Android, iOS, Tally Prime',
                        'provider'            => ['@id' => $baseUrl . '/#organization'],
                        'description'         => 'Connect your field team with Tally through a simple web and mobile experience for live ledgers, outstanding bills, and order booking.',
                    ],
                ],
                [
                    '@type'    => 'ListItem',
                    'position' => 2,
                    'item'     => [
                        '@type'               => 'SoftwareApplication',
                        'name'                => 'eDocSuite',
                        'url'                 => $baseUrl . '/products.php#edocsuite',
                        'applicationCategory' => 'BusinessApplication',
                        'operatingSystem'     => 'Web, Windows, Tally Prime',
                        'provider'            => ['@id' => $baseUrl . '/#organization'],
                        'description'         => 'Keep supporting documents, bills, and invoices organized and accessible alongside your Tally business records.',
                    ],
                ],
                [
                    '@type'    => 'ListItem',
                    'position' => 3,
                    'item'     => [
                        '@type'               => 'SoftwareApplication',
                        'name'                => 'Setu AI',
                        'url'                 => $baseUrl . '/products.php#setu-ai',
                        'applicationCategory' => 'BusinessApplication',
                        'operatingSystem'     => 'Web, Tally Prime',
                        'provider'            => ['@id' => $baseUrl . '/#organization'],
                        'description'         => 'Explore business insights and smarter ways to understand financial and inventory information from your Tally data.',
                    ],
                ],
            ],
        ],
    ],
]);
?>

  <!-- 1. Hero Section -->
  <section class="hero" aria-labelledby="hero-title">
    <style>
    /* Floating Animated Setu Logo Reveal (~25% larger, no card container) */
    .setu-hero-logo-svg {
      width: min(100%, 405px);
      height: auto;
      display: block;
      overflow: visible;
    }

    /* Step 1: Outer Border progressive draw starting from the left side (0.05s -> 1.15s) */
    .setu-hero-logo-svg .anim-border-stroke {
      stroke-dasharray: 1000;
      stroke-dashoffset: 1000;
      animation: setuDrawStroke 1.1s cubic-bezier(0.4, 0, 0.2, 1) 0.05s forwards;
    }

    /* Step 2: Orbital Curves progressive draw left-to-right (0.85s -> 1.75s) */
    .setu-hero-logo-svg .anim-curve-upper {
      stroke-dasharray: 300;
      stroke-dashoffset: 300;
      animation: setuDrawStroke 0.85s cubic-bezier(0.35, 0, 0.25, 1) 0.85s forwards;
    }
    .setu-hero-logo-svg .anim-curve-lower {
      stroke-dasharray: 300;
      stroke-dashoffset: 300;
      animation: setuDrawStroke 0.85s cubic-bezier(0.35, 0, 0.25, 1) 0.95s forwards;
    }

    /* Step 3: Orbital Dots moving smoothly along their curved paths (0.80s -> 1.85s) */
    .setu-hero-logo-svg .anim-dot-green {
      transform-box: fill-box;
      transform-origin: center;
      animation: setuMoveDotGreen 0.55s cubic-bezier(0.22, 1, 0.36, 1) 0.80s both;
    }
    .setu-hero-logo-svg .anim-dot-mid {
      transform-box: fill-box;
      transform-origin: center;
      animation: setuMoveDotMid 0.85s cubic-bezier(0.25, 0.1, 0.25, 1) 0.95s both;
    }
    .setu-hero-logo-svg .anim-dot-right {
      transform-box: fill-box;
      transform-origin: center;
      animation: setuMoveDotRight 0.95s cubic-bezier(0.25, 0.1, 0.25, 1) 0.85s both;
    }

    /* Step 4: Setu Lettering (S, e, t, u) progressive mask/drawing reveal (1.55s -> 2.95s) */
    .setu-hero-logo-svg .anim-letter-s {
      stroke-dasharray: 500;
      stroke-dashoffset: 500;
      animation: setuDrawStroke 0.65s cubic-bezier(0.35, 0, 0.25, 1) 1.55s forwards;
    }
    .setu-hero-logo-svg .anim-letter-e {
      stroke-dasharray: 500;
      stroke-dashoffset: 500;
      animation: setuDrawStroke 0.60s cubic-bezier(0.35, 0, 0.25, 1) 1.88s forwards;
    }
    .setu-hero-logo-svg .anim-letter-t {
      stroke-dasharray: 400;
      stroke-dashoffset: 400;
      animation: setuDrawStroke 0.55s cubic-bezier(0.35, 0, 0.25, 1) 2.15s forwards;
    }
    .setu-hero-logo-svg .anim-letter-u {
      stroke-dasharray: 400;
      stroke-dashoffset: 400;
      animation: setuDrawStroke 0.58s cubic-bezier(0.35, 0, 0.25, 1) 2.38s forwards;
    }

    /* Step 5: Tagline subtle fade-in after lettering appears (2.90s -> 3.55s) */
    .setu-hero-logo-svg .anim-tagline {
      opacity: 0;
      transform: translateY(6px);
      animation: setuTaglineReveal 0.65s cubic-bezier(0.22, 1, 0.36, 1) 2.90s forwards;
    }

    /* Final static lock so completed logo is 100% pixel-identical to original PNG (3.55s -> 3.75s) */
    .setu-hero-logo-svg .anim-final-static {
      opacity: 0;
      animation: setuSimpleFade 0.25s ease-out 3.55s forwards;
    }

    @keyframes setuDrawStroke {
      to { stroke-dashoffset: 0; }
    }
    @keyframes setuSimpleFade {
      to { opacity: 1; }
    }
    @keyframes setuMoveDotGreen {
      0%   { opacity: 0; transform: translate(-18px, 12px) scale(0.5); }
      35%  { opacity: 1; }
      100% { opacity: 1; transform: translate(0, 0) scale(1); }
    }
    @keyframes setuMoveDotMid {
      0%   { opacity: 0; transform: translate(-111.5px, -16px) scale(0.6); }
      18%  { opacity: 1; }
      25%  { transform: translate(-80.7px, -20.2px) scale(0.85); }
      50%  { transform: translate(-51.6px, -19.0px) scale(0.95); }
      75%  { transform: translate(-24.8px, -12.2px) scale(1); }
      100% { opacity: 1; transform: translate(0, 0) scale(1); }
    }
    @keyframes setuMoveDotRight {
      0%   { opacity: 0; transform: translate(-202.5px, -65.5px) scale(0.55); }
      15%  { opacity: 1; }
      25%  { transform: translate(-152.3px, -77.5px) scale(0.8); }
      50%  { transform: translate(-101.9px, -70.6px) scale(0.92); }
      75%  { transform: translate(-51.1px, -44.8px) scale(0.98); }
      100% { opacity: 1; transform: translate(0, 0) scale(1); }
    }
    @keyframes setuTaglineReveal {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (prefers-reduced-motion: reduce) {
      .setu-hero-logo-svg .anim-border-stroke,
      .setu-hero-logo-svg .anim-curve-upper,
      .setu-hero-logo-svg .anim-curve-lower,
      .setu-hero-logo-svg .anim-letter-s,
      .setu-hero-logo-svg .anim-letter-e,
      .setu-hero-logo-svg .anim-letter-t,
      .setu-hero-logo-svg .anim-letter-u {
        stroke-dashoffset: 0;
        animation: none;
      }
      .setu-hero-logo-svg .anim-dot-green,
      .setu-hero-logo-svg .anim-dot-mid,
      .setu-hero-logo-svg .anim-dot-right,
      .setu-hero-logo-svg .anim-tagline,
      .setu-hero-logo-svg .anim-final-static {
        opacity: 1;
        transform: none;
        animation: none;
      }
    }
    </style>
    <div class="wrap hero-grid">
      <div class="hero-copy">
        <span class="eyebrow">BUSINESS TECHNOLOGY PARTNER</span>
        <h1 id="hero-title">Bridging Business.<br><span>Connects Everywhere.</span></h1>
        <p class="hero-lead">Practical digital solutions that connect your people, processes and business data—helping your team work smarter with Tally Prime, web applications and industry-focused software.</p>
        <div class="actions">
          <a class="btn" href="products.php">Explore Products →</a>
          <a class="btn btn-secondary" href="contact.php">Talk to Our Team</a>
        </div>
      </div>
      <div class="hero-logo">
        <svg class="setu-hero-logo-svg" viewBox="96 112 448 424" width="405" height="383" role="img" aria-label="Setu Digital Solutions Logo">
          <defs>
            <!-- 1. Outer Border progressive drawing mask (starts on left side, continues clockwise around frame) -->
            <mask id="setu-mask-border" maskUnits="userSpaceOnUse" x="0" y="0" width="640" height="640">
              <rect width="640" height="640" fill="#000" />
              <path class="anim-border-stroke"
                    d="M 125 380 L 125 210 A 68 68 0 0 1 193 142 L 446 142 A 68 68 0 0 1 514 210 L 514 440 A 68 68 0 0 1 446 508 L 193 508 A 68 68 0 0 1 125 440 L 125 380"
                    fill="none" stroke="#fff" stroke-width="28" stroke-linecap="round" pathLength="1000" />
            </mask>

            <!-- 2. Orbital Curves progressive drawing mask (draws left-to-right, excluding the 3 dots and 't' stem) -->
            <mask id="setu-mask-curves" maskUnits="userSpaceOnUse" x="0" y="0" width="640" height="640">
              <rect width="640" height="640" fill="#000" />
              <path class="anim-curve-upper"
                    d="M 282 227 Q 382 184 478 282"
                    fill="none" stroke="#fff" stroke-width="18" stroke-linecap="round" pathLength="300" />
              <path class="anim-curve-lower"
                    d="M 284 236 Q 384 216 463 314"
                    fill="none" stroke="#fff" stroke-width="16" stroke-linecap="round" pathLength="300" />
              <!-- Exclude the 3 orbital dots and 't' stem from the curve layer -->
              <circle cx="269.5" cy="235" r="14.5" fill="#000" />
              <circle cx="395.5" cy="252" r="11.2" fill="#000" />
              <circle cx="484.5" cy="292.5" r="16.8" fill="#000" />
              <rect x="328" y="262" width="32" height="60" fill="#000" />
            </mask>

            <!-- 3. Clip paths for the 3 existing orbital dots -->
            <clipPath id="setu-clip-dot-green" clipPathUnits="userSpaceOnUse">
              <circle cx="269.5" cy="235" r="15" />
            </clipPath>
            <clipPath id="setu-clip-dot-mid" clipPathUnits="userSpaceOnUse">
              <circle cx="395.5" cy="252" r="11.6" />
            </clipPath>
            <clipPath id="setu-clip-dot-right" clipPathUnits="userSpaceOnUse">
              <circle cx="484.5" cy="292.5" r="17.2" />
            </clipPath>

            <!-- 4. Setu Lettering (S, e, t, u) region & sequential drawing mask -->
            <mask id="setu-letters-region" maskUnits="userSpaceOnUse" x="0" y="0" width="640" height="640">
              <rect width="640" height="640" fill="#000" />
              <rect x="138" y="250" width="340" height="184" fill="#fff" />
              <circle cx="269.5" cy="235" r="15.5" fill="#000" />
              <path d="M 280 190 L 505 190 L 505 318 L 362 318 L 362 262 L 280 262 Z" fill="#000" />
            </mask>

            <mask id="setu-mask-letters" maskUnits="userSpaceOnUse" x="0" y="0" width="640" height="640">
              <rect width="640" height="640" fill="#000" />
              <g mask="url(#setu-letters-region)">
                <path class="anim-letter-s"
                      d="M 282 292 C 258 252, 165 252, 168 296 C 170 338, 252 346, 250 388 C 246 424, 175 424, 144 388"
                      fill="none" stroke="#fff" stroke-width="86" stroke-linecap="round" stroke-linejoin="round" pathLength="500" />
                <path class="anim-letter-e"
                      d="M 235 350 C 265 305, 335 308, 395 332 M 260 382 L 326 382 C 326 350, 264 350, 264 390 C 264 424, 316 424, 328 406"
                      fill="none" stroke="#fff" stroke-width="70" stroke-linecap="round" stroke-linejoin="round" pathLength="500" />
                <path class="anim-letter-t"
                      d="M 344 262 L 344 395 C 344 420, 368 422, 388 412"
                      fill="none" stroke="#fff" stroke-width="68" stroke-linecap="round" stroke-linejoin="round" pathLength="400" />
                <path class="anim-letter-u"
                      d="M 398 325 L 398 392 C 398 422, 460 422, 460 392 L 460 320"
                      fill="none" stroke="#fff" stroke-width="74" stroke-linecap="round" stroke-linejoin="round" pathLength="400" />
              </g>
            </mask>

            <!-- 5. Tagline clip path ("Bridging Business. Connects Everywhere.") -->
            <clipPath id="setu-clip-tagline" clipPathUnits="userSpaceOnUse">
              <rect x="140" y="435" width="360" height="45" />
            </clipPath>
          </defs>

          <!-- Step 1: Outer Border -->
          <image href="assets/img/setu-logo.png" width="640" height="640" mask="url(#setu-mask-border)" />

          <!-- Step 2: Orbital Curves -->
          <image href="assets/img/setu-logo.png" width="640" height="640" mask="url(#setu-mask-curves)" />

          <!-- Step 3: Orbital Dots moving smoothly along their curved paths -->
          <g class="anim-dot-green">
            <image href="assets/img/setu-logo.png" width="640" height="640" clip-path="url(#setu-clip-dot-green)" />
          </g>
          <g class="anim-dot-mid">
            <image href="assets/img/setu-logo.png" width="640" height="640" clip-path="url(#setu-clip-dot-mid)" />
          </g>
          <g class="anim-dot-right">
            <image href="assets/img/setu-logo.png" width="640" height="640" clip-path="url(#setu-clip-dot-right)" />
          </g>

          <!-- Step 4: Setu Lettering (S, e, t, u) -->
          <image href="assets/img/setu-logo.png" width="640" height="640" mask="url(#setu-mask-letters)" />

          <!-- Step 5: Tagline Fade-In -->
          <g class="anim-tagline">
            <image href="assets/img/setu-logo.png" width="640" height="640" clip-path="url(#setu-clip-tagline)" />
          </g>

          <!-- Final Static Lock -->
          <image class="anim-final-static" href="assets/img/setu-logo.png" width="640" height="640" />
        </svg>
      </div>
    </div>
  </section>

  <!-- 2. 5-Box Core Capabilities Bar -->
  <div class="wrap feature-strip-wrap">
    <div class="feature-strip">
      <a class="feature-box reveal" href="services.php#tally-customization">
        <span class="feature-num">01</span>
        <h4>Tally Prime &amp; TDL Customization</h4>
      </a>
      <a class="feature-box reveal" href="products.php">
        <span class="feature-num">02</span>
        <h4>Customized Software Solutions</h4>
      </a>
      <a class="feature-box reveal" href="services.php#erp-integration">
        <span class="feature-num">03</span>
        <h4>ERP &amp; Third-Party Integration</h4>
      </a>
      <a class="feature-box reveal" href="services.php#implementation">
        <span class="feature-num">04</span>
        <h4>Solution Implementation Services</h4>
      </a>
      <a class="feature-box reveal" href="services.php#support">
        <span class="feature-num">05</span>
        <h4>User Training &amp; Dedicated Support</h4>
      </a>
    </div>
  </div>

  <!-- 3. Brief Company Introduction (Links to About Us & Our Team Pages) -->
  <section aria-labelledby="welcome-title">
    <div class="wrap">
      <div class="about-split">
        <div class="about-panel reveal">
          <span class="kicker">WHY SETU DIGITAL SOLUTIONS</span>
          <h3>Built Around How Real Businesses Work Every Day</h3>
          <p>Instead of forcing your staff to change how they operate, we build Tally customizations, field apps, and integrations that fit naturally into your daily workflow.</p>
          <div class="about-highlights">
            <div class="about-stat-box">
              <strong>100%</strong>
              <span>Client-Focused Delivery</span>
            </div>
            <div class="about-stat-box">
              <strong>10+</strong>
              <span>Industry Verticals Served</span>
            </div>
          </div>
          <div class="call-box">
            <div class="call-icon" aria-hidden="true">☎</div>
            <div>
              <small>Call or WhatsApp our team directly</small>
              <a href="tel:<?= h($c['phone_link']) ?>"><?= h($c['phone']) ?></a>
            </div>
          </div>
        </div>

        <div class="about-story reveal">
          <span class="kicker">WHO WE ARE</span>
          <h2 id="welcome-title">Connecting Business Processes with Technology</h2>
          <p>Setu Digital Solutions is a business technology company dedicated to helping businesses digitize their operations and connect their day-to-day workflows seamlessly with Tally Prime.</p>
          <p>With a strong foundation in Tally customization and TDL development, we deliver practical web applications, ERP integrations, and industry-specific modules that reduce manual work and improve efficiency.</p>
          <div class="actions" style="margin-top: 24px;">
            <a class="btn" href="about.php">Read Our Story →</a>
            <a class="btn btn-secondary" href="team.php">Meet Our Team</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. Featured Products Overview (Links to Products Page) -->
  <section class="strip" aria-labelledby="home-products-title">
    <div class="wrap">
      <div class="section-head-row reveal">
        <div class="heading">
          <span class="kicker">FEATURED PRODUCTS</span>
          <h2 id="home-products-title">Digital Products Built for Tally Users</h2>
          <p style="margin:0;">Extend Tally Prime to your field sales team, your document archive, and your management desk.</p>
        </div>
        <a class="btn btn-secondary" href="products.php">View All Product Details →</a>
      </div>

      <div class="cards">
        <article class="card reveal">
          <div>
            <span class="kicker">FIELD MOBILITY</span>
            <h3>SetuLink</h3>
            <p>Connect your field sales and collection team with Tally through a simple web and mobile experience for live ledgers, outstanding bills, and remote order booking.</p>
          </div>
          <a class="card-foot" href="products.php#setulink"><span>Explore SetuLink</span><span>→</span></a>
        </article>

        <article class="card reveal">
          <div>
            <span class="kicker">DOCUMENT MANAGEMENT</span>
            <h3>eDocSuite</h3>
            <p>Keep supporting documents, purchase bills, transport bilty, and invoices neatly organized and accessible right alongside your Tally business records.</p>
          </div>
          <a class="card-foot" href="products.php#edocsuite"><span>Explore eDocSuite</span><span>→</span></a>
        </article>

        <article class="card reveal">
          <div>
            <span class="kicker">BUSINESS INTELLIGENCE</span>
            <h3>Setu AI</h3>
            <p>Explore actionable business insights, financial trends, and smarter ways to understand sales and inventory performance from your Tally data.</p>
          </div>
          <a class="card-foot" href="products.php#setu-ai"><span>Explore Setu AI</span><span>→</span></a>
        </article>
      </div>
    </div>
  </section>

  <!-- 5. Core Services Summary (Links to Services Page) -->
  <section aria-labelledby="home-services-title">
    <div class="wrap">
      <div class="section-head-row reveal">
        <div class="heading">
          <span class="kicker">WHAT WE DO</span>
          <h2 id="home-services-title">Customization, Integration &amp; Ongoing Support</h2>
          <p style="margin:0;">End-to-end engineering and implementation services tailored around your accounting and operational systems.</p>
        </div>
        <a class="btn btn-secondary" href="services.php">Explore All 6 Services →</a>
      </div>

      <div class="cards">
        <article class="card reveal">
          <div>
            <h3>Tally Customization (TDL)</h3>
            <p>Custom TDL development, specialized GST invoice print formats, voucher approval workflows, and business-specific controls for Tally Prime.</p>
          </div>
          <a class="card-foot" href="services.php#tally-customization"><span>Service Details</span><span>→</span></a>
        </article>

        <article class="card reveal">
          <div>
            <h3>ERP &amp; API Integration</h3>
            <p>Connect Tally Prime with ERP systems, CRM platforms, and external web applications to eliminate repetitive manual data entry.</p>
          </div>
          <a class="card-foot" href="services.php#erp-integration"><span>Service Details</span><span>→</span></a>
        </article>

        <article class="card reveal">
          <div>
            <h3>Implementation &amp; Support</h3>
            <p>Requirement analysis, workflow configuration, practical staff training, and responsive day-to-day technical assistance.</p>
          </div>
          <a class="card-foot" href="services.php#implementation"><span>Service Details</span><span>→</span></a>
        </article>
      </div>
    </div>
  </section>

  <!-- 6. Solid Navy Authority Stats Banner -->
  <section class="stats-banner" aria-label="Key Business Achievements">
    <div class="wrap">
      <h2 class="reveal">Dependable Solutions Backed by Real Expertise</h2>
      <p class="stats-sub reveal">Focus on your business growth while our team streamlines your accounting, inventory, and digital workflows.</p>
      <div class="stats-grid">
        <div class="stat-card reveal">
          <strong>500+</strong>
          <span>Custom TDL &amp; Workflows</span>
        </div>
        <div class="stat-card reveal">
          <strong>10+</strong>
          <span>Specialized Industry Verticals</span>
        </div>
        <div class="stat-card reveal">
          <strong>100%</strong>
          <span>Practical Business Focus</span>
        </div>
        <div class="stat-card reveal">
          <strong>Mon–Sat</strong>
          <span>Dedicated Customer Support</span>
        </div>
      </div>
    </div>
  </section>

  <!-- 7. Industry Solutions Preview (Links to Solutions Page) -->
  <section aria-labelledby="home-industries-title">
    <div class="wrap">
      <div class="section-head-row reveal">
        <div class="heading">
          <span class="kicker">INDUSTRY SOLUTIONS</span>
          <h2 id="home-industries-title">Purpose-Built Modules For Your Industry</h2>
          <p style="margin:0;">Specialized Tally workflows for manufacturing, storage, logistics, retail, and service businesses.</p>
        </div>
        <a class="btn btn-secondary" href="solutions.php">View All 10 Industries →</a>
      </div>

      <div class="chips reveal" aria-label="Industries We Serve" style="margin-top:0;">
        <a class="chip" href="solutions.php#transport-fleet">Transport &amp; Fleet</a>
        <a class="chip" href="solutions.php#cold-storage">Cold Storage</a>
        <a class="chip" href="solutions.php#jewellery-retail">Jewellery Retail</a>
        <a class="chip" href="solutions.php#rice-flour-mill">Rice &amp; Flour Mill</a>
        <a class="chip" href="solutions.php#petrol-pump">Petrol Pump</a>
        <a class="chip" href="solutions.php#printing-press">Printing Press</a>
        <a class="chip" href="solutions.php#garments-manufacturing">Garments Manufacturing</a>
        <a class="chip" href="solutions.php#healthcare">Healthcare / OPD-IPD</a>
        <a class="chip" href="solutions.php#service-industry">Service Industry</a>
        <a class="chip" href="solutions.php#lead-management">Lead Management</a>
      </div>
    </div>
  </section>

<?php
setu_render_cta_strip(
    'Ready to streamline your Tally and business workflows?',
    'Schedule a free consultation or live product demonstration with our team today.',
    'Contact Us Now →',
    'contact.php'
);
setu_render_footer();
