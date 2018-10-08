<?php
function register_twitter_feed_widget()
{
    register_widget('widget_twitter_feed');
}

add_action('widgets_init', 'register_twitter_feed_widget');

class widget_twitter_feed extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'twitter_feed',//Widget ID
            theme_name . ' - ' . ' تويتر ',//Widget Name
            array('description' => 'خلاصات تويتر')//Args
        );
    }

    /**
     * Front-End
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])):
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['title']);
            echo $args['after_title'];
        endif; ?>
        <?php
        if (!empty($instance['count'])):
            $count = $instance['count'];
        else :
            $count = 4;
        endif;
        $tweets = news_getTweets($count); ?>
        <div class="tweet">
            <ul>
                <?php foreach ($tweets as $tweet) { ?>
                    <li>
                        <?php echo $tweet['text']; ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-End
     */
    public function form($instance)
    {
        $title = (!empty($instance['title'])) ? $instance['title'] : '';
        $count = (!empty($instance['count'])) ? $instance['count'] : '';

        ?>
        <?php
        global $options;
        if (empty($options['screenname']) or empty($options['token_secret']) or empty($options['token']) or empty($options['secret']) or empty
            ($options['key'])):
            ?>
            <p>
                يرجى ضبط اعدادات تويتر عن طريق الدخول الى لوحة تحكم القالب ثم اختيار قسم اعدادات تويتر و ادخال البيانات
                المتاحة و هى عباره عن اسم حساب تويتر و بيانات التطبيق السرية
            </p>
        <?php endif; ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('العنوان:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('عدد التويتات:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>"
                   name="<?php echo $this->get_field_name('count'); ?>" type="text"
                   value="<?php echo esc_attr($count); ?>">
        </p>

        <?php
    }

    /**
     * Update database
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['count'] = (!empty($new_instance['count'])) ? strip_tags($new_instance['count']) : '';

        return $instance;
    }
}