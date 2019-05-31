<?php
$plan = new Plan($post);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="gallery">
                    <?=$plan->displayGallery()?>
                </div>
                <div class="thumb-nav">
                    <?=$plan->displayThumbnails()?>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <h1><?=$plan->getTitle()?> plan</h1>
                <div class="description"><?=$plan->getContent()?></div>
                <ul class="specs">
                    <li>Length <?=$plan->getLength()?></li>
                    <li>Width <?=$plan->getWidth()?></li>
                    <li>Height <?=$plan->getHeight()?></li>
                </ul>
                <div class="price"><?=$plan->getPrice()?></div>
                <a href="<?=get_page_link(18)?>" class="btn btn-primary">Contact Us</a>
            </div>
        </div>
        <div class="row interior-layout-section">
            <div class="col-xl-12">
                <h2>Interior Layout</h2>
                <div class="layout-images">
                    <?=$plan->displayLayoutPlans()?>
                </div>
            </div>
        </div>
    </div>
</article>