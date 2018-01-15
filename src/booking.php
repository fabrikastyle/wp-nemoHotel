<?php 
/* Template Name: booking */
get_header();
$long_image = get_field('long_image');
$long_image_url = get_field('long_image_url');
?>

<!-- start booking form 2.0 -->
<script type="text/javascript">

function bookingStepChanged(data) {
    switch (data.step) {
        case 'search':
        case 'preview':
        case 'payment':
        case 'complete':
            break;
        default:
            return;
    }
    ga('send', 'pageview', '/' + data.step);
};

function bookingSuccess(data) {
 var label = data.bookingNumber + ' - ' + data.price + ' ' + data.currency;
 ga('send', 'event', 'complete', 'book', label);
 ga('ecommerce:addTransaction', {
    'id': data.bookingNumber,
    'affiliation': data.providerName,
    'currency': data.currency,
    'revenue': data.price
 });
 ga('ecommerce:send');
};
 
(function(w){
  var q=[
    <? if (get_locale() == 'de_DE'): ?>
      ['setContext', 'TL-INT-nemo', 'de'],
    <? elseif(get_locale() == 'en_US'): ?>
      ['setContext', 'TL-INT-nemo', 'en'],
    <?else:?>
      ['setContext', 'TL-INT-nemo', 'ru'],
    <? endif; ?>
    ['embed', 'booking-form', {container: 'tl-booking-form', onBookingStepChanged: bookingStepChanged, onBookingSuccess: bookingSuccess}]
  ];
  var t=w.travelline=(w.travelline||{}),ti=t.integration=(t.integration||{});ti.__cq=ti.__cq?ti.__cq.concat(q):q;
  if (!ti.__loader){ti.__loader=true;var d=w.document,p=d.location.protocol,s=d.createElement('script');s.type='text/javascript';s.async=true;s.src=(p=='https:'?p:'http:')+'//ibe.tlintegration.com/integration/loader.js';(d.getElementsByTagName('head')[0]||d.getElementsByTagName('body')[0]).appendChild(s);}
})(window);
</script>
<!-- end booking form 2.0 -->
<? if(!empty($long_image)): ?>

  <? if(!empty($long_image_url)): ?>
      <a href="<?= $long_image_url; ?>" class="head-slider">
    <? else: ?>
      <div class="head-slider">
    <? endif; ?>
        <img src="<?= $long_image; ?>" 
            alt="
            <?php 
              if( is_category() ){
                echo get_queried_object()->name;
              };
            ?>
            ">
    <? if(!empty($long_image_url)): ?> 
      </a>
    <? else: ?>
      </div>
  <? endif; ?>
<? endif; ?>

<div class="page-template">
  <div class="container">
    <h1>
      <? the_title(); ?>
    </h1>
  </div>
  <div class="container">
    <div id="tl-booking-form"></div>
    <br>
    <br>
  </div>
  <? if( have_rows('block_page') ): ?>
    <? while ( have_rows('block_page') ) : the_row(); ?>
          

      <? if( get_row_layout() == 'block_post_text' ): ?>
        <div class="container">
            <?= the_sub_field('text_post'); ?>
        </div>

      <? elseif( get_row_layout() == 'post_gallery' ): ?>
        
          <? $inner_post_gallery = get_sub_field('inner_post_gallery');  ?>
          
            <section class="inner-page-slider inner-page-slider-nav">
              <?php foreach( $inner_post_gallery as $image ): ?>
                <a class="inner-slider-item-wrapper option" href="<?= $image['url']; ?>" data-fancybox="images">
                  <div class="item-card">
                    <span class="inner-slider-item" >
                        <img src="<?= $image['sizes']['cat-thumb-gallery']; ?>" alt="<?= $image['alt']; ?>" />
                    </span>
                  </div>
                </a>
              <?php endforeach; ?>
              <div class="buttons-nav-slider">
                <div class="nav-slider-left">
                  <svg version="1.1" id="arrow-priv" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                    y="0px" viewBox="0 0 28 49.4" style="enable-background:new 0 0 28 49.4;" xml:space="preserve">
                    <g>
                      <path class="arrow-slider" d="M3,48.3l-1.1-1.1l22.6-22.6L1.9,1.9L3,0.8l23.8,23.8L3,48.3z M3,48.3"></path>
                    </g>
                    </svg>
                </div>
                <div class="nav-slider-right">
                  <svg version="1.1" id="arrow-next" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                    y="0px" viewBox="0 0 28 49.4" style="enable-background:new 0 0 28 49.4;" xml:space="preserve">
                    <g>
                      <path class="arrow-slider" d="M3,48.3l-1.1-1.1l22.6-22.6L1.9,1.9L3,0.8l23.8,23.8L3,48.3z M3,48.3"></path>
                    </g>
                  </svg>
                </div>
              </div>
            </section>
      <? endif; ?>
      
    <? endwhile; ?>
  <? endif; ?>

</div>

<?php get_footer(); ?>