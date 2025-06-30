<?php
$title = __('Tools');
$description = __('All our tools are completely free to use, with no hidden charges or subscription fees. Most tools process data directly in your browser, ensuring your information stays private. Start using our tools immediately - no account creation or sign-up required.');
$keywords = __('Tools, Free Tools, Web Development, Productivity, Finance, Miscellaneous, shortener url, consent mode, timer, chronometer, keyboard test');
?>

<?php $headExtra = section(function () { ?>
    <link rel="stylesheet" href="<?php echo asset('css/tools.css?v=0.8') ?>">
<?php }); ?>

<?php $content = section(function () { ?>
    <section class="page-header">
        <div class="container">
            <h1><?php echo __('All Tools') ?></h1>
            <p><?php echo __('A comprehensive collection of free web-based tools designed to simplify your online tasks.') ?></p>
        </div>
    </section>

    <main>
        <section class="all-tools">
            <div class="container">
                <div class="tools-categories">
                    <button class="category-btn active" data-category="all"><?php echo __('All') ?></button>
                    <button class="category-btn" data-category="web"><?php echo __('Web Development') ?></button>
                    <button class="category-btn" data-category="productivity"><?php echo __('Productivity') ?></button>
                    <button class="category-btn" data-category="finance"><?php echo __('Finance') ?></button>
                    <button class="category-btn" data-category="misc"><?php echo __('Miscellaneous') ?></button>
                </div>

                <div class="tools-grid">
                    <a href="https://consentmode.toolz.at" class="tool-card" data-category="web">
                        <div class="tool-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <h3><?php echo __('Consent Mode Banner') ?></h3>
                        <p><?php echo __('Generate cookie consent banners for your website that comply with privacy regulations like GDPR and CCPA.') ?></p>
                        <div class="tool-footer">
                            <span class="tool-tag"><?php echo __('Web Development') ?></span>
                        </div>
                    </a>

                    <a href="https://simulafacil.toolz.at" class="tool-card" data-category="finance">
                        <div class="tool-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                <line x1="12" y1="17" x2="12" y2="21"></line>
                            </svg>
                        </div>
                        <h3><?php echo __('Simula Fácil') ?></h3>
                        <p><?php echo __('Collection of financial calculators for loan payments, investments, and savings plans with detailed amortization schedules.') ?></p>
                        <div class="tool-footer">
                            <span class="tool-tag"><?php echo __('Finance') ?></span>
                        </div>
                    </a>

                    <a href="https://clik.now" class="tool-card" data-category="web">
                        <div class="tool-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                            </svg>
                        </div>
                        <h3><?php echo __('Clik Now') ?></h3>
                        <p><?php echo __('URL shortener service to create compact, shareable links with click tracking and analytics.') ?></p>
                        <div class="tool-footer">
                            <span class="tool-tag"><?php echo __('Web Development') ?></span>
                        </div>
                    </a>
<!--
                    <a href="https://timer.toolz.at" class="tool-card" data-category="productivity">
                        <div class="tool-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <h3><?php echo __('Timer') ?></h3>
                        <p><?php echo __('Simple countdown timer for managing your time effectively with sound alerts and customizable presets.') ?></p>
                        <div class="tool-footer">
                            <span class="tool-tag"><?php echo __('Productivity') ?></span>
                        </div>
                    </a>

                    <a href="https://chronometer.toolz.at" class="tool-card" data-category="productivity">
                        <div class="tool-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <h3><?php echo __('Chronometer') ?></h3>
                        <p><?php echo __('Precise stopwatch with lap timing functionality for tracking elapsed time during activities or workouts.') ?></p>
                        <div class="tool-footer">
                            <span class="tool-tag"><?php echo __('Productivity') ?></span>
                        </div>
                    </a> -->

                    <a href="https://testedeteclado.toolz.at" class="tool-card" data-category="misc">
                        <div class="tool-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2" ry="2"></rect>
                                <path d="M6 8h.01"></path>
                                <path d="M10 8h.01"></path>
                                <path d="M14 8h.01"></path>
                                <path d="M18 8h.01"></path>
                                <path d="M6 12h.01"></path>
                                <path d="M10 12h.01"></path>
                                <path d="M14 12h.01"></path>
                                <path d="M18 12h.01"></path>
                                <path d="M6 16h.01"></path>
                                <path d="M10 16h.01"></path>
                                <path d="M14 16h.01"></path>
                                <path d="M18 16h.01"></path>
                            </svg>
                        </div>
                        <h3><?php echo __('Keyboard Test') ?></h3>
                        <p><?php echo __('Tool to test your keyboard functionality, with real-time key detection and typing speed measurement.') ?></p>
                        <div class="tool-footer">
                            <span class="tool-tag"><?php echo __('Miscellaneous') ?></span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="tool-suggestion">
            <div class="container">
                <h2><?php echo __("Can't find what you need?") ?></h2>
                <p><?php echo __('Have an idea for a useful tool? Let us know and we might build it!') ?></p>
                <a href="/contact" class="btn btn-primary"><?php echo __('Suggest a Tool') ?></a>
            </div>
        </section>
    </main>

<?php }); ?>

<?php $scriptsExtra = section(function () { ?>
    <script src="<?php echo asset('js/tools.js?v=0.8') ?>"></script>
<?php }); ?>


<?php include 'templates/main.php' ?>
