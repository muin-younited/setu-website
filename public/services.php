<?php
require __DIR__ . '/../private/layout.php';
$baseUrl = setu_base_url();

setu_render_header([
    'active'       => 'services',
    'path'         => 'services.php',
    'title'        => 'Our Services | Tally Prime Customization, TDL Development, ERP Integration & Support — Setu Digital Solutions',
    'description'  => 'Explore Setu Digital Solutions services: Tally Prime customization (TDL development), ERP & API integration, web & mobile business apps, MIS reporting, implementation, and support.',
    'keywords'     => 'Tally Customization Services, TDL Development Tally Prime, Tally ERP API Integration, Tally MIS Reports, Tally Implementation & Training, Tally Support Lucknow',
    'page_heading' => 'Our Services',
    'page_sub'     => 'From customizing Tally Prime to connecting external systems and building digital tools, we turn everyday business challenges into streamlined workflows.',
    'breadcrumb'   => 'Services',
    'extra_schema' => [
        [
            '@type'       => 'Service',
            '@id'         => $baseUrl . '/services.php#services-catalog',
            'name'        => 'Tally Prime Customization, ERP Integration & Digital Application Services',
            'provider'    => ['@id' => $baseUrl . '/#organization'],
            'areaServed'  => ['@type' => 'Country', 'name' => 'India'],
            'description' => 'End-to-end Tally Prime customization (TDL), two-way ERP/API integration, web and mobile apps, MIS reporting, implementation, and ongoing support.',
        ],
    ],
]);
?>

  <!-- Detailed Services Showcase -->
  <section aria-labelledby="services-main-title">
    <div class="wrap">
      <div class="heading reveal">
        <span class="kicker">WHAT WE DO</span>
        <h2 id="services-main-title">Technology That Works For Your Business</h2>
        <p>Every service is delivered by specialists who understand both Tally accounting principles and modern software engineering.</p>
      </div>

      <div class="showcase-list">
        <!-- Service 1 -->
        <article class="showcase-row reveal" id="tally-customization">
          <div>
            <span class="kicker">01 · TALLY PRIME &amp; TDL DEVELOPMENT</span>
            <h3>Tally Customization</h3>
            <p>Standard accounting software often needs adjustments to match how your business bills customers, tracks inventory, or approves vouchers. We build clean, high-performance TDL (Tally Definition Language) customizations directly inside Tally Prime.</p>
            <div class="actions" style="margin-top: 20px;">
              <a class="btn" href="contact.php?interest=<?= rawurlencode('Tally Customization / TDL Development') ?>">Enquire About TDL Customization →</a>
            </div>
          </div>
          <div class="showcase-side">
            <h4>Key Capabilities</h4>
            <ul>
              <li>Custom GST invoice, gate pass, bilty, and voucher print formats</li>
              <li>Multi-level voucher approval workflows and user-wise security controls</li>
              <li>Automated voucher entry, custom fields, and validation rules</li>
              <li>Credit limit, negative stock, and rate-control restrictions</li>
            </ul>
          </div>
        </article>

        <!-- Service 2 -->
        <article class="showcase-row reveal" id="erp-integration">
          <div>
            <span class="kicker">02 · CONNECTED SYSTEMS</span>
            <h3>ERP &amp; API Integration</h3>
            <p>Eliminate double data entry and reconciliation mismatches between your operational software and your accounts department. We connect Tally Prime with external ERPs, CRMs, e-commerce websites, and custom billing platforms.</p>
            <div class="actions" style="margin-top: 20px;">
              <a class="btn" href="contact.php?interest=<?= rawurlencode('Tally Integration') ?>">Discuss System Integration →</a>
            </div>
          </div>
          <div class="showcase-side">
            <h4>Key Capabilities</h4>
            <ul>
              <li>Two-way synchronization of ledgers, stock items, and vouchers</li>
              <li>REST API, JSON, XML, and database bridge with Tally Prime</li>
              <li>Automated posting of sales, purchases, receipts, and payments</li>
              <li>Error logging and duplicate-prevention safeguards</li>
            </ul>
          </div>
        </article>

        <!-- Service 3 -->
        <article class="showcase-row reveal" id="web-mobile">
          <div>
            <span class="kicker">03 · DIGITAL MOBILITY</span>
            <h3>Web &amp; Mobile Business Applications</h3>
            <p>Empower your field sales executives, collection agents, branch managers, and business owners to access live business information and record transactions from any web browser or smartphone.</p>
            <div class="actions" style="margin-top: 20px;">
              <a class="btn" href="contact.php?interest=<?= rawurlencode('Website & Web Application') ?>">Enquire About Web &amp; Mobile Apps →</a>
              <a class="btn btn-secondary" href="products.php">See Our Products</a>
            </div>
          </div>
          <div class="showcase-side">
            <h4>Key Capabilities</h4>
            <ul>
              <li>Field sales order booking and payment collection apps</li>
              <li>Live customer ledger, bill-wise outstanding, and stock lookup</li>
              <li>Role-based portals for branches, dealers, and management</li>
              <li>Instant PDF and WhatsApp sharing of invoices and statements</li>
            </ul>
          </div>
        </article>

        <!-- Service 4 -->
        <article class="showcase-row reveal" id="mis-reports">
          <div>
            <span class="kicker">04 · DECISION SUPPORT</span>
            <h3>MIS &amp; Business Reports</h3>
            <p>Turn raw accounting vouchers into clear, decision-ready summaries. We design custom financial and operational reports inside Tally Prime and on the web so management can review performance at a glance.</p>
            <div class="actions" style="margin-top: 20px;">
              <a class="btn" href="contact.php?interest=<?= rawurlencode('Tally Customization / TDL Development') ?>">Request Custom MIS Reports →</a>
            </div>
          </div>
          <div class="showcase-side">
            <h4>Key Capabilities</h4>
            <ul>
              <li>Salesman-wise, branch-wise, and item-group profitability reports</li>
              <li>Detailed receivables ageing and collection follow-up registers</li>
              <li>Production yield, cost-center, and expense comparison summaries</li>
              <li>One-click Excel/PDF export for management review</li>
            </ul>
          </div>
        </article>

        <!-- Service 5 -->
        <article class="showcase-row reveal" id="implementation">
          <div>
            <span class="kicker">05 · ONBOARDING &amp; TRAINING</span>
            <h3>Solution Implementation</h3>
            <p>Even the best software fails without structured setup and user adoption. Our implementation team works closely with your staff to configure workflows, validate data, and provide practical hands-on training.</p>
            <div class="actions" style="margin-top: 20px;">
              <a class="btn" href="contact.php?interest=<?= rawurlencode('Product Demo') ?>">Schedule Implementation Consultation →</a>
            </div>
          </div>
          <div class="showcase-side">
            <h4>Key Capabilities</h4>
            <ul>
              <li>Requirement study and practical workflow configuration</li>
              <li>Master data structuring and opening balance verification</li>
              <li>Role-wise staff training for accountants and operators</li>
              <li>Guided go-live support to ensure smooth daily adoption</li>
            </ul>
          </div>
        </article>

        <!-- Service 6 -->
        <article class="showcase-row reveal" id="support">
          <div>
            <span class="kicker">06 · CONTINUOUS ASSISTANCE</span>
            <h3>Support &amp; Consulting</h3>
            <p>Your business evolves, compliance rules change, and new requirements emerge. Our support and consulting team stays available to troubleshoot issues quickly and keep your systems running smoothly.</p>
            <div class="actions" style="margin-top: 20px;">
              <a class="btn" href="contact.php?interest=<?= rawurlencode('Support & Service') ?>">Connect With Support →</a>
            </div>
          </div>
          <div class="showcase-side">
            <h4>Key Capabilities</h4>
            <ul>
              <li>Responsive phone, WhatsApp, and remote desktop assistance</li>
              <li>Troubleshooting for Tally customizations and integrations</li>
              <li>Periodic workflow reviews and feature enhancements</li>
              <li>Guidance on Tally Prime upgrades and multi-user performance</li>
            </ul>
          </div>
        </article>
      </div>
    </div>
  </section>

<?php
setu_render_cta_strip(
    'Need a custom Tally workflow or system integration?',
    'Share your requirement with our development team and get a practical solution roadmap.',
    'Request a Service Quote →',
    'contact.php?interest=' . rawurlencode('Tally Customization / TDL Development')
);
setu_render_footer();
