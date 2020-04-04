<!--
    Template name: Nieuwsbrief
-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #fafafa;
            font-family: "Roboto", sans-serif;
        }

        h1 {
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            color: #403f92;
            margin-bottom: 6px;
            padding-bottom: 0px;
        }

        h2 {
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            color: #403f92;
            margin-top: 0px;
        }

        p {
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
            line-height: 28px;
            color: #828282;
            padding-top: 0px;
            margin-top: 0px;
        }

        a {
            color: #403f92;
            text-decoration: none;
        }

        a h2 {
            color: #403f92;
        }


        .btn {
            margin: 0px 0px 30px 0px;
            text-decoration: none;
            background: #33ab38;
            border-radius: 12px;
            padding: 14px 16px;
            font-style: normal;
            font-weight: bold;
            font-size: 16px;
            color: #ffffff !important;
            text-decoration: none;
            display: inline-block;
        }

        .btn-second {
            margin: 0px 0px 30px 0px;
            text-decoration: none;
            padding: 14px 16px;
            background: #ffffff;
            border: 1px solid rgba(51, 51, 51, 0.12);
            box-sizing: border-box;
            border-radius: 12px;
            font-style: normal;
            font-weight: bold;
            font-size: 16px;
            line-height: 16px;
            color: #545a63 !important;
            display: inline-block;
        }

        .main {
            max-width: 600px;
            width: 600px;
            margin: 0 auto;
            padding: 30px 0px
        }

        .branding {
            max-width: 182px;
        }

        .intro-nieuwsbrief {
            padding: 40px 0px 20px 0px;
            box-sizing: border-box;
            background-image: url(http://flexupdate9668.img-us3.com/admin/marian-heek.png);
            background-repeat: no-repeat;
            background-position: 95% bottom;
            background-size: 200px;
        }

        .intro-nieuwsbrief .tekst {
            max-width: 338px;
        }

        .nieuwsberichten {
            display: inline-block;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            box-sizing: border-box;
            border-radius: 24px;
        }

        .nieuwsberichten .nieuwsbericht {
            padding: 24px;
        }

        .nieuwsberichten .nieuwsbericht p {
            margin-bottom: 24px;
        }

        .nieuwsberichten .nieuwsbericht img {
            border-radius: 8px;
            max-width: 152px;
            max-height: 112px;
            float: left;
        }

        .nieuwsberichten .nieuwsbericht .inner {
            float: left;
            width: 380px;
            padding-left: 14px;
        }

        hr {
            width: 552px;
            height: 1px;
            border: none;
            background: #f2f2f2;
        }

        .vacatures-intro {
            text-align: center;
            margin-top: 40px;
        }

        .vacatures {
            padding: 24px;
            display: block;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            box-sizing: border-box;
            border-radius: 24px;
        }

        .vacatures a {
            padding-right: 24px;
            font-style: normal;
            font-weight: bold;
            font-size: 16px;
            line-height: 28px;
            color: #403f92;
            text-decoration: none;
            background-image: url(http://flexupdate9668.img-us3.com/admin/arrow.png_6e3e44b734fe752aff0000a5aa5b1e00.png);
            background-position: 100%;
            background-repeat: no-repeat;
        }

        .alle-vacatures {
            width: 100%;
            text-align: center;
            padding: 20px 0px;
        }

        .nubijflexupdate {
            text-align: center;
        }

        .cao {
            display: inline-table;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 24px !important;
            box-sizing: border-box;
            width: 100%;
        }

        .cao .intro {
            padding: 24px;
            text-align: center;
        }

        .cao .intro p {
            margin-bottom: 0px;
        }

        .cao .update {
            width: 50%;
            float: left;
            padding: 24px;
            box-sizing: border-box;
        }

        .cao .update h2 {
            margin-bottom: 0px;
        }

        .cao .update img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .afsluiting {
            background-color: #403f92;
            border-radius: 24px;
            padding: 40px 0px 20px 0px;
            box-sizing: border-box;
            background-image: url(http://flexupdate9668.img-us3.com/admin/marian-heek.png);
            background-repeat: no-repeat;
            background-position: 95% bottom;
            background-size: 200px;
            margin-top: 40px;
            padding: 24px 24px 0px 24px;
            box-sizing: border-box;
        }

        .afsluiting .tekst {
            max-width: 338px;
            padding: 10px 0px 24px 0px;
        }

        .afsluiting .tekst h2 {
            color: #ffffff;
            margin-bottom: 14px;
        }

        .afsluiting .tekst p {
            color: #ffffff;
            opacity: 0.8;
        }

        .afsluiting .tekst .btn {
            margin-bottom: 0px;
        }

        .socials {
            text-align: center;
        }

        .socials .social {
            text-align: center;
            margin: 40px 0px;
            padding: 0px;
            display: inline-block;
        }

        .socials .social li {
            float: left;
            list-style: none;
            margin: 5px;
            width: 54px;
        }
    </style>
</head>

<body>
    <div class="main"><img class="branding" src="http://flexupdate9668.img-us3.com/admin/logo_flexupdate.jpg">
        <!-- Intro tekst -->
        <?php if (have_rows('header')) : ?>
            <?php while (have_rows('header')) : the_row(); ?>
                <div class="intro-nieuwsbrief">
                    <div class="tekst">
                        <h1>Hey %FIRSTNAME%,</h1>
                        <p style="text-align: left;"><?php the_sub_field('intro_tekst'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <!-- Nieuwsberichten -->
        <?php $selecteer_updates = get_field('selecteer_updates'); ?>
        <?php if ($selecteer_updates) : ?>
            <div class="nieuwsberichten">
                <?php foreach ($selecteer_updates as $post) :  ?>
                    <?php setup_postdata($post); ?>
                    <?php
                    $terms = get_the_terms($post->ID, 'soort_item');
                    $termIDs = '_' . $terms[0]->term_id;
                    $postimage = get_the_post_thumbnail_url('', 'medium');
                    $bedrijfafbeelding = get_field('bedrijfafbeelding', '_' . $terms[0]->term_id); ?>
                    <?php print_r($bedrijfsafbeelding); ?>
                    <div class="nieuwsbericht"><img src="<?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $bedrijfafbeelding['url']; ?> <?php } ?>" width="268" height="168">
                        <?php $postlink = get_field('item_link'); ?>
                        <a href="<?php if ($postlink) { ?><?php echo ($postlink); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>" <?php if ($postlink) { ?>target="_blank" <?php } ?>>
                            <div class="inner">
                                <h2><?php the_title(); ?></h2>
                                <p><?php echo excerpt(13); ?></p>
                            </div>
                        </a>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>

        <!-- Laatste vacatures -->
        <?php if (have_rows('vacatures')) : ?>
            <?php while (have_rows('vacatures')) : the_row(); ?>
                <div class="vacatures-intro">
                    <h2><?php the_sub_field('titel'); ?></h2>
                    <p><?php the_sub_field('intro_tekst_vacatures'); ?></p>
                </div>
                <?php if (have_rows('maak_vacatures')) : ?>
                    <div class="vacatures">
                        <?php while (have_rows('maak_vacatures')) : the_row(); ?>
                            <?php $link = get_sub_field('link'); ?>
                            <?php if ($link) { ?>
                                <hr><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"> <?php the_sub_field('titel'); ?></a>
                            <?php } ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <div class="alle-vacatures">
                    <p><?php the_sub_field('outro_tekst'); ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- Nu bij Flexupdate -->
        <?php if (have_rows('call_to_action')) : ?>
            <?php while (have_rows('call_to_action')) : the_row(); ?>
                <div class="nubijflexupdate">
                    <h2><?php the_sub_field('titel'); ?></h2>
                    <p><?php the_sub_field('intro_tekst'); ?></p>
                    <?php if (have_rows('knoppen')) : ?>
                        <?php while (have_rows('knoppen')) : the_row(); ?>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                            <?php } ?>
                            <?php $knop_secondair = get_sub_field('knop_secondair'); ?>
                            <?php if ($knop_secondair) { ?>
                                <a class="btn-second" href="<?php echo $knop_secondair['url']; ?>" target="<?php echo $knop_secondair['target']; ?>"><?php echo $knop_secondair['title']; ?></a>
                            <?php } ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- CAO Updates -->
        <?php if (have_rows('updates')) : ?>
            <?php while (have_rows('updates')) : the_row(); ?>
                <div class="cao">
                    <div class="intro">
                        <h2><?php the_sub_field('titel'); ?></h2>
                        <p><?php the_sub_field('intro_tekst'); ?></p>
                    </div>
                    <?php $items = get_sub_field('items'); ?>
                    <?php if ($items) : ?>
                        <?php foreach ($items as $post) :  ?>
                            <?php setup_postdata($post); ?>
                            <div class="update"><img src="https://assets.zoom.nl/thumbnails/748x748/e/6/e68140149f92a686df805f2e8c814d12.jpg">
                                <div class="inner">
                                    <h2><a href="<?php the_field('link_update'); ?>"><?php the_title(); ?></a></h2>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php if (have_rows('footer')) : ?>
            <?php while (have_rows('footer')) : the_row(); ?>
                <div class="afsluiting">
                    <div class="tekst">
                        <h2><?php the_sub_field('titel'); ?></h2>
                        <p><?php the_sub_field('tekst'); ?></p>
                        <?php $call_to_action = get_sub_field('call_to_action'); ?>
                        <?php if ($call_to_action) { ?>
                            <a class="btn" href="<?php echo $call_to_action['url']; ?>" target="<?php echo $call_to_action['target']; ?>"><?php echo $call_to_action['title']; ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- Socials -->
        <?php if (have_rows('socials_nieuwsbrief')) : ?>
            <div class="socials">
                <ul class="social">
                    <?php while (have_rows('socials_nieuwsbrief')) : the_row(); ?>
                        <?php $facebook = get_sub_field('facebook'); ?>
                        <?php if ($facebook) { ?>
                            <li><a href="<?php echo $facebook['url']; ?>" target="<?php echo $facebook['target']; ?>"><?php echo $facebook['title']; ?><img src="http://flexupdate9668.img-us3.com/admin/facebook.png"></a></li>
                        <?php } ?>
                        <?php $linkedin = get_sub_field('linkedin'); ?>
                        <?php if ($linkedin) { ?>
                            <li><a href="<?php echo $linkedin['url']; ?>" target="<?php echo $linkedin['target']; ?>"><?php echo $linkedin['title']; ?><img src="http://flexupdate9668.img-us3.com/admin/linkedin.png"></a></li>
                        <?php } ?>
                        <?php $twitter = get_sub_field('twitter'); ?>
                        <?php if ($twitter) { ?>
                            <li><a href="<?php echo $twitter['url']; ?>" target="<?php echo $twitter['target']; ?>"><?php echo $twitter['title']; ?><img src="http://flexupdate9668.img-us3.com/admin/twitter.png"></a></li>
                        <?php } ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>