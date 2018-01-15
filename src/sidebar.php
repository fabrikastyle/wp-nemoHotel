<?
// custom field vars

$btn_reserve = get_field('btn_reserve', 'option');
$btn_reserve_url = get_field('btn_reserve_url', 'option');
$btn_menu_nav = get_field('btn_menu_nav', 'option');
$adress_phone = get_field('adress_phone', 'option');
$adress_location = get_field('adress_location', 'option');
$city_od = get_field('city_od', 'option');
$city_har = get_field('city_har', 'option');

?>
<div id="btn-nav">

    <div class="nav-section-left">
      <div id="left-logo" class="slideNavM">
        <div>
          <svg version="1.1" id="burger-nav" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
            y="0px" viewBox="0 0 18 16" style="enable-background:new 0 0 18 16;" xml:space="preserve">
            <path class="b-nav" d="M17.3,7.3H0.7C0.3,7.3,0,7,0,6.6L0,5c0-0.4,0.3-0.7,0.7-0.7h16.6C17.7,4.3,18,4.6,18,5v1.7
            C18,7,17.7,7.3,17.3,7.3z" />
            <path class="st0" d="M17.3,3H0.7C0.3,3,0,2.7,0,2.4l0-1.7C0,0.3,0.3,0,0.7,0l16.6,0C17.7,0,18,0.3,18,0.7v1.7C18,2.7,17.7,3,17.3,3z
            " />
            <path class="b-nav" d="M17.3,11.6H0.7c-0.4,0-0.7-0.3-0.7-0.7l0-1.7c0-0.4,0.3-0.7,0.7-0.7h16.6c0.4,0,0.7,0.3,0.7,0.7v1.7
            C18,11.3,17.7,11.6,17.3,11.6z" />
            <path class="b-nav" d="M17.3,15.9H0.7c-0.4,0-0.7-0.3-0.7-0.7l0-1.7c0-0.4,0.3-0.7,0.7-0.7h16.6c0.4,0,0.7,0.3,0.7,0.7v1.7
            C18,15.6,17.7,15.9,17.3,15.9z" />
          </svg>
          <br>
          <span>
            <? if (!empty($btn_menu)): ?> 
                <?= $btn_menu; ?>
            <? endif; ?>
          </span>
        </div>
      </div>

      <?php if(!is_front_page() || is_paged()) : ?>
        <a class="right-logo slideNavM" href="<?= get_home_url(); ?>">
          <img class="text-logo" src="<?= get_template_directory_uri() ?>/svg/top-logo-hotel.svg" alt="resort & spa with dolphins">
        </a>
        <?php else :?>
        <div class="right-logo slideNavM" >
          <img class="text-logo" src="<?= get_template_directory_uri() ?>/svg/top-logo-hotel.svg" alt="resort & spa with dolphins">
        </div>
      <? endif; ?>

      <div class="desc-view slideNavM">
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
        <div class=" bottom-right-nav">
          <div class="map-icons-nav">
            <img src="<?= get_template_directory_uri() ?>/svg/map-icons.svg" alt="location Nemo Hotel">
          </div>
          <div class="nav-phone">
            <p>
              <? if (!empty($adress_phone)): ?> 
              <a href="tel:<?= $adress_phone; ?>" class="binct-phone-number-1">
                <?= $adress_phone; ?>
              </a>
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

    </div>

    <div class="nav-section-right">
    
      <a id="btn-reservation" class="slideNavM" href="<?= $btn_reserve_url; ?>">
      <? /*
      <div class="cap-ny">
        <img src="<?= get_template_directory_uri() ?>/images/cap2.png">
      </div>
      */ ?>
      <? if (!empty($btn_reserve)): ?> 
          <?= $btn_reserve; ?>
        <? endif; ?>
      </a>
      <div id="select-lang" class="slideNavM">
        <?php pll_the_languages(array('dropdown'=>1));  ?>
      </div>
    </div>
  </div>
  
  <? get_template_part( 'nav' ); ?>
