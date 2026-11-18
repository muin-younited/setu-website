<?php
require __DIR__ . '/../private/layout.php';
$baseUrl = setu_base_url();

setu_render_header([
    'active'       => 'solutions',
    'path'         => 'solutions.php',
    'title'        => 'Industry Solutions | Cold Storage, Transport, Rice Mill, Petrol Pump & Jewellery Tally ERP — Setu Digital Solutions',
    'description'  => 'Purpose-built Tally Prime ERP modules for Transport & Fleet, Cold Storage, Jewellery Retail, Rice & Flour Mills, Petrol Pumps, Printing Press, Garments, Healthcare, and Lead Management.',
    'keywords'     => 'Cold Storage Tally Software, Transport Fleet Tally Module, Rice Mill Tally ERP, Petrol Pump Tally Accounting, Jewellery Tally Customization, Garments Manufacturing Tally ERP, Healthcare OPD IPD Tally',
    'page_heading' => 'Industry Solutions',
    'page_sub'     => 'Purpose-built modules for specialized workflows across operations, inventory, finance, and service management.',
    'breadcrumb'   => 'Solutions',
    'extra_schema' => [
        [
            '@type'       => 'ItemList',
            '@id'         => $baseUrl . '/solutions.php#industry-list',
            'name'        => 'Setu Digital Solutions Industry-Specific Tally Modules',
            'description' => 'Specialized Tally Prime ERP modules tailored for 10 industry verticals.',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Transport & Fleet Tally Solution'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Cold Storage Tally ERP Solution'],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Jewellery Retail Tally Solution'],
                ['@type' => 'ListItem', 'position' => 4, 'name' => 'Rice & Flour Mill Tally Solution'],
                ['@type' => 'ListItem', 'position' => 5, 'name' => 'Petrol Pump Tally Solution'],
                ['@type' => 'ListItem', 'position' => 6, 'name' => 'Printing Press Tally Solution'],
                ['@type' => 'ListItem', 'position' => 7, 'name' => 'Garments Manufacturing Tally Solution'],
                ['@type' => 'ListItem', 'position' => 8, 'name' => 'Healthcare / OPD-IPD Tally Integration'],
                ['@type' => 'ListItem', 'position' => 9, 'name' => 'Service Industry Tally Solution'],
                ['@type' => 'ListItem', 'position' => 10, 'name' => 'Lead Management & Sales CRM Solution'],
            ],
        ],
    ],
]);
?>

  <!-- All 10 Industry Solutions Grid -->
  <section aria-labelledby="solutions-main-title">
    <div class="wrap">
      <div class="heading reveal">
        <span class="kicker">BUILT FOR THE WAY YOUR INDUSTRY WORKS</span>
        <h2 id="solutions-main-title">Customized For Your Business's Specific Needs</h2>
        <p>Standard accounting entries are not enough when your business needs lot-wise storage tracking, vehicle trip profitability, mill yield calculation, or fine-weight jewellery accounting. Explore our 10 specialized industry verticals below:</p>
      </div>

      <div class="cards-2">
        <!-- 1. Transport & Fleet -->
        <article class="card reveal" id="transport-fleet">
          <div>
            <span class="kicker">01 · LOGISTICS &amp; TRANSPORT</span>
            <h3>Transport &amp; Fleet</h3>
            <p>Manage consignment bookings (bilty), vehicle-wise trip sheets, driver advances, diesel expenses, and freight billing directly integrated with your Tally accounts.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Transport & Fleet') ?>"><span>Enquire About Transport &amp; Fleet</span><span>→</span></a>
        </article>

        <!-- 2. Cold Storage -->
        <article class="card reveal" id="cold-storage">
          <div>
            <span class="kicker">02 · AGRI &amp; WAREHOUSING</span>
            <h3>Cold Storage</h3>
            <p>End-to-end management for inward receipt (gate pass), chamber/rack/lot allocation, outward delivery orders, seasonal rent calculation, and farmer/party loan accounting.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Cold Storage') ?>"><span>Enquire About Cold Storage</span><span>→</span></a>
        </article>

        <!-- 3. Jewellery Retail -->
        <article class="card reveal" id="jewellery-retail">
          <div>
            <span class="kicker">03 · RETAIL &amp; BULLION</span>
            <h3>Jewellery Retail</h3>
            <p>Specialized accounting and inventory control for gold, silver, and diamond jewellers—handling gross weight, net weight, purity/touch, wastage, making charges, and Karigar accounts.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Jewellery Retail') ?>"><span>Enquire About Jewellery Retail</span><span>→</span></a>
        </article>

        <!-- 4. Rice & Flour Mill -->
        <article class="card reveal" id="rice-flour-mill">
          <div>
            <span class="kicker">04 · AGRO PROCESSING</span>
            <h3>Rice &amp; Flour Mill</h3>
            <p>Track paddy/wheat procurement, moisture/quality deductions, milling batch production, main product and by-product (bran, broken, husk) yield percentages, and bardana stock.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Rice & Flour Mill') ?>"><span>Enquire About Rice &amp; Flour Mill</span><span>→</span></a>
        </article>

        <!-- 5. Petrol Pump -->
        <article class="card reveal" id="petrol-pump">
          <div>
            <span class="kicker">05 · FUEL &amp; RETAIL STATIONS</span>
            <h3>Petrol Pump</h3>
            <p>Streamline daily nozzle meter readings, shift-wise salesman cash/card/UPI collection, underground tank dip stock, lubricant sales, and credit customer slip billing.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Petrol Pump') ?>"><span>Enquire About Petrol Pump</span><span>→</span></a>
        </article>

        <!-- 6. Printing Press -->
        <article class="card reveal" id="printing-press">
          <div>
            <span class="kicker">06 · PRINT &amp; PACKAGING</span>
            <h3>Printing Press</h3>
            <p>Manage customer job cards, paper/reel/ink consumption, plate making, printing, lamination, binding stages, and job-wise cost vs. billing comparison.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Printing Press') ?>"><span>Enquire About Printing Press</span><span>→</span></a>
        </article>

        <!-- 7. Garments Manufacturing -->
        <article class="card reveal" id="garments-manufacturing">
          <div>
            <span class="kicker">07 · APPAREL &amp; TEXTILES</span>
            <h3>Garments Manufacturing</h3>
            <p>Control fabric issue, cutting, stitching, embroidery, washing, and finishing job-work across internal units and external contractors with size/color/style matrix tracking.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Garments Manufacturing') ?>"><span>Enquire About Garments Manufacturing</span><span>→</span></a>
        </article>

        <!-- 8. Healthcare / OPD-IPD -->
        <article class="card reveal" id="healthcare">
          <div>
            <span class="kicker">08 · HOSPITALS &amp; CLINICS</span>
            <h3>Healthcare / OPD-IPD</h3>
            <p>Connect OPD consultation receipts, IPD patient billing, pathology/diagnostics, and pharmacy inventory seamlessly with Tally Prime for accurate financial and department reporting.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Healthcare / OPD-IPD') ?>"><span>Enquire About Healthcare Solution</span><span>→</span></a>
        </article>

        <!-- 9. Service Industry -->
        <article class="card reveal" id="service-industry">
          <div>
            <span class="kicker">09 · CONTRACT &amp; FIELD SERVICES</span>
            <h3>Service Industry</h3>
            <p>Organize service contracts, Annual Maintenance Contracts (AMC), technician visit logs, spare-part billing, and recurring renewal reminders inside your accounting workflow.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Service Industry') ?>"><span>Enquire About Service Industry</span><span>→</span></a>
        </article>

        <!-- 10. Lead Management -->
        <article class="card reveal" id="lead-management">
          <div>
            <span class="kicker">10 · SALES &amp; CRM WORKFLOW</span>
            <h3>Lead Management</h3>
            <p>Capture customer enquiries, assign leads to sales executives, track follow-up dates, schedule product demos, and convert approved quotations directly into Tally sales orders.</p>
          </div>
          <a class="card-foot" href="contact.php?interest=<?= rawurlencode('Industry Solution') ?>&amp;industry=<?= rawurlencode('Lead Management') ?>"><span>Enquire About Lead Management</span><span>→</span></a>
        </article>
      </div>
    </div>
  </section>

<?php
setu_render_cta_strip(
    'Looking for a Tally module tailored to your industry?',
    'Tell us about your operational workflow and we will demonstrate the right solution for your team.',
    'Request an Industry Demo →',
    'contact.php?interest=' . rawurlencode('Industry Solution')
);
setu_render_footer();
