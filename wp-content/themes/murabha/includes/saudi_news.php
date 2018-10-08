<?php
// class Foo_Widget
// register Foo_Widget widget
function register_Saudi_news_Widget()
{
    register_widget('Saudi_news_Widget');
}

add_action('widgets_init', 'register_Saudi_news_Widget');
/**
 * Adds Foo_Widget widget.
 */
class Saudi_news_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'soudi_news', // Base ID
            __('الصحف السعودية', 'text_domain'), // Name
            array('description' => __('الاخبار من الصحف السعودية', 'text_domain'),) // Args
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
        ?>
        <ul>
            <?php
            //Club 1
            if (!empty($instance['club1']) && !empty($instance['link1'])): ?>
                <li>
                    <a href="<?php echo $instance['link1']; ?>" title="<?php echo $instance['club1']; ?>" target="_blank">
                        <?php echo $instance['club1']; ?>
                    </a>
                </li>
            <?php
            endif;
            //Club 2
            if (!empty($instance['club2']) && !empty($instance['link2'])):
                ?>
                <li>
                    <a href="<?php echo $instance['link2']; ?>" title="<?php echo $instance['club2']; ?>" target="_blank">
                        <?php echo $instance['club2']; ?>
                    </a>
                </li>
            <?php
            endif;
            //Club 3
            if (!empty($instance['club3']) && !empty($instance['link3'])):
                ?>
                <li>
                    <a href="<?php echo $instance['link3']; ?>" title="<?php echo $instance['club3']; ?>" target="_blank">
                        <?php echo $instance['club3']; ?>
                    </a>
                </li>
            <?php
            endif;
            //Club 4
            if (!empty($instance['club4']) && !empty($instance['link4'])):
                ?>
                <li>
                    <a href="<?php echo $instance['link4']; ?>" title="<?php echo $instance['club4']; ?>" target="_blank">
                        <?php echo $instance['club4']; ?>
                    </a>
                </li>
            <?php
            endif;
            //Club 5
            if (!empty($instance['club5']) && !empty($instance['link5'])):
                ?>
                <li>
                    <a href="<?php echo $instance['link5']; ?>" title="<?php echo $instance['club5']; ?>" target="_blank">
                        <?php echo $instance['club5']; ?>
                    </a>
                </li>
            <?php
            endif;
            //Club 6
            if (!empty($instance['club6']) && !empty($instance['link6'])):
                ?>
                <li>
                    <a href="<?php echo $instance['link6']; ?>" title="<?php echo $instance['club6']; ?>" target="_blank">
                        <?php echo $instance['club6']; ?>
                    </a>
                </li>
            <?php
            endif;
            //Club 7
            if (!empty($instance['club7']) && !empty($instance['link7'])):
                ?>
                <li>
                    <a href="<?php echo $instance['link7']; ?>" title="<?php echo $instance['club7']; ?>" target="_blank">
                        <?php echo $instance['club7']; ?>
                    </a>
                </li>
            <?php
            endif;
            //Club 8
            if (!empty($instance['club8']) && !empty($instance['link8'])):
                ?>
                <li>
                    <a href="<?php echo $instance['link8']; ?>" title="<?php echo $instance['club8']; ?>" target="_blank">
                        <?php echo $instance['club8']; ?>
                    </a>
                </li>
            <?php
            endif;
            ?>
        </ul>
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

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <?php
            //Club 1
            $club1 = !empty($instance['club1']) ? $instance['club1'] : null;
            $link1 = !empty($instance['link1']) ? $instance['link1'] : null;
            ?>
            <label for="<?php echo $this->get_field_id('club1'); ?>"><?php _e('الخبر 1'); ?></label>
            <input id="<?php echo $this->get_field_id('club1'); ?>"
                   name="<?php echo $this->get_field_name('club1'); ?>" type="text"
                   value="<?php echo esc_attr($club1); ?>"><br>
            <label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('الرابط'); ?></label>
            <input id="<?php echo $this->get_field_id('link1'); ?>"
                   name="<?php echo $this->get_field_name('link1'); ?>" type="text"
                   value="<?php echo esc_attr($link1); ?>">
        </p>
        <p>
            <?php
            //Club 2
            $club2 = !empty($instance['club2']) ? $instance['club2'] : null;
            $link2 = !empty($instance['link2']) ? $instance['link2'] : null;
            ?>
            <label for="<?php echo $this->get_field_id('club2'); ?>"><?php _e('الخبر 2'); ?></label>
            <input id="<?php echo $this->get_field_id('club2'); ?>"
                   name="<?php echo $this->get_field_name('club2'); ?>" type="text"
                   value="<?php echo esc_attr($club2); ?>"><br>
            <label for="<?php echo $this->get_field_id('link2'); ?>"><?php _e('الرابط'); ?></label>
            <input id="<?php echo $this->get_field_id('link2'); ?>"
                   name="<?php echo $this->get_field_name('link2'); ?>" type="text"
                   value="<?php echo esc_attr($link2); ?>">
        </p>
        <p>
            <?php
            //Club 3
            $club3 = !empty($instance['club3']) ? $instance['club3'] : null;
            $link3 = !empty($instance['link3']) ? $instance['link3'] : null;
            ?>
            <label for="<?php echo $this->get_field_id('club3'); ?>"><?php _e('الخبر 3'); ?></label>
            <input id="<?php echo $this->get_field_id('club3'); ?>"
                   name="<?php echo $this->get_field_name('club3'); ?>" type="text"
                   value="<?php echo esc_attr($club3); ?>"><br>
            <label for="<?php echo $this->get_field_id('link3'); ?>"><?php _e('الرابط'); ?></label>
            <input id="<?php echo $this->get_field_id('link3'); ?>"
                   name="<?php echo $this->get_field_name('link3'); ?>" type="text"
                   value="<?php echo esc_attr($link3); ?>">
        </p>
        <p>
            <?php
            //Club 4
            $club4 = !empty($instance['club4']) ? $instance['club4'] : null;
            $link4 = !empty($instance['link4']) ? $instance['link4'] : null;
            ?>
            <label for="<?php echo $this->get_field_id('club4'); ?>"><?php _e('الخبر 4'); ?></label>
            <input id="<?php echo $this->get_field_id('club4'); ?>"
                   name="<?php echo $this->get_field_name('club4'); ?>" type="text"
                   value="<?php echo esc_attr($club4); ?>"><br>
            <label for="<?php echo $this->get_field_id('link4'); ?>"><?php _e('الرابط'); ?></label>
            <input id="<?php echo $this->get_field_id('link4'); ?>"
                   name="<?php echo $this->get_field_name('link4'); ?>" type="text"
                   value="<?php echo esc_attr($link4); ?>">
        </p>
        <p>
            <?php
            //Club 5
            $club5 = !empty($instance['club5']) ? $instance['club5'] : null;
            $link5 = !empty($instance['link5']) ? $instance['link5'] : null;
            ?>
            <label for="<?php echo $this->get_field_id('club5'); ?>"><?php _e('الخبر 5'); ?></label>
            <input id="<?php echo $this->get_field_id('club5'); ?>"
                   name="<?php echo $this->get_field_name('club5'); ?>" type="text"
                   value="<?php echo esc_attr($club5); ?>"><br>
            <label for="<?php echo $this->get_field_id('link5'); ?>"><?php _e('الرابط'); ?></label>
            <input id="<?php echo $this->get_field_id('link5'); ?>"
                   name="<?php echo $this->get_field_name('link5'); ?>" type="text"
                   value="<?php echo esc_attr($link5); ?>">
        </p>
        <p>
            <?php
            //Club 6
            $club6 = !empty($instance['club6']) ? $instance['club6'] : null;
            $link6 = !empty($instance['link6']) ? $instance['link6'] : null;
            ?>
            <label for="<?php echo $this->get_field_id('club6'); ?>"><?php _e('الخبر 6'); ?></label>
            <input id="<?php echo $this->get_field_id('club6'); ?>"
                   name="<?php echo $this->get_field_name('club6'); ?>" type="text"
                   value="<?php echo esc_attr($club6); ?>"><br>
            <label for="<?php echo $this->get_field_id('link6'); ?>"><?php _e('الرابط'); ?></label>
            <input id="<?php echo $this->get_field_id('link6'); ?>"
                   name="<?php echo $this->get_field_name('link6'); ?>" type="text"
                   value="<?php echo esc_attr($link6); ?>">
        </p>
        <p>
            <?php
            //Club 7
            $club7 = !empty($instance['club7']) ? $instance['club7'] : null;
            $link7 = !empty($instance['link7']) ? $instance['link7'] : null;
            ?>
            <label for="<?php echo $this->get_field_id('club7'); ?>"><?php _e('الخبر 7'); ?></label>
            <input id="<?php echo $this->get_field_id('club7'); ?>"
                   name="<?php echo $this->get_field_name('club7'); ?>" type="text"
                   value="<?php echo esc_attr($club7); ?>"><br>
            <label for="<?php echo $this->get_field_id('link7'); ?>"><?php _e('الرابط'); ?></label>
            <input id="<?php echo $this->get_field_id('link7'); ?>"
                   name="<?php echo $this->get_field_name('link7'); ?>" type="text"
                   value="<?php echo esc_attr($link7); ?>">
        </p>
        <p>
            <?php
            //Club 8
            $club8 = !empty($instance['club8']) ? $instance['club8'] : null;
            $link8 = !empty($instance['link8']) ? $instance['link8'] : null;
            ?>
            <label for="<?php echo $this->get_field_id('club8'); ?>"><?php _e('الخبر 8'); ?></label>
            <input id="<?php echo $this->get_field_id('club8'); ?>"
                   name="<?php echo $this->get_field_name('club8'); ?>" type="text"
                   value="<?php echo esc_attr($club8); ?>"><br>
            <label for="<?php echo $this->get_field_id('link8'); ?>"><?php _e('الرابط'); ?></label>
            <input id="<?php echo $this->get_field_id('link8'); ?>"
                   name="<?php echo $this->get_field_name('link8'); ?>" type="text"
                   value="<?php echo esc_attr($link8); ?>">
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

        //Club1
        $instance['club1'] = (!empty($new_instance['club1'])) ? strip_tags($new_instance['club1']) : '';
        $instance['link1'] = (!empty($new_instance['link1'])) ? strip_tags($new_instance['link1']) : '';


        //Club2
        $instance['club2'] = (!empty($new_instance['club2'])) ? strip_tags($new_instance['club2']) : '';
        $instance['link2'] = (!empty($new_instance['link2'])) ? strip_tags($new_instance['link2']) : '';

        //Club3
        $instance['club3'] = (!empty($new_instance['club3'])) ? strip_tags($new_instance['club3']) : '';
        $instance['link3'] = (!empty($new_instance['link3'])) ? strip_tags($new_instance['link3']) : '';

        //Club4
        $instance['club4'] = (!empty($new_instance['club4'])) ? strip_tags($new_instance['club4']) : '';
        $instance['link4'] = (!empty($new_instance['link4'])) ? strip_tags($new_instance['link4']) : '';

        //Club5
        $instance['club5'] = (!empty($new_instance['club5'])) ? strip_tags($new_instance['club5']) : '';
        $instance['link5'] = (!empty($new_instance['link5'])) ? strip_tags($new_instance['link5']) : '';

        //Club6
        $instance['club6'] = (!empty($new_instance['club6'])) ? strip_tags($new_instance['club6']) : '';
        $instance['link6'] = (!empty($new_instance['link6'])) ? strip_tags($new_instance['link6']) : '';

        //Club7
        $instance['club7'] = (!empty($new_instance['club7'])) ? strip_tags($new_instance['club7']) : '';
        $instance['link7'] = (!empty($new_instance['link7'])) ? strip_tags($new_instance['link7']) : '';

        //Club8
        $instance['club8'] = (!empty($new_instance['club8'])) ? strip_tags($new_instance['club8']) : '';
        $instance['link8'] = (!empty($new_instance['link8'])) ? strip_tags($new_instance['link8']) : '';


        return $instance;
    }
}

