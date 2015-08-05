<div class="wrap">
    <h2><?php esc_html_e( FPI_NAME ); ?> Settings</h2>

    <p>This plugin will import Facebook news feeds into Wordpress as Posts.</p>
    <p>To continue, click the Import button to continue.</p>

    <form method="post" action="options.php">
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button-primary" value="<?php esc_attr_e('Import'); ?>" />
        </p>
    </form>
</div>
