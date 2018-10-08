<?php

/**
 * Adds Foo_Widget widget.
 */
class Esdarat_Widget extends WP_Widget

{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'Esdarat', // Base ID
            __('سلايدر جديد الاصدارات', 'text_domain'), // Name
            array('description' => __('احدث الاصدارات', 'text_domain'),) // Args
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
            ?>
            <h2 class="black-title">
                <?php echo apply_filters('widget_title', $instance['title']); ?>
            </h2>
        <?php
        }
        //Widget Body
        if (!empty($instance['number'])) {
            $count = $instance['number'];
        } else {
            $count = null;
        }
        if (!empty($instance['section'])){
            $post_type_name = $instance['section'];
        }
        else {
            $post_type_name = null;
        }
        if (file_exists(get_template_directory() . '/js/owl.carousel.js')) {
            //widget carousel output
            ?>
            <div id="minislider" dir="ltr">
                <?php
                $query_args = array(
                    'post_type' => $post_type_name,
                    'posts_per_page' => $count
                );
                $query = new WP_Query($query_args);
                while ($query->have_posts()):$query->the_post();
                    if (has_post_thumbnail()):
                        ?>
                        <div class="item">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail('owl_pics', array('class' => 'img-responsive')); ?>
                            </a>
                        </div>
                    <?php
                    endif;
                endwhile;
                ?>
            </div>
        <?php
        } else {
            echo '<p class="no-result" dir="ltr">"owl.carousel.js" is not found in your theme directory /js/ . please put the file into
 js folder to run the widget</p>';
        }
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
        if (file_exists(get_template_directory() . '/js/owl.carousel.js')) {
            $title = !empty($instance['title']) ? $instance['title'] : null;
            $number = !empty($instance['number']) ? $instance['number'] : null;
            $selected = !empty($instance['section']) ? $instance['section'] : null;
            ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                       name="<?php echo $this->get_field_name('title'); ?>" type="text"
                       value="<?php echo esc_attr($title); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('section'); ?>">
                    <?php _e('اختر القسم لعرض مواضيعه فى السلايدر'); ?>
                </label>
                <select name="<?php echo $this->get_field_name('section'); ?>"
                        id="<?php echo $this->get_field_id('section'); ?>"">
                <?php $sections = get_post_types('', 'names');
                foreach ($sections as $section):
                    ?>
                    <option <?php if ($selected == $section) echo 'selected'; ?>
                        value="<?php echo $section ?>"><?php echo
                        $section
                        ?></option>
                <?php endforeach; ?>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('عدد الشرائح : '); ?></label>
                <input id="<?php echo $this->get_field_id('number'); ?>"
                       name="<?php echo $this->get_field_name('number'); ?>" type="text"
                       value="<?php echo esc_attr($number); ?>" size="3">
            </p>
        <?php
        } else {
            echo '<p dir="ltr"> owl.carousel.js is not found in your theme directory /js/ . please put the file into js folder to run
the widget </p>';
        }

        ?>

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
        $instance['section'] = (!empty($new_instance['section'])) ? strip_tags($new_instance['section']) : '';
        return $instance;
    }
}


// register Foo_Widget widget
function register_Esdarat_Widget()
{
    register_widget('Esdarat_Widget');
}

add_action('widgets_init', 'register_Esdarat_Widget');