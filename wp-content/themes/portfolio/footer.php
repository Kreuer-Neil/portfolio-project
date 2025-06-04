</main>
<footer class="footer">

    <nav class="footer__nav footer__nav--lang">
        <h2 class="footer__nav__title sro"><?= pll__('Language selector') ?></h2>
        <?php if ($footNavLinks = dw_get_navigation_links('lang')) ?>
        <ul class="footer__nav__container">
            <?php foreach ($footNavLinks as $footNavLink): ?>
                <li class="footer__nav__li">
                    <a href="<?= $footNavLink->url ?>" class="footer__nav__link"><?= $footNavLink->label ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <nav class="footer__nav">
        <h2 class="footer__nav__title sro"><?= pll__('Footer navigation') ?></h2>
        <?php if ($footNavLinks = dw_get_navigation_links('footer')) ?>
        <ul class="footer__nav__container">
            <?php foreach ($footNavLinks as $footNavLink): ?>
                <li class="footer__nav__li">
                    <a href="<?= $footNavLink->url ?>" class="footer__nav__link"><?= $footNavLink->label ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php wp_footer(); ?>
</footer>
</body>
</html>
