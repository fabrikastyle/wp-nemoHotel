<?
// custom field vars

$btn_reserve = get_field('btn_reserve', 'option');
$btn_menu_nav = get_field('btn_menu_nav', 'option');
$adress_phone = get_field('adress_phone', 'option');
$adress_location = get_field('adress_location', 'option');
$city_od = get_field('city_od', 'option');
$city_har = get_field('city_har', 'option');

?>

<div id="section-navbar" class="overlay">
  <div class="wrapper-navbar">

    <div id="close-nav-btn">
      &times;
    </div>

    <ul class="overlay-content">
        <?php
          wp_nav_menu(array(
              'theme_location' => 'maineMenu',
              'container' => '',
              'walker' => '',
              'items_wrap' => '%3$s',
              'link_before'     => '<div>',
              'link_after'      => '</div>', 
              'fallback_cb' => ''));
        ?>

      <div class="mob-view contacts-nav slideNavM">
        <div class="city-select">
          <div class="city-select-active">
            <span>
              <? if (!empty($city_od)): ?> 
                <?= $city_od; ?>
              <? endif; ?>
            </span>
            <div class="arrow-city-select">&#9660;</div>
          </div>
          <div class="city-select-switcher">
            <a href="http://kharkov.nemohotels.com" target="_blank" rel="nofollow">
              <? if (!empty($city_har)): ?> 
                <?= $city_har; ?>
              <? endif; ?>
            </a>
          </div>
        </div>

        <div class="bottom-right-nav">
          <div class="map-icons-nav">
            <img src="<?= get_template_directory_uri() ?>/svg/map-icons.svg" alt="location Nemo Hotel">
          </div>
          <div class="nav-phone">
            <p>
              <? if (!empty($adress_phone)): ?> 
                <?= $adress_phone; ?>
              <? endif; ?>
            </p>
            <span>
              <? if (!empty($adress_location)): ?> 
                <?= $adress_location; ?>
              <? endif; ?>
            </span>
          </div>
        </div>

      </div>
    </ul>
  </div>
</div>