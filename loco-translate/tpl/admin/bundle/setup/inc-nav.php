<?php
/**
 * Common links below variable setup header.
 */
        
    $help = esc_url( apply_filters('loco_external','https://localise.biz/wordpress/plugin/manual/bundle-setup') );

    if( $params->has('notices') ):?> 
    <ul class="problems"><?php
    foreach( $params->notices as $text ):?> 
        <li class="has-icon icon-remove">
            <?php echo $params->escape( $text )?> 
        </li><?php
    endforeach?> 
    </ul><?php
    endif?> 

    <p class="submit">
        <a href="<?php $tabs[2]->e('href')?>" class="button button-link has-icon icon-wrench"><?php esc_html_e('Advanced configuration','loco')?></a>
    </p>
    <p>
        <a href="<?php $tabs[1]->e('href')?>&amp;xml=1" class="button button-link has-icon icon-upload">Import config from XML</a>
    </p>
    <p>
        <a href="<?php $tabs[1]->e('href')?>&amp;json=1" class="button button-link has-icon icon-database">Check config repository</a>
    </p>
    <p>
        <a href="<?php echo $help?>" class="button button-link has-icon icon-help" target="_blank"><?php esc_html_e('Get help with this','loco')?></a>
    </p>
