<?php

/**
 * Adds Foo_Widget widget.
 */
class Newsletter_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'news_letter', // Base ID
            __('القائمة البريدية', 'text_domain'), // Name
            array('description' => __('عرض فورم القائمة البريدية', 'text_domain'),) // Args
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

        //Widget Body
        ?>
        <div class="newsletter newsletter-subscription">
            <h3>اشترك الان فى القائمة البريدية</h3>
            <span>ليصلك كل جديدنا</span>
            <form method="post" action="http://breamx.org/demo/wordpress/ber-char/?na=s" onsubmit="return newsletter_check(this)">
                <input class="newsletter-emailf" type="email" placeholder="البريد الإلكتروني" name="ne" size="30" required>
                <input class="newsletter-submitf" type="submit" value="اشترك"/>
            </form>
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

        ?>

        <p>
            عرض فورم القائمة البريدية
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

        return $instance;
    }
}

// class Foo_Widget
// register Foo_Widget widget
function register_Newsletter_Widget()
{
    register_widget('Newsletter_Widget');
}

add_action('widgets_init', 'register_Newsletter_Widget');