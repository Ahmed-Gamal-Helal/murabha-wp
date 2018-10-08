<?php

/**
 * Adds Foo_Widget widget.
 */
class Meetings_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'meetings', // Base ID
            __('الملتقيات و المهرجانات', 'text_domain'), // Name
            array('description' => __('عرض الملتقيات و المهرجانات', 'text_domain'),) // Args
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
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        //Widget Body
        if (!empty($instance['number'])) {
            $count = $instance['number'];
        } else {
            $count = null;
        }
        $query_args = array(
            'post_type' => 'meetings',
            'posts_per_page' => $count
        );
        $query = new WP_Query($query_args);
        while ($query->have_posts()):$query->the_post();
            ?>
            <div class="meeting">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </div>
        <?php
        endwhile;
        ?>

        <?php

        echo $args['after_widget'];
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
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('عدد الملتقيات و المهرجانات : ');
                ?></label>
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
function register_Meetings_Widget()
{
    register_widget('Meetings_Widget');
}

add_action('widgets_init', 'register_Meetings_Widget');