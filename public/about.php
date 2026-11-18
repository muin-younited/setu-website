<?php
require __DIR__ . '/../private/layout.php';
$c = setu_site_config()['contact'];
$baseUrl = setu_base_url();

setu_render_header([
    'active'       => 'about',
    'path'         => 'about.php',
    'title'        => 'About Us | Setu Digital Solutions — Tally Customization & Business Technology Partner',
    'description'  => 'Learn about Setu Digital Solutions, our vision, mission, and how we help businesses digitize operations and connect processes seamlessly with Tally Prime.',
    'keywords'     => 'About Setu Digital Solutions, Tally Technology Partner Lucknow, TDL Development Company India, Tally ERP Integration Experts',
    'page_heading' => 'About Setu Digital Solutions',
    'page_sub'     => 'Connecting business processes, people, and applications seamlessly with Tally Prime.',
    'breadcrumb'   => 'About Us',
    'extra_schema' => [
        [
            '@type'       => 'AboutPage',
            '@id'         => $baseUrl . '/about.php#aboutpage',
            'url'         => $baseUrl . '/about.php',
            'name'        => 'About Setu Digital Solutions',
            'mainEntity'  => ['@id' => $baseUrl . '/#organization'],
            'description' => 'Setu Digital Solutions is a business technology company dedicated to helping businesses digitize their operations and connect their business processes seamlessly with Tally.',
        ],
    ],
]);
?>

  <!-- Company Story Split Section -->
  <section aria-labelledby="about-story-title">
    <div class="wrap">
      <div class="about-split">
        <div class="about-panel reveal">
          <span class="kicker">WHO WE ARE</span>
          <h3>Technology Designed Around Real Business Workflows</h3>
          <p>We understand that every business has its own processes, requirements, and challenges. That is why we focus on developing practical, customized, and reliable technology solutions that simplify operations, reduce manual work, and improve business efficiency.</p>
          <div class="about-highlights">
            <div class="about-stat-box">
              <strong>500+</strong>
              <span>Custom TDL &amp; Workflows</span>
            </div>
            <div class="about-stat-box">
              <strong>10+</strong>
              <span>Industry Verticals</span>
            </div>
          </div>
          <div class="call-box">
            <div class="call-icon" aria-hidden="true">☎</div>
            <div>
              <small>Speak directly with our team</small>
              <a href="tel:<?= h($c['phone_link']) ?>"><?= h($c['phone']) ?></a>
            </div>
          </div>
        </div>

        <div class="about-story reveal">
          <span class="kicker">OUR STORY</span>
          <h2 id="about-story-title">Connecting Business Processes with Technology</h2>
          <p>Setu Digital Solutions is a business technology company dedicated to helping businesses digitize their operations and connect their business processes seamlessly with Tally.</p>
          <p>With a strong foundation in Tally customization and TDL development, we help businesses digitize their processes and connect their operations seamlessly with technology.</p>
          <p>Our expertise includes Tally customization, TDL development, business applications (<strong>SetuLink</strong>, <strong>eDocSuite</strong>, <strong>Setu AI</strong>), ERP/CRM solutions, system integration, and industry-specific software.</p>
          <p>At Setu Digital Solutions, we believe technology should work according to business requirements—helping businesses manage their operations more efficiently and make better use of their information.</p>
          <div class="actions" style="margin-top: 24px;">
            <a class="btn" href="team.php">Meet Our Team →</a>
            <a class="btn btn-secondary" href="services.php">Explore Our Services</a>
          </div>
        </div>
      </div>

      <!-- Vision & Mission Detailed Cards -->
      <div class="vision-mission-grid">
        <article class="card reveal">
          <div>
            <span class="kicker">OUR VISION</span>
            <h3>Digitally Connected Businesses</h3>
            <p>To create a digitally connected business environment where business processes, applications, and information work together seamlessly, with Tally as an integral part of business operations.</p>
            <ul class="card-points">
              <li>Unified accounting, inventory, and field operations</li>
              <li>Real-time visibility for business owners and decision-makers</li>
              <li>Dependable software built for long-term business growth</li>
            </ul>
          </div>
        </article>

        <article class="card reveal">
          <div>
            <span class="kicker">OUR MISSION</span>
            <h3>Simplifying Business Operations</h3>
            <p>To simplify business operations through practical, customized, and technology-driven solutions. We aim to:</p>
            <ul class="card-points">
              <li>Digitize business processes and workflows.</li>
              <li>Connect business applications seamlessly with Tally.</li>
              <li>Reduce manual work and repetitive data entry.</li>
              <li>Improve operational efficiency and data accessibility.</li>
              <li>Develop solutions based on specific business requirements.</li>
              <li>Help businesses embrace digital transformation.</li>
            </ul>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- How We Work — 3-Step Delivery Process -->
  <section class="strip" aria-labelledby="process-title">
    <div class="wrap">
      <div class="heading reveal">
        <span class="kicker">HOW WE WORK</span>
        <h2 id="process-title">A Structured, Human Approach from Requirement to Support</h2>
        <p>Every project follows a clear three-stage process so your team gets a dependable solution without disruption to daily accounting.</p>
      </div>
      <div class="cards">
        <article class="card reveal">
          <div>
            <span class="kicker">STEP 01</span>
            <h3>Requirement Understanding</h3>
            <p>We listen to your accountants, operators, and management team to map your exact voucher flows, reporting needs, and operational bottlenecks.</p>
          </div>
        </article>
        <article class="card reveal">
          <div>
            <span class="kicker">STEP 02</span>
            <h3>Custom Development &amp; Integration</h3>
            <p>Our TDL and web engineering team builds and tests your customization, mobile app, or API bridge around your real Tally data structure.</p>
          </div>
        </article>
        <article class="card reveal">
          <div>
            <span class="kicker">STEP 03</span>
            <h3>Implementation &amp; User Training</h3>
            <p>We deploy the solution cleanly, guide your staff with hands-on training, and provide ongoing support whenever your team needs assistance.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

<?php
setu_render_cta_strip(
    'Want to discuss how we can simplify your business workflow?',
    'Connect with our team for a tailored consultation or product walkthrough.',
    'Talk to Our Team →',
    'contact.php'
);
setu_render_footer();
