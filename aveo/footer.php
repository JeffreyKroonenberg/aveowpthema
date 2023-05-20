    </div>
    <?php $copyrights = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('copyrights') : '';
    if( !empty( $copyrights ) ) :
    ?>
    <footer>
        <div class="copyrights"><?php echo wp_kses_post($copyrights) ?></div>
    </footer>
    <?php endif ?>
	<?php
		wp_footer();
	?>
</body>
</html>