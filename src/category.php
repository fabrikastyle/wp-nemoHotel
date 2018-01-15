<?php

get_header(); 

$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 

$long_image = get_field('long_image', $taxonomy . '_' . $term_id);
$long_image_url = get_field('long_image_url', $taxonomy . '_' . $term_id);
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
      <?php 
      if( is_category() ){
        echo get_queried_object()->name;
      };
      ?>
    </h1>
    <div>
      <?= category_description();  ?>
    </div>
  </div>

  <div class="container">
      <?
       
        $table = get_field('table_gen', $taxonomy . '_' . $term_id);
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
  
  <div class="container-fluid category-sell">
 
    <?php wp_reset_query(); ?>
    <?php
    $i = 1;
    $cat = get_query_var('cat');
    $categories = get_categories('parent=' . $cat . '');
    foreach ($categories as $category) {
        $i++;
    }
    if ($i > 1) :
      foreach ($categories as $category) : 
        $queried_object = get_queried_object(); 
        $taxonomy = $queried_object->taxonomy;
        $thumb_cat = get_field('thumb_cat', $taxonomy . '_' . $category->term_id);
      ?>

      <div class="col-lg-4 col-md-4 col-xs-12">
        <div class="project">
          <div class="project__card">
            <div class="project__detail">
                <span class="project__title">
                  <a href="<?= get_category_link($category->term_id); ?>">
                    <?= $category->name; ?>
                  </a>
                </span>
            </div>
            <a href="<?= get_category_link($category->term_id); ?>" class="project__image">
                <img src="<?= $thumb_cat; ?>"  alt="<?= $category->name; ?>">
            </a>
          </div>
        </div>
      </div>

    <?php 
      endforeach;
    endif; 
    ?>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="project">
                <div class="project__card">
                    <div class="project__detail">
                        <span class="project__title">
                          <a href="<?php the_permalink(); ?>">
                            <? the_title(); ?>
                          </a>
                        </span>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="project__image">
                      <?php the_post_thumbnail('cat-thumb', array('title' => '' . get_the_title() . '')); ?>
                    </a>
                </div>
              </div>
            </div>
      <?php endwhile; ?>
      <?php endif; ?>
  </div>


  <? $category_gallery = get_field('category_gallery', $taxonomy . '_' . $term_id); ?>

  <? if(!empty($category_gallery)): ?> 
    <section class="inner-page-slider inner-page-slider-nav">
      <?php foreach( $category_gallery as $image ): ?>
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
    
    
</div>
<?php get_footer(); ?>