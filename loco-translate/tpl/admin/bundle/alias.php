<?php
/**
 * Special case for viewing Hello Dolly plugin
 * TODO implement package aliasing in a generic fashion as part of bundle configuration.
 */
$this->extend('../layout');
?> 
    
    <div class="notice inline notice-info">
        <h3 class="has-icon">
            <?php esc_attr_e('"Hello Dolly" is part of the WordPress core','loco')?> 
        </h3>
        <p>
            This plugin doesn't have its own translations, but its metadata fields are translatable in the 
            <a href="<?php $params->e('redirect')?>">admin bundle</a>.
        </p>
    </div>