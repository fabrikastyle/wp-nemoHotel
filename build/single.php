<?php get_header();

$long_image = get_field('long_image');
$long_image_url = get_field('long_image_url');
?>

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
    <? if( have_rows('block_post') ): ?>
      <? while ( have_rows('block_post') ) : the_row(); ?>
            

        <? if( get_row_layout() == 'block_post_text' ): ?>
        <div class="container">
            <?= the_sub_field('text_post'); ?>
        </div>

        <? elseif( get_row_layout() == 'iframe' ): ?>
        <div class="container iframe-wrapper">
          <iframe src="<?= the_sub_field('iframe_link'); ?>"  frameborder="0" ></iframe>
        </div>

        <? elseif( get_row_layout() == 'post_tabel' ): ?> 
        <div class="container">
          <?
            $table = get_sub_field( 'table_gen' );
            if($table):
          ?>
          <div class="table-wrapper">
            <table class="rwd-table">
                <? if($table['header']): ?>
                  <thead>
                    <tr>
                      <? foreach ( $table['header'] as $th ) : ?>
                        <th>
                            <?= $th['c']; ?>
                        </th>
                      <? endforeach; ?>
                    </tr>
                  </thead>
                <?endif; ?>
        
                <tbody>
                  <? foreach ( $table['body'] as $tr ) : ?>
                  
                    <tr>
                      <?
                      $count = 0; 
                        foreach ( $tr as $td ) : 
                      ?>
                        <td data-th="<?= $table['header'][$count]['c']; ?>" >
                        <?= $td['c']; ?>
                      </td>
                    <? 
                      $count++;
                      endforeach; 
                    ?>
                    </tr>
                  <? endforeach; ?>
                </tbody>
            </table>
            </div>
          <?endif; ?>
        </div>

        <? elseif( get_row_layout() == 'button_wrapper' ): ?>
        <div class="container btn-wrapper-resg">
          <a class="big-btn-reserv" href="<?= the_sub_field('button_link'); ?>"><?= the_sub_field('button_name'); ?></a>
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