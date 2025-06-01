</main>

<nav class="footer__nav">
    <h2 class="footer__nav__title sro">Navigation de pied de page</h2>
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
</body>
</html>