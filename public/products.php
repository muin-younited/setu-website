<?php
require __DIR__ . '/../private/layout.php';
$baseUrl = setu_base_url();

setu_render_header([
    'active'       => 'products',
    'path'         => 'products.php',
    'title'        => 'Our Products | SetuLink, eDocSuite & Setu AI for Tally Prime — Setu Digital Solutions',
    'description'  => 'Discover Setu Digital Solutions flagship products: SetuLink (Web & Mobile Field App for Tally), eDocSuite (Document Management for Tally), and Setu AI (Business Intelligence & Analytics).',
    'keywords'     => 'SetuLink Tally App, eDocSuite Tally Document Management, Setu AI Tally Analytics, Tally Mobile App Lucknow, Attach Documents in Tally Prime',
    'page_heading' => 'Featured Products',
    'page_sub'     => 'Purpose-built digital products designed to make Tally information accessible, documents organized, and everyday business work more efficient.',
    'breadcrumb'   => 'Products',
    'extra_schema' => [
        [
            '@type'               => 'SoftwareApplication',
            '@id'                 => $baseUrl . '/products.php#setulink-app',
            'name'                => 'SetuLink',
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem'     => 'Web, Android, iOS, Tally Prime',
            'provider'            => ['@id' => $baseUrl . '/#organization'],
            'description'         => 'Web and mobile application that connects field sales and collection teams with Tally Prime for live ledgers, bill-wise outstanding, order booking, and receipt entry.',
        ],
        [
            '@type'               => 'SoftwareApplication',
            '@id'                 => $baseUrl . '/products.php#edocsuite-app',
            'name'                => 'eDocSuite',
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem'     => 'Web, Windows, Tally Prime',
            'provider'            => ['@id' => $baseUrl . '/#organization'],
            'description'         => 'Digital document management solution to organize, attach, and retrieve supporting bills, invoices, and contracts alongside Tally business records.',
        ],
        [
            '@type'               => 'SoftwareApplication',
            '@id'                 => $baseUrl . '/products.php#setu-ai-app',
            'name'                => 'Setu AI',
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem'     => 'Web, Tally Prime',
            'provider'            => ['@id' => $baseUrl . '/#organization'],
            'description'         => 'Business intelligence and AI-assisted insights tool to explore financial trends, sales performance, and inventory KPIs from Tally data.',
        ],
    ],
]);
?>

  <!-- Detailed Product Showcases -->
  <section aria-labelledby="products-main-title">
    <div class="wrap">
      <div class="heading reveal">
        <span class="kicker">SOLUTIONS FOR CONNECTED BUSINESS</span>
        <h2 id="products-main-title">Practical Digital Products Built Around Tally Prime</h2>
        <p>Our products extend the power of Tally to your field team, your document archive, and your management desk—without complicating your accounting workflow.</p>
      </div>

      <div class="showcase-list">
        <!-- Product 1: SetuLink -->
        <article class="showcase-row reveal" id="setulink">
          <div>
            <span class="kicker">01 · WEB &amp; MOBILE FIELD APPLICATION</span>
            <h3>SetuLink</h3>
            <p>Connect your field team with Tally through a simple, fast web and mobile experience. Sales executives, collection agents, and branch managers can check customer balances and log transactions from the field without needing direct access to your main Tally computer.</p>
            <div class="actions" style="margin-top: 22px;">
              <a class="btn" href="contact.php?interest=<?= rawurlencode('SetuLink / Digital Products') ?>&amp;product=SetuLink">Book a Live SetuLink Demo →</a>
            </div>
          </div>
          <div class="showcase-side">
            <h4>What SetuLink Delivers</h4>
            <ul>
              <li>Live customer ledger and bill-wise outstanding balances on mobile</li>
              <li>Remote sales order booking and payment receipt entry from the field</li>
              <li>One-click PDF and WhatsApp sharing of ledgers and outstanding reminders</li>
              <li>Role-based user permissions so each salesperson sees only their assigned parties</li>
            </ul>
          </div>
        </article>

        <!-- Product 2: eDocSuite -->
        <article class="showcase-row reveal" id="edocsuite">
          <div>
            <span class="kicker">02 · DIGITAL DOCUMENT MANAGEMENT</span>
            <h3>eDocSuite</h3>
            <p>Keep supporting documents organized and accessible alongside your business records. Instead of searching through physical box files during audits or customer disputes, your team can open the exact scanned bill, bilty, or contract in seconds.</p>
            <div class="actions" style="margin-top: 22px;">
              <a class="btn" href="contact.php?interest=<?= rawurlencode('SetuLink / Digital Products') ?>&amp;product=eDocSuite">Book a Live eDocSuite Demo →</a>
            </div>
          </div>
          <div class="showcase-side">
            <h4>What eDocSuite Delivers</h4>
            <ul>
              <li>Attach purchase bills, transport bilty, challans, and contracts to vouchers</li>
              <li>Centralized digital repository linked directly with your business records</li>
              <li>Fast search and retrieval during GST, tax, and statutory audits</li>
              <li>Prevents lost paperwork and speeds up inter-department verification</li>
            </ul>
          </div>
        </article>

        <!-- Product 3: Setu AI -->
        <article class="showcase-row reveal" id="setu-ai">
          <div>
            <span class="kicker">03 · SMART BUSINESS INTELLIGENCE</span>
            <h3>Setu AI</h3>
            <p>Explore business insights and smarter ways to understand information from your Tally data. Setu AI turns thousands of daily accounting and inventory entries into clear visual trends, performance highlights, and executive summaries.</p>
            <div class="actions" style="margin-top: 22px;">
              <a class="btn" href="contact.php?interest=<?= rawurlencode('SetuLink / Digital Products') ?>&amp;product=Setu+AI">Book a Live Setu AI Demo →</a>
            </div>
          </div>
          <div class="showcase-side">
            <h4>What Setu AI Delivers</h4>
            <ul>
              <li>Clear visual dashboards for sales, margins, receivables, and cash flow</li>
              <li>Quick identification of slow-moving stock and overdue customer accounts</li>
              <li>Easy-to-read summaries tailored for business owners and directors</li>
              <li>Works seamlessly with your existing Tally Prime company data</li>
            </ul>
          </div>
        </article>
      </div>
    </div>
  </section>

<?php
setu_render_cta_strip(
    'Want to see SetuLink, eDocSuite, or Setu AI in action?',
    'Book a personalized live product demo with our implementation specialists.',
    'Schedule a Product Demo →',
    'contact.php?interest=' . rawurlencode('Product Demo')
);
setu_render_footer();
