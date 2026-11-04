<?php
/**
 * ------------------------------------------------------------------
 *  Guru Gorakhnath Construction - site configuration
 *  Saari business details yahin se badlein. Ek jagah change = poori site update.
 * ------------------------------------------------------------------
 */

$site = [
    'name'        => 'Guru Gorakhnath Construction',
    'name_hi'     => 'गुरु गोरखनाथ कंस्ट्रक्शन',
    'short'       => 'Guru Gorakhnath',
    'owner'       => 'Lalit Singh Negi',
    'owner_title' => 'Building Contractor & Founder',
    'reg_no'      => '05BBWPN874H1ZV',           // Registration / GSTIN (business card se)
    'phones'      => ['9756250992', '8192980992'],
    'whatsapp'    => '9756250992',
    'email'       => 'Guruconstruction107@gmail.com',
    'office'      => 'Kamalua Ganja Road, Kusumkhera',
    'office_hi'   => 'कमलुआ गंजा रोड, कुसुमखेड़ा',
    'city'        => 'Haldwani',
    'district'    => 'Distt. Nainital',
    'state'       => 'Uttarakhand',
    'map_query'   => 'Kamaluaganja Road, Kusumkhera, Haldwani, Uttarakhand',
    'tagline_hi'  => 'आपका सपना… हमारा निर्माण',
    'promise_hi'  => 'सुरक्षित निवेश, सुखद भविष्य',
    'base_url'    => '',                          // e.g. https://gurugorakhnathconstruction.in (live karte waqt)

    // Contact form: enquiry is mail par bhi jayegi (server par mail() chalu ho to)
    'mail_enquiries' => true,
];

/**
 * Highlights - DEMO numbers. Client se confirm karke badlein.
 */
$stats = [
    ['value' => 10,  'suffix' => '+', 'label' => 'Years in construction',  'hi' => 'वर्षों का अनुभव'],
    ['value' => 150, 'suffix' => '+', 'label' => 'Homes & plots delivered', 'hi' => 'पूरे किए गए कार्य'],
    ['value' => 100, 'suffix' => '%', 'label' => 'Paperwork assistance',    'hi' => 'कागज़ी कार्यवाही में मदद'],
    ['value' => 1,   'suffix' => '',  'label' => 'Point of contact - start to finish', 'hi' => 'एक ही ज़िम्मेदार व्यक्ति'],
];

/**
 * Construction cost estimator - indicative per sq.ft rates (₹).
 * Haldwani market ke hisaab se client ke saath final karein.
 */
$estimator = [
    'tiers' => [
        'standard' => ['label' => 'Standard', 'hi' => 'साधारण', 'rate' => 1750, 'note' => 'ISI brand material, vitrified tiles, standard fittings'],
        'premium'  => ['label' => 'Premium',  'hi' => 'प्रीमियम', 'rate' => 2150, 'note' => 'Branded fittings, granite/large tiles, POP false ceiling'],
        'luxury'   => ['label' => 'Luxury',   'hi' => 'लग्ज़री', 'rate' => 2650, 'note' => 'Designer elevation, imported finishes, modular kitchen'],
    ],
    'spread' => 0.07, // +/- range shown to customer
];

/**
 * Services
 */
$services = [
    [
        'slug'  => 'plots',
        'icon'  => 'map',
        'title' => 'Plot Buying & Selling',
        'hi'    => 'प्लॉट ख़रीदें / बेचें',
        'short' => 'Verified residential plots in and around Haldwani at fair prices - with clear papers.',
        'image' => 'res-hills.jpg',
        'points'=> ['Title & registry document check', 'Site visit with you - no pressure', 'Help with registry & mutation (dakhil-kharij)', 'Sell your plot through our buyer network'],
    ],
    [
        'slug'  => 'construction',
        'icon'  => 'hardhat',
        'title' => 'House Construction',
        'hi'    => 'मकान निर्माण',
        'short' => 'Turnkey home building - from naksha pass to final finishing, under one contract.',
        'image' => 'site-rcc-frame.jpg',
        'points'=> ['Naksha / map approval from authority', 'Structural design by qualified engineer', 'Material + labour or labour-only contract', 'Weekly photo updates on WhatsApp'],
    ],
    [
        'slug'  => 'ready-homes',
        'icon'  => 'key',
        'title' => 'Ready-to-Move Homes',
        'hi'    => 'बना बनाया मकान',
        'short' => 'Independent houses that are complete, inspected and ready for griha pravesh.',
        'image' => 'res-rowhouses.jpg',
        'points'=> ['Walk through before you decide', 'Clear title, approved map', 'Bank loan documentation support', 'Customise finishing on select units'],
    ],
    [
        'slug'  => 'naksha',
        'icon'  => 'file',
        'title' => 'Naksha & Approvals',
        'hi'    => 'नक्शा पास',
        'short' => 'Map drawing, elevation and approval work handled for you - no running around offices.',
        'image' => 'blueprint.jpg',
        'points'=> ['2D floor plans as per Vastu', '3D front elevation', 'Approval file preparation & follow-up', 'Estimate & BOQ before work starts'],
    ],
    [
        'slug'  => 'commercial',
        'icon'  => 'building',
        'title' => 'Commercial & Multi-storey',
        'hi'    => 'व्यावसायिक निर्माण',
        'short' => 'Shops, showrooms, rental floors and small complexes built to code and on schedule.',
        'image' => 'com-mart.jpg',
        'points'=> ['RCC framed structures', 'Shop-cum-residence buildings', 'Rental floor planning', 'Boundary walls & godowns'],
    ],
    [
        'slug'  => 'renovation',
        'icon'  => 'wrench',
        'title' => 'Renovation & Extension',
        'hi'    => 'मरम्मत व विस्तार',
        'short' => 'Add a floor, redo a kitchen, fix seepage or give your old house a fresh face.',
        'image' => 'int-drawing-room.jpg',
        'points'=> ['Floor extension on existing house', 'Waterproofing & seepage repair', 'Kitchen, bathroom & flooring upgrades', 'Exterior paint & elevation makeover'],
    ],
];

/**
 * Properties - DEMO listings. Asli plots/makaan ki details yahan daalein.
 * type: plot | house | ongoing
 */
$properties = [
    ['id' => 'P101', 'type' => 'plot',  'title' => 'Residential Plot near Kamalua Ganja Road', 'location' => 'Kusumkhera', 'area' => '1,200 sq.ft', 'facing' => 'East',  'price' => '₹ 18.5 Lakh', 'image' => 'site-open-plot.jpg',  'tags' => ['Registry ready', '20 ft road']],
    ['id' => 'P102', 'type' => 'plot',  'title' => 'Corner Plot, Gated Colony',               'location' => 'Lamachaur',  'area' => '1,800 sq.ft', 'facing' => 'North', 'price' => '₹ 24 Lakh',   'image' => 'plot-green.jpg',      'tags' => ['Corner', 'Boundary wall']],
    ['id' => 'H201', 'type' => 'house', 'title' => '3 BHK Independent House',                 'location' => 'Kusumkhera', 'area' => '1,650 sq.ft', 'facing' => 'East',  'price' => '₹ 62 Lakh',   'image' => 'res-yellow-house.jpg','tags' => ['Ready to move', 'Car parking']],
    ['id' => 'H202', 'type' => 'house', 'title' => '2 BHK Duplex in Row Colony',              'location' => 'Kamaluaganja','area' => '1,100 sq.ft', 'facing' => 'West',  'price' => '₹ 44 Lakh',   'image' => 'res-rowhouses.jpg',   'tags' => ['Ready to move', 'Loan approved']],
    ['id' => 'O301', 'type' => 'ongoing', 'title' => '4 BHK Independent House (Pre-booking)', 'location' => 'Kathgharia', 'area' => '2,400 sq.ft', 'facing' => 'North', 'price' => '₹ 95 Lakh',   'image' => 'site-rcc-frame.jpg',  'tags' => ['Possession 2027', 'Customisable']],
    ['id' => 'P103', 'type' => 'plot',  'title' => 'Budget Plot for First Home',              'location' => 'Bithoria',   'area' => '900 sq.ft',   'facing' => 'South', 'price' => '₹ 11 Lakh',   'image' => 'plot-field.jpg',      'tags' => ['Budget', 'Electricity line']],
    ['id' => 'H203', 'type' => 'house', 'title' => '3 BHK Kothi with Boundary Wall',          'location' => 'Panchakki',  'area' => '2,000 sq.ft', 'facing' => 'East',  'price' => '₹ 78 Lakh',   'image' => 'res-kothi.jpg',       'tags' => ['Corner', 'Car parking']],
    ['id' => 'O302', 'type' => 'ongoing', 'title' => 'Shop-cum-Residence Building',           'location' => 'Kusumkhera', 'area' => '2,200 sq.ft', 'facing' => 'Main road', 'price' => 'On request', 'image' => 'site-brick-house.jpg', 'tags' => ['Commercial', 'Under construction']],
];

$propertyTypes = [
    'plot'    => ['label' => 'Plot',            'hi' => 'प्लॉट'],
    'house'   => ['label' => 'Ready House',     'hi' => 'बना बनाया मकान'],
    'ongoing' => ['label' => 'Under Construction', 'hi' => 'निर्माणाधीन'],
];

/**
 * Projects gallery - DEMO photos (Wikimedia Commons, see credits.php). Client ke asli kaam ki photos se replace karein.
 * category: residential | commercial | interior | ongoing
 */
$projects = [
    ['title' => 'Two-storey Kothi',          'location' => 'Kusumkhera',   'category' => 'residential', 'image' => 'res-kothi.jpg'],
    ['title' => 'Row Houses, 2 BHK',         'location' => 'Kamaluaganja', 'category' => 'residential', 'image' => 'res-rowhouses.jpg'],
    ['title' => 'Brickwork, First Floor',    'location' => 'Lamachaur',    'category' => 'ongoing',     'image' => 'site-masons.jpg'],
    ['title' => 'Double-storey Family Home', 'location' => 'Bithoria',     'category' => 'residential', 'image' => 'res-yellow-house.jpg'],
    ['title' => 'Drawing Room Finishing',    'location' => 'Haldwani',     'category' => 'interior',    'image' => 'int-drawing-room.jpg'],
    ['title' => 'Showroom Building',         'location' => 'Rampur Road',  'category' => 'commercial',  'image' => 'com-mart.jpg'],
    ['title' => 'RCC Frame Work',            'location' => 'Kathgharia',   'category' => 'ongoing',     'image' => 'site-rcc-frame.jpg'],
    ['title' => 'Kitchen Platform & Tiling', 'location' => 'Kusumkhera',   'category' => 'interior',    'image' => 'int-kitchen.jpg'],
    ['title' => 'Shop-cum-Residence',        'location' => 'Bareilly Road','category' => 'commercial',  'image' => 'com-shop-residence.jpg'],
    ['title' => 'Pahadi-style Home',         'location' => 'Bhimtal Road', 'category' => 'residential', 'image' => 'res-pahadi-house.jpg'],
    ['title' => 'Living & Dining Area',      'location' => 'Haldwani',     'category' => 'interior',    'image' => 'int-living.jpg'],
    ['title' => 'Column Reinforcement',      'location' => 'Panchakki',    'category' => 'ongoing',     'image' => 'site-rebar-brick.jpg'],
    ['title' => 'Row of Shops',              'location' => 'Kusumkhera',   'category' => 'commercial',  'image' => 'com-shops-row.jpg'],
    ['title' => 'Exposed-brick House',       'location' => 'Damuadhunga',  'category' => 'residential', 'image' => 'res-brick-house.jpg'],
    ['title' => 'Hall with Marble Flooring', 'location' => 'Haldwani',     'category' => 'interior',    'image' => 'int-hall.jpg'],
    ['title' => 'Bamboo Scaffolding Work',   'location' => 'Kamaluaganja', 'category' => 'ongoing',     'image' => 'site-scaffold.jpg'],
    ['title' => 'Ground Floor Structure',    'location' => 'Lalkuan',      'category' => 'ongoing',     'image' => 'site-brick-house.jpg'],
];

$projectCategories = [
    'residential' => 'Residential',
    'commercial'  => 'Commercial',
    'interior'    => 'Interiors',
    'ongoing'     => 'On site',
];

/**
 * Construction journey - "Naksha se Chaabi tak"
 */
$journey = [
    ['hi' => 'मुलाक़ात',      'title' => 'Free site visit',          'text' => 'We visit your plot, understand your family\'s needs and your budget. No charges, no commitment.'],
    ['hi' => 'नक्शा',         'title' => 'Naksha & 3D design',       'text' => 'Floor plan as per Vastu and bylaws, plus a 3D front elevation so you see the house before it is built.'],
    ['hi' => 'नक्शा पास',     'title' => 'Approvals handled',        'text' => 'We prepare and follow up the approval file with the authority so you don\'t have to run around offices.'],
    ['hi' => 'अनुमान',        'title' => 'Written estimate',         'text' => 'Item-wise estimate (BOQ) and a simple agreement - materials, brands, timeline and payment stages in writing.'],
    ['hi' => 'निर्माण',       'title' => 'Construction + updates',   'text' => 'Foundation to finishing under one supervisor. Photos and progress on WhatsApp every week.'],
    ['hi' => 'गृह प्रवेश',     'title' => 'Handover & griha pravesh', 'text' => 'Final walkthrough, snag fixing and keys in your hand - with our support even after you move in.'],
];

/**
 * Why us - from the client's own banner: "विश्वास, गुणवत्ता एवं समय पर कार्य हमारी पहचान"
 */
$values = [
    ['icon' => 'shield', 'title' => 'Vishwas - Trust',       'hi' => 'विश्वास',   'text' => 'Registered contractor (Reg. No. on every bill). Clear papers, written estimates, no hidden charges.'],
    ['icon' => 'layers', 'title' => 'Gunvatta - Quality',    'hi' => 'गुणवत्ता',  'text' => 'Right cement-sand ratio, proper curing, ISI-marked steel. We build every house as if it were our own.'],
    ['icon' => 'clock',  'title' => 'Samay - On time',       'hi' => 'समय पर',   'text' => 'Stage-wise timeline agreed up front, and we stick to it. You always know what happens next.'],
    ['icon' => 'users',  'title' => 'Ek Zimmedaar - One owner','hi' => 'एक ज़िम्मेदार','text' => 'You deal directly with Lalit Singh Negi - not a call centre. One person answerable for your project.'],
];

$faqs = [
    ['q' => 'Do you only build, or can you also help me buy a plot?',
     'a' => 'Both. Many families come to us first for a plot and then we build their house on it. We also sell ready-made houses, so you can choose whichever suits your budget and timeline.'],
    ['q' => 'How much does it cost to build a house in Haldwani?',
     'a' => 'It depends on area, number of floors and the finish you choose. Use our cost calculator for a quick idea, then call us - after a free site visit we give a written, item-wise estimate.'],
    ['q' => 'Will you get my naksha (map) passed?',
     'a' => 'Yes. We prepare the drawings, submit the approval file and follow it up with the authority. Government fees are charged at actuals, with receipts.'],
    ['q' => 'Can I give only the labour contract and buy material myself?',
     'a' => 'Yes, we take both turnkey (material + labour) and labour-only contracts. We will guide you on quantity and brands either way.'],
    ['q' => 'How will I know what is happening at site?',
     'a' => 'You get regular photos and updates on WhatsApp, and you are welcome to visit the site any time. Payments are linked to completed stages.'],
    ['q' => 'Do you help with home loans?',
     'a' => 'We help you prepare the documents banks ask for - approved map, estimate and stage certificates - so the loan process goes smoothly.'],
];

$nav = [
    'index'      => 'Home',
    'services'   => 'Services',
    'properties' => 'Plots & Homes',
    'projects'   => 'Our Work',
    'about'      => 'About',
    'contact'    => 'Contact',
];
