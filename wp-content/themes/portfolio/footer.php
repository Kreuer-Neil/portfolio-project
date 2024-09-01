<footer class="footer">
<nav class="footer-nav">
    <h2 class="footer-nav__title sro"><?= get_field('footer_nav_title') ?></h2>
    <p class="footer-nav__text"><?= get_field('footer_nav_text') ?><a href="#content" class="footer-nav__redirection"><?= get_field('footer_nav_link_label') ?></a></p>
    <ul class="footer-nav__container">
        <?php foreach(dw_get_navigation_links('footer') as $link): ?>
            <li class="footer-nav__element">
                <a href="<?= $link->url ?>" class="footer-nav__link<?php if($link->url === get_page_link()) echo ' footer-nav__link--active' ?>"><?= $link->label ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
</footer>
<?php wp_footer(); ?>
</body>
</html>