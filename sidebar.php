<?php 
/**
 * Widgetized Sidebar Template
 *
 * This sidebar template comes in the standard installation of Charlene, an alternate
 * sidebar-standard.php is included but not typically needed.
 *
 * @package Charlene
 * @subpackage Template
 */
?>
<!--Start secondary-->

   <?php if ( is_active_sidebar ( 'sidebar-main' ) ) : ?>
             
      <aside class="sidebar-secondary widget-area col_2 push_4" role="complimentary">
         <?php dynamic_sidebar('sidebar-main'); ?>
      </aside>
   
   <?php endif; ?> 
