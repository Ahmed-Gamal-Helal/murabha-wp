<?php

/**
 * Adds Foo_Widget widget.
 */
class Popular_Posts_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'popular_posts', // Base ID
            __('المواضيع الساخنة', 'text_domain'), // Name
            array('description' => __('اشهر المواضيع من كل الاقسام', 'text_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        if (!empty($instance['title'])) { ?>
            <h2 class="popular_posts_title">
                <?php echo apply_filters('widget_title', $instance['title']); ?>
            </h2>
        <?php }
        //Widget Body
        if (!empty($instance['number'])) {
            $count = $instance['number'];
        } else {
            $count = null;
        }


        ?>

        <div class="popular_posts_widget">
            <?php
            $query_args = array(
                'post_type' => 'post',
                'meta_key' => 'post_views_count',
                'orderby' => 'meta_value_num',
                'posts_per_page' => $count
            );
            $query = new WP_Query($query_args);
            while ($query->have_posts()):$query->the_post();
                ?>
                <div class="left_posts">
                    <div class="left_thumb">
                        <?php the_post_thumbnail('left_news', array('class' => 'img-responsive')); ?>
                    </div>
                    <div class="left_title">
                        <a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(),5,'...')
                            ?></a>

                        <p><i class="fa fa-clock-o"></i>
                            اضيف فى :
                            <?php the_time('d M Y'); ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
        <?php
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     *
     * @return html form
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : null;
        $number = !empty($instance['number']) ? $instance['number'] : null;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('عدد المقالات : '); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>"
                   name="<?php echo $this->get_field_name('number'); ?>" type="text"
                   value="<?php echo esc_attr($number); ?>" size="3">
        </p>
    <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';


        $instance['number'] = (!empty($new_instance['number'])) ? strip_tags($new_instance['number']) : '';

        return $instance;
    }
}

// class Foo_Widget
// register Foo_Widget widget
function register_Popular_Posts_Widget()
{
    register_widget('Popular_Posts_Widget');
}

add_action('widgets_init', 'register_Popular_Posts_Widget');