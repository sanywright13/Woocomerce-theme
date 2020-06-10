<?php get_header();?>



<?php $wp_query; // the main query of the template

$query=New WP_Query(array('post_type'=>'product','posts_per_page'=>'3')); // costume query
//we want to make a costume query by order by here we don't have an ordr by query var we need to add it
var_dump($query->query_vars);
var_dump($wp_query->query_vars);
test_main($query);
test_main($wp_query);
function test_main($query){
  if($query->is_main_query()){
    echo '  this is main query';
  }
  else{
    echo ' this is current query not main';
  }
}
if(have_posts()){
    while(have_posts()){
       the_post();?>
     <div>  <?php echo the_title();?></div>
     <?php
    }
}

?>

<?php get_footer();?>