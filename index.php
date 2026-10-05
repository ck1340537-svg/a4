<?php
// Chemistry Dock — homepage
$elements = json_decode('[[1, "H", "Hydrogen", "The lightest and most abundant element in the universe; stars are made mostly of hydrogen."], [2, "He", "Helium", "Second lightest element. It is so unreactive that it forms almost no compounds."], [3, "Li", "Lithium", "The lightest metal, soft enough to cut with a knife; widely used in rechargeable batteries."], [4, "Be", "Beryllium", "A light, stiff metal used in aerospace parts and precision instruments."], [5, "B", "Boron", "Found in borosilicate glass, which resists cracking when heated."], [6, "C", "Carbon", "Forms more compounds than almost any other element; diamond and graphite are both pure carbon."], [7, "N", "Nitrogen", "Makes up about 78% of the air we breathe."], [8, "O", "Oxygen", "About 21% of air and the most abundant element in Earth’s crust by mass."], [9, "F", "Fluorine", "The most electronegative element: it attracts electrons more strongly than any other."], [10, "Ne", "Neon", "Glows a vivid red-orange when electricity passes through it, hence neon signs."], [11, "Na", "Sodium", "A soft, reactive metal; combined with chlorine it forms sodium chloride, table salt."], [12, "Mg", "Magnesium", "Burns with a brilliant white light and forms strong, lightweight alloys."], [13, "Al", "Aluminium", "The most abundant metal in Earth’s crust; light and corrosion resistant."], [14, "Si", "Silicon", "The semiconductor at the heart of computer chips and solar cells."], [15, "P", "Phosphorus", "Exists in several forms, including white and red phosphorus; red phosphorus is used on matchboxes."], [16, "S", "Sulfur", "A bright yellow solid found near volcanic vents; an important industrial raw material."], [17, "Cl", "Chlorine", "A pale green gas used in water treatment to make drinking water safe."], [18, "Ar", "Argon", "Nearly 1% of the atmosphere; used as an unreactive shield gas in welding."], [19, "K", "Potassium", "A soft metal that reacts vigorously with water, producing a lilac flame."], [20, "Ca", "Calcium", "Found in limestone, chalk and marble as calcium carbonate."], [21, "Sc", "Scandium", "Added in small amounts to aluminium to make strong, light alloys."], [22, "Ti", "Titanium", "As strong as many steels but much lighter, and highly resistant to corrosion."], [23, "V", "Vanadium", "Added to steel to make tough tools and springs."], [24, "Cr", "Chromium", "Gives stainless steel its resistance to rust and provides shiny chrome plating."], [25, "Mn", "Manganese", "Essential in steelmaking, where it improves strength and hardness."], [26, "Fe", "Iron", "The most widely used metal, and the main component of Earth’s core."], [27, "Co", "Cobalt", "Gives glass and ceramics a deep blue colour; used in strong magnets."], [28, "Ni", "Nickel", "Used in coins, stainless steel and rechargeable batteries."], [29, "Cu", "Copper", "An excellent conductor of electricity, used in most electrical wiring."], [30, "Zn", "Zinc", "Coats steel to protect it from rusting, a process called galvanising."], [31, "Ga", "Gallium", "Melts at about 29.8 °C, so it can turn liquid on a warm day."], [32, "Ge", "Germanium", "Used in some of the earliest transistors and today in fibre-optic systems."], [33, "As", "Arsenic", "A metalloid combined with gallium to make semiconductors for LEDs and lasers."], [34, "Se", "Selenium", "Its conductivity changes with light, which made it useful in early photocopiers."], [35, "Br", "Bromine", "One of only two elements that are liquid at room temperature, along with mercury."], [36, "Kr", "Krypton", "A noble gas used in some high-performance lighting."]]', true);
$week = (int) date('W');
$eow = $elements[$week % count($elements)];
$msg = ''; $ok = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nl_email'])) {
    $email = trim((string) filter_input(INPUT_POST, 'nl_email', FILTER_SANITIZE_EMAIL));
    if (!empty($_POST['website'])) { $ok = true; $msg = 'Thank you!'; }
    elseif ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        @file_put_contents(__DIR__ . '/subscribers.txt', date('c') . "\t" . $email . PHP_EOL, FILE_APPEND | LOCK_EX);
        $ok = true; $msg = 'Subscribed! Your first Element of the Week arrives on Monday.';
    } else { $msg = 'Please enter a valid email address.'; }
}
function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Chemistry Dock | Free Chemistry Lessons, Periodic Table &amp; Practice</title>
<meta name="description" content="Learn chemistry for free: an interactive periodic table, molar mass calculator, equation balancing practice, key concepts, states of matter and study tips.">
<meta name="robots" content="index, follow, max-image-preview:large">
<link rel="canonical" href="https://www.chemistrydock.com/">
<meta property="og:type" content="website"><meta property="og:site_name" content="Chemistry Dock">
<meta property="og:title" content="Chemistry Dock | Free Chemistry Lessons, Periodic Table &amp; Practice"><meta property="og:description" content="Learn chemistry for free: an interactive periodic table, molar mass calculator, equation balancing practice, key concepts, states of matter and study tips.">
<meta property="og:url" content="https://www.chemistrydock.com/"><meta property="og:image" content="https://images.unsplash.com/photo-1694230155228-cdde50083573?auto=format&fit=crop&w=1200&q=75">
<meta name="twitter:card" content="summary_large_image"><meta name="theme-color" content="#101828">
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 40'%3E%3Crect width='40' height='40' rx='8' fill='%23F2B134'/%3E%3Ctext x='20' y='27' font-family='Arial' font-weight='bold' font-size='18' text-anchor='middle' fill='%23101828'%3ECh%3C/text%3E%3C/svg%3E">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link rel="preconnect" href="https://images.unsplash.com">
<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&family=Rubik:wght@500;600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0LY0HY7L01"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-0LY0HY7L01');
</script>
<script type="application/ld+json">[{"@context": "https://schema.org", "@type": "EducationalOrganization", "name": "Chemistry Dock", "url": "https://www.chemistrydock.com/", "email": "hello@chemistrydock.com", "telephone": "+1-888-777-5845", "address": {"@type": "PostalAddress", "streetAddress": "181 Mercer Street", "addressLocality": "New York", "addressRegion": "NY", "postalCode": "10012", "addressCountry": "US"}}, {"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Is chemistry hard to learn?", "acceptedAnswer": {"@type": "Answer", "text": "Chemistry builds on a few core ideas, especially atoms, bonding and the mole. Once those click, most topics follow naturally. Short, regular practice and working through examples by hand is far more effective than long cramming sessions."}}, {"@type": "Question", "name": "What should I learn first?", "acceptedAnswer": {"@type": "Answer", "text": "Start with atomic structure and the periodic table, then move to bonding, the mole concept and chemical equations. Our roadmap on this page follows that order."}}, {"@type": "Question", "name": "How do I calculate molar mass?", "acceptedAnswer": {"@type": "Answer", "text": "Add up the atomic masses of every atom in the formula. For water, H₂O, that is 2 × 1.008 + 15.999 = 18.015 g/mol. Our calculator does this for any formula using elements on our table."}}, {"@type": "Question", "name": "Why must equations be balanced?", "acceptedAnswer": {"@type": "Answer", "text": "Atoms are not created or destroyed in a chemical reaction; they are rearranged. A balanced equation shows the same number of each type of atom on both sides, reflecting the conservation of mass."}}, {"@type": "Question", "name": "Can I use these lessons in my classroom?", "acceptedAnswer": {"@type": "Answer", "text": "Yes. Teachers are welcome to use our explanations and practice questions with students for non-commercial educational purposes. Please credit Chemistry Dock."}}, {"@type": "Question", "name": "Do you provide instructions for experiments?", "acceptedAnswer": {"@type": "Answer", "text": "No. We focus on concepts, calculations and study skills. Practical work should always be carried out under the supervision of a qualified teacher in a properly equipped laboratory."}}]}]</script>
</head>
<body>
<a class="skip" href="#main">Skip to content</a>
<header class="hdr">
  <div class="wrap">
    <a class="logo" href="index.php" aria-label="Chemistry Dock home"><span class="tile-logo" aria-hidden="true">Ch</span><span>Chemistry<em>Dock</em></span></a>
    <nav aria-label="Main navigation"><ul class="nav" id="nav"><li><a href="index.php" aria-current="page">Home</a></li><li><a href="periodic-table.html">Periodic Table</a></li><li><a href="study-guides.html">Study Guides</a></li><li><a href="about.html">About</a></li><li><a href="contact.html">Contact</a></li></ul></nav>
    <button class="burger" aria-label="Open menu" aria-expanded="false" aria-controls="nav"><span></span><span></span><span></span></button>
  </div>
</header>
<main id="main">
<section class="hero graph">
  <div class="wrap">
    <div class="hero-grid">
      <div>
        <span class="unit">free chemistry lessons</span>
        <h1>Chemistry, explained <mark>one element</mark> at a time.</h1>
        <p class="lead">Chemistry Dock is a free study harbour for students and curious learners. Explore an interactive periodic table, calculate molar masses, practise balancing equations and work through clear study guides on the big ideas of chemistry.</p>
        <div class="ctas"><a class="btn btn--a" href="#table">Explore the elements</a><a class="btn btn--o" href="study-guides.html">Open the study guides</a></div>
      </div>
      <div class="mosaic">
        <div class="etile" style="background:var(--c-nonmetal)"><span class="z">1</span><span class="s">H</span><span class="n">Hydrogen</span></div><div class="etile" style="background:var(--c-nonmetal)"><span class="z">6</span><span class="s">C</span><span class="n">Carbon</span></div><div class="etile" style="background:var(--c-nonmetal)"><span class="z">8</span><span class="s">O</span><span class="n">Oxygen</span></div>
        <div class="etile photo"><img src="https://images.unsplash.com/photo-1694230155228-cdde50083573?auto=format&fit=crop&w=900&q=75" alt="row of test tubes filled with different coloured liquids" width="900" height="450" fetchpriority="high"></div>
        <div class="etile" style="background:var(--c-alkali)"><span class="z">11</span><span class="s">Na</span><span class="n">Sodium</span></div>
      </div>
    </div>
    <div class="eow"><span class="sym"><?php echo e($eow[1]); ?></span><p><strong>Element of the week: <?php echo e($eow[2]); ?> (atomic number <?php echo (int) $eow[0]; ?>).</strong> <?php echo e($eow[3]); ?></p></div>
  </div>
</section>

<section class="road" aria-labelledby="rd-t">
  <div class="wrap">
    <span class="unit">learning roadmap</span>
    <h2 id="rd-t">Five stops to chemistry confidence</h2>
    <div class="stops">
      <div class="stop"><span class="dot">01</span><h3>Atoms</h3><p>Protons, neutrons and electrons, and how they define each element.</p></div>
      <div class="stop"><span class="dot">02</span><h3>Periodic table</h3><p>Groups, periods and the trends that make the table so useful.</p></div>
      <div class="stop"><span class="dot">03</span><h3>Bonding</h3><p>Ionic, covalent and metallic bonds, and why atoms combine.</p></div>
      <div class="stop"><span class="dot">04</span><h3>The mole</h3><p>Counting particles by weighing, and calculating molar mass.</p></div>
      <div class="stop"><span class="dot">05</span><h3>Reactions</h3><p>Writing and balancing equations, and reaction types.</p></div>
    </div>
  </div>
</section>

<section class="pt" id="table" aria-labelledby="pt-t">
  <div class="wrap">
    <div class="head"><div><span class="unit">interactive</span><h2 id="pt-t">The first 36 elements</h2></div><p>These four periods contain most of the elements you meet in introductory chemistry. Select any element to see its key facts.</p></div>
    <div class="pt-wrap"><div class="ptable" role="group" aria-label="Periodic table, elements 1 to 36"><button type="button" class="el nonmetal" style="grid-column:1;grid-row:1" data-z="1" data-s="H" data-name="Hydrogen" data-m="1.008" data-cat="nonmetal" data-p="1" data-g="1" data-fact="The lightest and most abundant element in the universe; stars are made mostly of hydrogen." aria-pressed="false" aria-label="Hydrogen, atomic number 1"><small>1</small><b>H</b></button><button type="button" class="el noble" style="grid-column:18;grid-row:1" data-z="2" data-s="He" data-name="Helium" data-m="4.0026" data-cat="noble" data-p="1" data-g="18" data-fact="Second lightest element. It is so unreactive that it forms almost no compounds." aria-pressed="false" aria-label="Helium, atomic number 2"><small>2</small><b>He</b></button><button type="button" class="el alkali" style="grid-column:1;grid-row:2" data-z="3" data-s="Li" data-name="Lithium" data-m="6.94" data-cat="alkali" data-p="2" data-g="1" data-fact="The lightest metal, soft enough to cut with a knife; widely used in rechargeable batteries." aria-pressed="false" aria-label="Lithium, atomic number 3"><small>3</small><b>Li</b></button><button type="button" class="el alkaline" style="grid-column:2;grid-row:2" data-z="4" data-s="Be" data-name="Beryllium" data-m="9.0122" data-cat="alkaline" data-p="2" data-g="2" data-fact="A light, stiff metal used in aerospace parts and precision instruments." aria-pressed="false" aria-label="Beryllium, atomic number 4"><small>4</small><b>Be</b></button><button type="button" class="el metalloid" style="grid-column:13;grid-row:2" data-z="5" data-s="B" data-name="Boron" data-m="10.81" data-cat="metalloid" data-p="2" data-g="13" data-fact="Found in borosilicate glass, which resists cracking when heated." aria-pressed="false" aria-label="Boron, atomic number 5"><small>5</small><b>B</b></button><button type="button" class="el nonmetal" style="grid-column:14;grid-row:2" data-z="6" data-s="C" data-name="Carbon" data-m="12.011" data-cat="nonmetal" data-p="2" data-g="14" data-fact="Forms more compounds than almost any other element; diamond and graphite are both pure carbon." aria-pressed="true" aria-label="Carbon, atomic number 6"><small>6</small><b>C</b></button><button type="button" class="el nonmetal" style="grid-column:15;grid-row:2" data-z="7" data-s="N" data-name="Nitrogen" data-m="14.007" data-cat="nonmetal" data-p="2" data-g="15" data-fact="Makes up about 78% of the air we breathe." aria-pressed="false" aria-label="Nitrogen, atomic number 7"><small>7</small><b>N</b></button><button type="button" class="el nonmetal" style="grid-column:16;grid-row:2" data-z="8" data-s="O" data-name="Oxygen" data-m="15.999" data-cat="nonmetal" data-p="2" data-g="16" data-fact="About 21% of air and the most abundant element in Earth&#8217;s crust by mass." aria-pressed="false" aria-label="Oxygen, atomic number 8"><small>8</small><b>O</b></button><button type="button" class="el halogen" style="grid-column:17;grid-row:2" data-z="9" data-s="F" data-name="Fluorine" data-m="18.998" data-cat="halogen" data-p="2" data-g="17" data-fact="The most electronegative element: it attracts electrons more strongly than any other." aria-pressed="false" aria-label="Fluorine, atomic number 9"><small>9</small><b>F</b></button><button type="button" class="el noble" style="grid-column:18;grid-row:2" data-z="10" data-s="Ne" data-name="Neon" data-m="20.18" data-cat="noble" data-p="2" data-g="18" data-fact="Glows a vivid red-orange when electricity passes through it, hence neon signs." aria-pressed="false" aria-label="Neon, atomic number 10"><small>10</small><b>Ne</b></button><button type="button" class="el alkali" style="grid-column:1;grid-row:3" data-z="11" data-s="Na" data-name="Sodium" data-m="22.99" data-cat="alkali" data-p="3" data-g="1" data-fact="A soft, reactive metal; combined with chlorine it forms sodium chloride, table salt." aria-pressed="false" aria-label="Sodium, atomic number 11"><small>11</small><b>Na</b></button><button type="button" class="el alkaline" style="grid-column:2;grid-row:3" data-z="12" data-s="Mg" data-name="Magnesium" data-m="24.305" data-cat="alkaline" data-p="3" data-g="2" data-fact="Burns with a brilliant white light and forms strong, lightweight alloys." aria-pressed="false" aria-label="Magnesium, atomic number 12"><small>12</small><b>Mg</b></button><button type="button" class="el post" style="grid-column:13;grid-row:3" data-z="13" data-s="Al" data-name="Aluminium" data-m="26.982" data-cat="post" data-p="3" data-g="13" data-fact="The most abundant metal in Earth&#8217;s crust; light and corrosion resistant." aria-pressed="false" aria-label="Aluminium, atomic number 13"><small>13</small><b>Al</b></button><button type="button" class="el metalloid" style="grid-column:14;grid-row:3" data-z="14" data-s="Si" data-name="Silicon" data-m="28.085" data-cat="metalloid" data-p="3" data-g="14" data-fact="The semiconductor at the heart of computer chips and solar cells." aria-pressed="false" aria-label="Silicon, atomic number 14"><small>14</small><b>Si</b></button><button type="button" class="el nonmetal" style="grid-column:15;grid-row:3" data-z="15" data-s="P" data-name="Phosphorus" data-m="30.974" data-cat="nonmetal" data-p="3" data-g="15" data-fact="Exists in several forms, including white and red phosphorus; red phosphorus is used on matchboxes." aria-pressed="false" aria-label="Phosphorus, atomic number 15"><small>15</small><b>P</b></button><button type="button" class="el nonmetal" style="grid-column:16;grid-row:3" data-z="16" data-s="S" data-name="Sulfur" data-m="32.06" data-cat="nonmetal" data-p="3" data-g="16" data-fact="A bright yellow solid found near volcanic vents; an important industrial raw material." aria-pressed="false" aria-label="Sulfur, atomic number 16"><small>16</small><b>S</b></button><button type="button" class="el halogen" style="grid-column:17;grid-row:3" data-z="17" data-s="Cl" data-name="Chlorine" data-m="35.45" data-cat="halogen" data-p="3" data-g="17" data-fact="A pale green gas used in water treatment to make drinking water safe." aria-pressed="false" aria-label="Chlorine, atomic number 17"><small>17</small><b>Cl</b></button><button type="button" class="el noble" style="grid-column:18;grid-row:3" data-z="18" data-s="Ar" data-name="Argon" data-m="39.948" data-cat="noble" data-p="3" data-g="18" data-fact="Nearly 1% of the atmosphere; used as an unreactive shield gas in welding." aria-pressed="false" aria-label="Argon, atomic number 18"><small>18</small><b>Ar</b></button><button type="button" class="el alkali" style="grid-column:1;grid-row:4" data-z="19" data-s="K" data-name="Potassium" data-m="39.098" data-cat="alkali" data-p="4" data-g="1" data-fact="A soft metal that reacts vigorously with water, producing a lilac flame." aria-pressed="false" aria-label="Potassium, atomic number 19"><small>19</small><b>K</b></button><button type="button" class="el alkaline" style="grid-column:2;grid-row:4" data-z="20" data-s="Ca" data-name="Calcium" data-m="40.078" data-cat="alkaline" data-p="4" data-g="2" data-fact="Found in limestone, chalk and marble as calcium carbonate." aria-pressed="false" aria-label="Calcium, atomic number 20"><small>20</small><b>Ca</b></button><button type="button" class="el transition" style="grid-column:3;grid-row:4" data-z="21" data-s="Sc" data-name="Scandium" data-m="44.956" data-cat="transition" data-p="4" data-g="3" data-fact="Added in small amounts to aluminium to make strong, light alloys." aria-pressed="false" aria-label="Scandium, atomic number 21"><small>21</small><b>Sc</b></button><button type="button" class="el transition" style="grid-column:4;grid-row:4" data-z="22" data-s="Ti" data-name="Titanium" data-m="47.867" data-cat="transition" data-p="4" data-g="4" data-fact="As strong as many steels but much lighter, and highly resistant to corrosion." aria-pressed="false" aria-label="Titanium, atomic number 22"><small>22</small><b>Ti</b></button><button type="button" class="el transition" style="grid-column:5;grid-row:4" data-z="23" data-s="V" data-name="Vanadium" data-m="50.942" data-cat="transition" data-p="4" data-g="5" data-fact="Added to steel to make tough tools and springs." aria-pressed="false" aria-label="Vanadium, atomic number 23"><small>23</small><b>V</b></button><button type="button" class="el transition" style="grid-column:6;grid-row:4" data-z="24" data-s="Cr" data-name="Chromium" data-m="51.996" data-cat="transition" data-p="4" data-g="6" data-fact="Gives stainless steel its resistance to rust and provides shiny chrome plating." aria-pressed="false" aria-label="Chromium, atomic number 24"><small>24</small><b>Cr</b></button><button type="button" class="el transition" style="grid-column:7;grid-row:4" data-z="25" data-s="Mn" data-name="Manganese" data-m="54.938" data-cat="transition" data-p="4" data-g="7" data-fact="Essential in steelmaking, where it improves strength and hardness." aria-pressed="false" aria-label="Manganese, atomic number 25"><small>25</small><b>Mn</b></button><button type="button" class="el transition" style="grid-column:8;grid-row:4" data-z="26" data-s="Fe" data-name="Iron" data-m="55.845" data-cat="transition" data-p="4" data-g="8" data-fact="The most widely used metal, and the main component of Earth&#8217;s core." aria-pressed="false" aria-label="Iron, atomic number 26"><small>26</small><b>Fe</b></button><button type="button" class="el transition" style="grid-column:9;grid-row:4" data-z="27" data-s="Co" data-name="Cobalt" data-m="58.933" data-cat="transition" data-p="4" data-g="9" data-fact="Gives glass and ceramics a deep blue colour; used in strong magnets." aria-pressed="false" aria-label="Cobalt, atomic number 27"><small>27</small><b>Co</b></button><button type="button" class="el transition" style="grid-column:10;grid-row:4" data-z="28" data-s="Ni" data-name="Nickel" data-m="58.693" data-cat="transition" data-p="4" data-g="10" data-fact="Used in coins, stainless steel and rechargeable batteries." aria-pressed="false" aria-label="Nickel, atomic number 28"><small>28</small><b>Ni</b></button><button type="button" class="el transition" style="grid-column:11;grid-row:4" data-z="29" data-s="Cu" data-name="Copper" data-m="63.546" data-cat="transition" data-p="4" data-g="11" data-fact="An excellent conductor of electricity, used in most electrical wiring." aria-pressed="false" aria-label="Copper, atomic number 29"><small>29</small><b>Cu</b></button><button type="button" class="el transition" style="grid-column:12;grid-row:4" data-z="30" data-s="Zn" data-name="Zinc" data-m="65.38" data-cat="transition" data-p="4" data-g="12" data-fact="Coats steel to protect it from rusting, a process called galvanising." aria-pressed="false" aria-label="Zinc, atomic number 30"><small>30</small><b>Zn</b></button><button type="button" class="el post" style="grid-column:13;grid-row:4" data-z="31" data-s="Ga" data-name="Gallium" data-m="69.723" data-cat="post" data-p="4" data-g="13" data-fact="Melts at about 29.8 &deg;C, so it can turn liquid on a warm day." aria-pressed="false" aria-label="Gallium, atomic number 31"><small>31</small><b>Ga</b></button><button type="button" class="el metalloid" style="grid-column:14;grid-row:4" data-z="32" data-s="Ge" data-name="Germanium" data-m="72.63" data-cat="metalloid" data-p="4" data-g="14" data-fact="Used in some of the earliest transistors and today in fibre-optic systems." aria-pressed="false" aria-label="Germanium, atomic number 32"><small>32</small><b>Ge</b></button><button type="button" class="el metalloid" style="grid-column:15;grid-row:4" data-z="33" data-s="As" data-name="Arsenic" data-m="74.922" data-cat="metalloid" data-p="4" data-g="15" data-fact="A metalloid combined with gallium to make semiconductors for LEDs and lasers." aria-pressed="false" aria-label="Arsenic, atomic number 33"><small>33</small><b>As</b></button><button type="button" class="el nonmetal" style="grid-column:16;grid-row:4" data-z="34" data-s="Se" data-name="Selenium" data-m="78.971" data-cat="nonmetal" data-p="4" data-g="16" data-fact="Its conductivity changes with light, which made it useful in early photocopiers." aria-pressed="false" aria-label="Selenium, atomic number 34"><small>34</small><b>Se</b></button><button type="button" class="el halogen" style="grid-column:17;grid-row:4" data-z="35" data-s="Br" data-name="Bromine" data-m="79.904" data-cat="halogen" data-p="4" data-g="17" data-fact="One of only two elements that are liquid at room temperature, along with mercury." aria-pressed="false" aria-label="Bromine, atomic number 35"><small>35</small><b>Br</b></button><button type="button" class="el noble" style="grid-column:18;grid-row:4" data-z="36" data-s="Kr" data-name="Krypton" data-m="83.798" data-cat="noble" data-p="4" data-g="18" data-fact="A noble gas used in some high-performance lighting." aria-pressed="false" aria-label="Krypton, atomic number 36"><small>36</small><b>Kr</b></button></div></div>
    <div class="legend"><span><i style="background:var(--c-nonmetal)"></i>Reactive nonmetal</span><span><i style="background:var(--c-noble)"></i>Noble gas</span><span><i style="background:var(--c-alkali)"></i>Alkali metal</span><span><i style="background:var(--c-alkaline)"></i>Alkaline earth</span><span><i style="background:var(--c-metalloid)"></i>Metalloid</span><span><i style="background:var(--c-halogen)"></i>Halogen</span><span><i style="background:var(--c-transition)"></i>Transition metal</span><span><i style="background:var(--c-post)"></i>Post-transition</span></div>
    <div class="el-info" id="el-info" aria-live="polite">
<div class="big el nonmetal"><small>6</small><b>C</b><span>Carbon</span></div>
<div><h3 data-k="name" style="font-size:1.6rem;margin:0">Carbon</h3><dl><dt>Atomic number</dt><dd data-k="z">6</dd><dt>Atomic mass</dt><dd data-k="m">12.011</dd><dt>Category</dt><dd data-k="cat">Reactive nonmetal</dd><dt>Position</dt><dd data-k="pos">Period 2, Group 14</dd></dl><p data-k="fact">Forms more compounds than almost any other element; diamond and graphite are both pure carbon.</p></div></div>
    <p style="margin-top:18px"><a href="periodic-table.html">Learn how to read the periodic table &rarr;</a></p>
  </div>
</section>

<section class="tools" id="tools" aria-label="Chemistry tools">
  <div class="wrap tool-grid">
    <div class="tool">
      <div class="pic"><img src="https://images.unsplash.com/photo-1631557673853-b5c9c45527ef?auto=format&fit=crop&w=900&q=75" alt="group of beakers filled with liquid on a table" width="900" height="394" loading="lazy"></div>
      <div class="in">
        <span class="unit">calculator</span>
        <h2 style="font-size:1.7rem">Molar mass calculator</h2>
        <p class="muted">Type a chemical formula. Use capital letters for each element and brackets for groups, e.g. <code>Ca(OH)2</code>.</p>
        <div class="formula-in"><label for="formula" class="skip">Chemical formula</label><input id="formula" value="H2O" autocomplete="off" spellcheck="false"></div>
        <div class="examples"><button type="button" data-f="NaCl">NaCl</button><button type="button" data-f="CO2">CO2</button><button type="button" data-f="CaCO3">CaCO3</button><button type="button" data-f="Ca(OH)2">Ca(OH)2</button><button type="button" data-f="Fe2O3">Fe2O3</button><button type="button" data-f="NH3">NH3</button></div>
        <div class="result" id="mm-out" aria-live="polite">Molar mass of <code>H2O</code>: <b>18.02 g/mol</b></div>
      </div>
    </div>
    <div class="tool">
      <div class="pic"><img src="https://images.unsplash.com/photo-1509228468518-180dd4864904?auto=format&fit=crop&w=900&q=75" alt="printed system of equations on white paper" width="900" height="394" loading="lazy"></div>
      <div class="in">
        <span class="unit">practice</span>
        <h2 style="font-size:1.7rem">Balance the equations</h2>
        <p class="muted">Enter the smallest whole-number coefficients so that each side has the same number of every atom. Leave a box empty for 1.</p>
        <div class="eq"><input type="number" min="1" max="9" placeholder="1" data-a="2" aria-label="coefficient for H2"><span>H<sub>2</sub></span><span>+</span><input type="number" min="1" max="9" placeholder="1" data-a="1" aria-label="coefficient for O2"><span>O<sub>2</sub></span><span class="arrow">&rarr;</span><input type="number" min="1" max="9" placeholder="1" data-a="2" aria-label="coefficient for H2O"><span>H<sub>2</sub>O</span></div><div class="eq"><input type="number" min="1" max="9" placeholder="1" data-a="1" aria-label="coefficient for CH4"><span>CH<sub>4</sub></span><span>+</span><input type="number" min="1" max="9" placeholder="1" data-a="2" aria-label="coefficient for O2"><span>O<sub>2</sub></span><span class="arrow">&rarr;</span><input type="number" min="1" max="9" placeholder="1" data-a="1" aria-label="coefficient for CO2"><span>CO<sub>2</sub></span><span>+</span><input type="number" min="1" max="9" placeholder="1" data-a="2" aria-label="coefficient for H2O"><span>H<sub>2</sub>O</span></div><div class="eq"><input type="number" min="1" max="9" placeholder="1" data-a="1" aria-label="coefficient for N2"><span>N<sub>2</sub></span><span>+</span><input type="number" min="1" max="9" placeholder="1" data-a="3" aria-label="coefficient for H2"><span>H<sub>2</sub></span><span class="arrow">&rarr;</span><input type="number" min="1" max="9" placeholder="1" data-a="2" aria-label="coefficient for NH3"><span>NH<sub>3</sub></span></div><div class="eq"><input type="number" min="1" max="9" placeholder="1" data-a="4" aria-label="coefficient for Fe"><span>Fe</span><span>+</span><input type="number" min="1" max="9" placeholder="1" data-a="3" aria-label="coefficient for O2"><span>O<sub>2</sub></span><span class="arrow">&rarr;</span><input type="number" min="1" max="9" placeholder="1" data-a="2" aria-label="coefficient for Fe2O3"><span>Fe<sub>2</sub>O<sub>3</sub></span></div>
        <div class="check-row"><button type="button" class="btn" id="bal-check">Check answers</button><button type="button" class="btn btn--o" id="bal-show">Show answers</button></div>
        <p id="bal-msg" aria-live="polite" style="margin-top:12px"></p>
      </div>
    </div>
  </div>
</section>

<section class="concepts" aria-labelledby="cn-t">
  <div class="wrap con-grid">
    <div class="pic"><img src="https://images.unsplash.com/photo-1603126857599-f6e157fa2fe6?auto=format&fit=crop&w=800&q=75" alt="molecular model made of coloured spheres on a dark surface" width="800" height="880" loading="lazy"></div>
    <div>
      <span class="unit">key concepts</span>
      <h2 id="cn-t">Four ideas everything else builds on</h2>
      <div class="cards">
        <div class="card"><span class="f">atom = p&#8314; + n&#8304; + e&#8315;</span><h3>Atoms</h3><p>The smallest unit of an element. The number of protons, the atomic number, decides which element it is.</p></div>
        <div class="card"><span class="f">Na &rarr; Na&#8314; + e&#8315;</span><h3>Ions</h3><p>Atoms that have gained or lost electrons, giving them an electric charge.</p></div>
        <div class="card"><span class="f">&sup1;&sup2;C vs &sup1;&#8308;C</span><h3>Isotopes</h3><p>Atoms of the same element with different numbers of neutrons, and so different masses.</p></div>
        <div class="card"><span class="f">H&ndash;O&ndash;H</span><h3>Bonds</h3><p>Forces that hold atoms together, formed by transferring or sharing electrons.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="states" aria-labelledby="sm-t">
  <div class="wrap">
    <div class="head"><div><span class="unit">states of matter</span><h2 id="sm-t">Solid, liquid, gas</h2></div><p>The same substance can exist in different states. What changes is how much energy its particles have and how freely they move.</p></div>
    <div class="st-grid">
      <article class="st"><div class="pic"><img src="https://images.unsplash.com/photo-1533420896084-06d2bce5365f?auto=format&fit=crop&w=700&q=75" alt="close-up of translucent blue glacial ice" width="700" height="438" loading="lazy"></div><div class="box solid" aria-hidden="true"><i style="left:20px;top:14px"></i><i style="left:48px;top:14px"></i><i style="left:76px;top:14px"></i><i style="left:104px;top:14px"></i><i style="left:132px;top:14px"></i><i style="left:160px;top:14px"></i><i style="left:20px;top:42px"></i><i style="left:48px;top:42px"></i><i style="left:76px;top:42px"></i><i style="left:104px;top:42px"></i><i style="left:132px;top:42px"></i><i style="left:160px;top:42px"></i><i style="left:20px;top:70px"></i><i style="left:48px;top:70px"></i><i style="left:76px;top:70px"></i><i style="left:104px;top:70px"></i><i style="left:132px;top:70px"></i><i style="left:160px;top:70px"></i></div><div class="t"><h3>Solid</h3><p>Particles are packed closely in a fixed arrangement and vibrate in place. Solids keep their shape.</p></div></article>
      <article class="st"><div class="pic"><img src="https://images.unsplash.com/photo-1556010656-e60700d4c0d5?auto=format&fit=crop&w=700&q=75" alt="drop of water falling into a body of water" width="700" height="438" loading="lazy"></div><div class="box liquid" aria-hidden="true"><i style="left:18px;top:40px"></i><i style="left:55px;top:63px"></i><i style="left:92px;top:86px"></i><i style="left:129px;top:53px"></i><i style="left:166px;top:76px"></i><i style="left:43px;top:43px"></i><i style="left:80px;top:66px"></i><i style="left:117px;top:89px"></i><i style="left:154px;top:56px"></i><i style="left:31px;top:79px"></i><i style="left:68px;top:46px"></i><i style="left:105px;top:69px"></i></div><div class="t"><h3>Liquid</h3><p>Particles are close together but can slide past each other, so liquids flow and take the shape of their container.</p></div></article>
      <article class="st"><div class="pic"><img src="https://images.unsplash.com/photo-1541701494587-cb58502866ab?auto=format&fit=crop&w=700&q=75" alt="swirls of blue and orange smoke" width="700" height="438" loading="lazy"></div><div class="box gas" aria-hidden="true"><i style="left:10px;top:20px"></i><i style="left:63px;top:61px"></i><i style="left:116px;top:32px"></i><i style="left:169px;top:73px"></i><i style="left:22px;top:44px"></i><i style="left:75px;top:85px"></i></div><div class="t"><h3>Gas</h3><p>Particles are far apart and move quickly in all directions, spreading out to fill any space.</p></div></article>
    </div>
  </div>
</section>

<div class="wrap">
  <section class="split" aria-labelledby="sf-t">
    <div class="pic"><img src="https://images.unsplash.com/photo-1707944745860-4615eb585a41?auto=format&fit=crop&w=900&q=75" alt="man in a laboratory wearing safety goggles" width="900" height="765" loading="lazy"></div>
    <div>
      <span class="unit">in the lab</span>
      <h2 id="sf-t">Lab safety basics every student should know</h2>
      <p class="muted">School practicals are a great way to see chemistry in action. These general habits keep everyone safe; always follow your teacher&#8217;s instructions first.</p>
      <ol class="rules">
        <li><span>Wear eye protection whenever practical work is happening, even if you are only watching.</span></li>
        <li><span>Never eat, drink or taste anything in a laboratory.</span></li>
        <li><span>Read the instructions and hazard labels before you start, and ask if anything is unclear.</span></li>
        <li><span>Tie back long hair and keep bags and coats out of the way.</span></li>
        <li><span>Report spills, breakages or injuries to your teacher straight away.</span></li>
        <li><span>Only carry out experiments that your teacher has approved and is supervising.</span></li>
      </ol>
    </div>
  </section>
  <section class="split rev" style="padding-top:0" aria-labelledby="st-t">
    <div class="pic"><img src="https://images.unsplash.com/photo-1756032433560-56547efed550?auto=format&fit=crop&w=900&q=75" alt="person studying at a desk with books" width="900" height="765" loading="lazy"></div>
    <div>
      <span class="unit">exam ready</span>
      <h2 id="st-t">Study habits that work for chemistry</h2>
      <ul class="rules" style="counter-reset:none">
        <li style="grid-template-columns:1fr"><span><strong>Practise calculations by hand.</strong> Moles, concentrations and percentages only stick with repetition.</span></li>
        <li style="grid-template-columns:1fr"><span><strong>Explain it out loud.</strong> If you can teach a concept to a friend, you understand it.</span></li>
        <li style="grid-template-columns:1fr"><span><strong>Learn the first 20 elements.</strong> Knowing their symbols and order saves time in every exam.</span></li>
        <li style="grid-template-columns:1fr"><span><strong>Use past papers.</strong> They show which skills examiners test most often.</span></li>
        <li style="grid-template-columns:1fr"><span><strong>Space your revision.</strong> Short sessions over many days beat one long night.</span></li>
      </ul>
      <a class="btn" href="study-guides.html" style="margin-top:16px">Go to study guides</a>
    </div>
  </section>
</div>

<section class="gloss" aria-labelledby="gl-t">
  <div class="wrap g-grid">
    <div><span class="unit">glossary</span><h2 id="gl-t">Words worth knowing</h2><p>Chemistry has its own vocabulary. Here are terms that appear in almost every lesson.</p><div class="pic"><img src="https://images.unsplash.com/photo-1546608135-e5de34abc308?auto=format&fit=crop&w=800&q=75" alt="close-up of sparkling crystals" width="800" height="600" loading="lazy"></div></div>
    <dl class="terms">
      <div><dt>Element</dt><dd>A substance made of only one type of atom.</dd></div>
      <div><dt>Compound</dt><dd>Two or more elements chemically bonded in fixed proportions.</dd></div>
      <div><dt>Mixture</dt><dd>Substances combined physically, not chemically bonded.</dd></div>
      <div><dt>Mole</dt><dd>6.022 &times; 10&sup2;&sup3; particles of a substance.</dd></div>
      <div><dt>Valence electrons</dt><dd>Electrons in the outer shell that take part in bonding.</dd></div>
      <div><dt>Electronegativity</dt><dd>How strongly an atom attracts electrons in a bond.</dd></div>
      <div><dt>Reactant</dt><dd>A substance that is used up in a chemical reaction.</dd></div>
      <div><dt>Product</dt><dd>A substance formed by a chemical reaction.</dd></div>
    </dl>
  </div>
</section>

<section class="faq" aria-labelledby="fq-t">
  <div class="wrap faq-grid">
    <div><span class="unit">questions</span><h2 id="fq-t">Student questions, answered</h2><p class="muted">Stuck on something? Send us your question and we will try to help.</p><a class="btn btn--o" href="contact.html">Ask a question</a><div class="pic"><img src="https://images.unsplash.com/photo-1758685734622-3e0a002b2f53?auto=format&fit=crop&w=800&q=75" alt="professor writing formulas on a blackboard" width="800" height="450" loading="lazy"></div></div>
    <div><details open><summary>Is chemistry hard to learn?</summary><p>Chemistry builds on a few core ideas, especially atoms, bonding and the mole. Once those click, most topics follow naturally. Short, regular practice and working through examples by hand is far more effective than long cramming sessions.</p></details><details><summary>What should I learn first?</summary><p>Start with atomic structure and the periodic table, then move to bonding, the mole concept and chemical equations. Our roadmap on this page follows that order.</p></details><details><summary>How do I calculate molar mass?</summary><p>Add up the atomic masses of every atom in the formula. For water, H&#8322;O, that is 2 &times; 1.008 + 15.999 = 18.015 g/mol. Our calculator does this for any formula using elements on our table.</p></details><details><summary>Why must equations be balanced?</summary><p>Atoms are not created or destroyed in a chemical reaction; they are rearranged. A balanced equation shows the same number of each type of atom on both sides, reflecting the conservation of mass.</p></details><details><summary>Can I use these lessons in my classroom?</summary><p>Yes. Teachers are welcome to use our explanations and practice questions with students for non-commercial educational purposes. Please credit Chemistry Dock.</p></details><details><summary>Do you provide instructions for experiments?</summary><p>No. We focus on concepts, calculations and study skills. Practical work should always be carried out under the supervision of a qualified teacher in a properly equipped laboratory.</p></details></div>
  </div>
</section>

<section class="nl" id="eow" aria-labelledby="nl-t">
  <div class="wrap">
    <div class="nl-box">
      <div class="in">
        <span class="unit" style="color:var(--navy)">weekly email</span>
        <h2 id="nl-t">Element of the Week</h2>
        <p>One element every Monday: where it is found, what it is used for and a quick practice question. Short, free and easy to unsubscribe.</p>
        <?php if ($msg): ?><p class="<?php echo $ok ? 'ok' : 'err'; ?>" role="status"><?php echo e($msg); ?></p><?php endif; ?>
        <form method="post" action="index.php#eow">
          <label for="ne" class="skip">Email address</label>
          <input type="email" id="ne" name="nl_email" placeholder="you@example.com" required autocomplete="email">
          <input type="text" name="website" tabindex="-1" autocomplete="off" style="display:none" aria-hidden="true">
          <button class="btn" type="submit">Subscribe</button>
        </form>
        <p class="small">See our <a href="privacy-policy.html" style="color:var(--navy)">Privacy Policy</a>.</p>
      </div>
      <div class="pic"><img src="https://images.unsplash.com/photo-1617155093730-a8bf47be792d?auto=format&fit=crop&w=800&q=75" alt="gloved hand holding a glass beaker of clear liquid" width="800" height="600" loading="lazy"></div>
    </div>
  </div>
</section>
</main>
<footer class="ftr">
  <div class="wrap">
    <div class="ftr-grid">
      <div><a class="logo" href="index.php"><span class="tile-logo" aria-hidden="true">Ch</span><span>Chemistry<em>Dock</em></span></a><p>Free, clear chemistry lessons for students and curious minds: the periodic table, atoms and bonding, the mole and chemical equations.</p></div>
      <div><h4>// learn</h4><a href="periodic-table.html">Periodic Table</a><a href="study-guides.html">Study Guides</a><a href="index.php#tools">Molar Mass Calculator</a><a href="index.php#tools">Balancing Practice</a></div>
      <div><h4>// policies</h4><a href="privacy-policy.html">Privacy Policy</a><a href="terms-and-conditions.html">Terms &amp; Conditions</a><a href="cookie-policy.html">Cookie Policy</a><a href="disclaimer.html">Disclaimer</a><a href="editorial-policy.html">Editorial Policy</a></div>
      <div><h4>// contact</h4><p>181 Mercer Street, New York, NY 10012, United States</p><a href="tel:+18887775845">+1-888-777-5845</a><a href="mailto:hello@chemistrydock.com">hello@chemistrydock.com</a></div>
    </div>
    <div class="ftr-base"><span>&copy; <?php echo date("Y"); ?> Chemistry Dock. All rights reserved.</span><span>Photos from Unsplash under the Unsplash License.</span></div>
  </div>
</footer>
<div class="cookie" id="cookie" role="dialog" aria-label="Cookie notice"><p>We use essential cookies and, with your consent, analytics cookies to improve our lessons. <a href="cookie-policy.html">Cookie Policy</a></p><button class="y" data-cookie="accepted">Accept</button><button data-cookie="declined">Essential only</button></div>
<script src="assets/js/main.js" defer></script>
</body>
</html>
