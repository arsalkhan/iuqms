<?php

/*
 *  File Name           :       crystal.payments.PayPal.php
 *  Package             :       crystal.payments
 *  Created Date        :       16-July-2013
 *  Developer           :       Syed Owais Ali
 */

class PayPal
{
    // set general variables
    private $action_url;
    private $cmd;
    private $charset;
    private $return_url;
    private $currency_code;
    private $hosted_button_id;
    private $business;
    private $tax;
    private $quantity;
    private $no_note;
    private $receiver_email;
    private $ipn_test;
    private $invoice;
    private $cancel_return;
    private $notify_url;
    private $shipping;
    private $handling_cart;
    private $no_shipping;

    // set variables to buyer information
    private $item_name;
    private $item_number;
    private $amount;
    private $first_name;
    private $last_name;
    private $address1;
    private $address2;
    private $city;
    private $state;
    private $zip;
    private $night_phone_a;
    private $night_phone_b;
    private $payer_email;
    private $country;
    private $lc;
    private $cn;
    private $cs;
    private $page_style;

    private $form_name;
    private $form_id;
    private $form_method;
    private $form_btn_img;
    private $html;

    public static $ACTION_URL  = "https://www.paypal.com/cgi-bin/webscr";
    public static $AUTO_SUBMIT = 0;
    public static $PRINT_FORM  = 1;

    // class constructor
    function __construct()
    {
        $this->action_url = self::$ACTION_URL;

        // initialize default values
        $this->init();
    }

    private function init()
    {
        $this->cmd              = "_xclick";
        $this->charset          = "utf-8";
        $this->return_url       = "";
        $this->currency_code    = "USD";
        $this->hosted_button_id = "";
        $this->business         = "";
        $this->tax              = array();
        $this->quantity         = array();
        $this->item_name        = array();
        $this->item_number      = array();
        $this->amount           = array();
        $this->no_note          = "";
        $this->receiver_email   = "";
        $this->ipn_test         = "";
        $this->invoice          = "";
        $this->cancel_return    = "";
        $this->notify_url       = "";
        $this->shipping         = "";
        $this->handling_cart    = "";
        $this->no_shipping      = "";
        $this->first_name       = "";
        $this->last_name        = "";
        $this->address1         = "";
        $this->address2         = "";
        $this->city             = "";
        $this->state            = "";
        $this->zip              = "";
        $this->night_phone_a    = "";
        $this->night_phone_b    = "";
        $this->payer_email      = "";
        $this->country          = "";
        $this->lc               = "";
        $this->cn               = "";
        $this->cs               = "";
        $this->page_style       = "";
        $this->html             = "";
        $this->form_name        = "paypal_form";
        $this->form_id          = "pyapal_form";
        $this->form_btn_img     = "http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif";
        $this->form_method      = "post";
    }

    /* Setter */

    // set action url
    public function set_action_url($ac_url = "https://www.paypal.com/cgi-bin/webscr")
    {
        $this->action_url = $ac_url;
        return $this;
    }

    // set cmd
    public function set_cmd($cmd = "_xclick")
    {
        $this->cmd = $cmd;
        return $this;
    }

    // set charset
    public function set_charset($charset = "utf-8")
    {
        $this->charset = $charset;
        return $this;
    }

    // set return url
    public function set_return_url($r_url = "")
    {
        $this->return_url = $r_url;
        return $this;
    }

    // set currency code
    public function set_currency_code($cc = "USD")
    {
        $this->currency_code = $cc;
        return $this;
    }

    // set hosted button id
    public function set_hosted_button_id($hbi = "")
    {
        $this->hosted_button_id = $hbi;
        return $this;
    }

    // set business email
    public function set_business_email($be = "")
    {
        $this->business = $be;
        return $this;
    }

    // set tax
    public function set_tax($_tax = array())
    {
        foreach($_tax as $args)
        {
            array_push($this->tax, $args);
        }

        return $this;
    }

    // set quantity
    public function set_quantity($_qty = array())
    {
        foreach($_qty as $args)
        {
            array_push($this->quantity, $args);
        }

        return $this;
    }

    // set item name
    public function set_item_name($_item_name = array())
    {
        foreach($_item_name as $args)
        {
            array_push($this->item_name, $args);
        }

        return $this;
    }

    // set item number
    public function set_item_number($_item_number = array())
    {
        foreach($_item_number as $args)
        {
            array_push($this->item_number, $args);
        }

        return $this;
    }

    // set amount
    public function set_amount($_amount = array())
    {
        foreach($_amount as $args)
        {
            array_push($this->amount, $args);
        }

        return $this;
    }

    // set no note
    public function set_no_note($nn = "")
    {
        $this->no_note = $nn;
        return $this;
    }

    // set receiver email
    public function set_receiver_email($r_email = "")
    {
        $this->receiver_email = $r_email;
        return $this;
    }

    // set ipn test
    public function set_ipn_test($ipn = "")
    {
        $this->ipn_test = $ipn;
        return $this;
    }

    // set invoice
    public function set_invoice($inv = "")
    {
        $this->invoice = $inv;
        return $this;
    }

    // set cancel return url
    public function set_cancel_return($c_return = "")
    {
        $this->cancel_return = $c_return;
        return $this;
    }

    // set notify url
    public function set_notify_url($notify = "")
    {
        $this->notify_url = $notify;
        return $this;
    }

    // set shipping
    public function set_shipping($ship = "")
    {
        $this->shipping = $ship;
        return $this;
    }

    // set handling cart
    public function set_handling_cart($h_cart = "")
    {
        $this->handling_cart = $h_cart;
        return $this;
    }

    // set no shipping
    public function set_no_shipping($no_ship = "")
    {
        $this->no_shipping = $no_ship;
        return $this;
    }

    // set first name
    public function set_first_name($f_name = "")
    {
        $this->first_name = $f_name;
        return $this;
    }

    // set last name
    public function set_last_name($l_name = "")
    {
        $this->last_name = $l_name;
        return $this;
    }

    // set address one
    public function set_address_one($addr_one = "")
    {
        $this->address1 = $addr_one;
        return $this;
    }

    // set address two
    public function set_address_two($addr_two = "")
    {
        $this->address2 = $addr_two;
        return $this;
    }

    //set city
    public function set_city($c = "")
    {
        $this->city = $c;
        return $this;
    }

    // set state
    public function set_state($st = "")
    {
        $this->state = $st;
        return $this;
    }

    // set zip
    public function set_zip($z = "")
    {
        $this->zip = $z;
        return $this;
    }

    // set night phone a
    public function set_night_phone_a($npa = "")
    {
        $this->night_phone_a = $npa;
        return $this;
    }

    // set night phone b
    public function set_night_phone_b($npb = "")
    {
        $this->night_phone_b = $npb;
        return $this;
    }

    // set payer email
    public function set_payer_email($p_email = "")
    {
        $this->payer_email = $p_email;
        return $this;
    }

    // set country
    public function set_country($cnty = "")
    {
        $this->country = $cnty;
        return $this;
    }

    // set local
    public function set_lc($local = "")
    {
        $this->lc = $local;
        return $this;
    }

    // set cn
    public function set_cn($c_n = "")
    {
        $this->cn = $c_n;
        return $this;
    }

    // set cs
    public function set_cs($c_s = "")
    {
        $this->cs = $c_s;
        return $this;
    }

    // set page style
    public function set_page_style($p_style = "")
    {
        $this->page_style = $p_style;
        return $this;
    }

    // set form button image
    public function set_button_image($img = 0)
    {
        if($img != 0)
        {
            $this->form_btn_img = $img;
        }
    }

    /* Getter */

    // get action url
    public function get_action_url()
    {
        return $this->action_url;
    }

    // get cmd
    public function get_cmd()
    {
        return $this->cmd;
    }

    // get charset
    public function get_charset()
    {
        return $this->charset;
    }

    // get return turl
    public function get_return_url()
    {
        return $this->return_url;
    }

    // get currency code
    public function get_currency_code()
    {
        return $this->currency_code;
    }

    // get hosted button id
    public function get_hosted_button_id()
    {
        return $this->hosted_button_id;
    }

    // get business email
    public function get_business_email()
    {
        return $this->business;
    }

    // get tax
    public function get_tax()
    {
        return $this->tax;
    }

    // get item name
    public function get_item_name()
    {
        return $this->item_name;
    }

    // get item number
    public function get_item_number()
    {
        return $this->item_number;
    }

    // get amount
    public function get_amount()
    {
        return $this->amount;
    }

    // get no note
    public function get_no_note()
    {
        return $this->no_note;
    }

    // get receiver email
    public function get_receiver_email()
    {
        return $this->receiver_email;
    }

    // get ipn test
    public function get_ipn_test()
    {
        return $this->ipn_test;
    }

    // get invoice
    public function get_invoice()
    {
        return $this->invoice;
    }

    // get cancel return url
    public function get_cancel_return()
    {
        return $this->cancel_return;
    }

    // get notify url
    public function get_notify_url()
    {
        return $this->notify_url;
    }

    // get shipping
    public function get_shipping()
    {
        return $this->shipping;
    }

    // get handling cart
    public function get_handling_cart()
    {
        return $this->handling_cart;
    }

    // get no shipping
    public function get_no_shipping()
    {
        return $this->no_shipping;
    }

    // get first name
    public function get_first_name()
    {
        return $this->first_name;
    }

    // get last name
    public function get_last_name()
    {
        return $this->last_name;
    }

    // get address one
    public function get_address_one()
    {
        return $this->address1;
    }

    // get address two
    public function get_address_two()
    {
        return $this->address2;
    }

    // get city
    public function get_city()
    {
        return $this->city;
    }

    // get state
    public function get_state()
    {
        return $this->state;
    }

    // get zip
    public function get_zip()
    {
        return $this->zip;
    }

    // get night phone a
    public function get_night_phone_a()
    {
        return $this->night_phone_a;
    }

    // get night phone b
    public function get_night_phone_b()
    {
        return $this->night_phone_b;
    }

    // get payer email
    public function get_payer_email()
    {
        return $this->payer_email;
    }

    // get country
    public function get_country()
    {
        return $this->country;
    }

    // get local
    public function get_lc()
    {
        return $this->lc;
    }

    // get cn
    public function get_cn()
    {
        return $this->cn;
    }

    // get cs
    public function get_cs()
    {
        return $this->cs;
    }

    // get page style
    public function get_page_style()
    {
        return $this->page_style;
    }

    // get form button image
    public function get_button_image()
    {
        return $this->form_btn_img;
    }

    public function submit($opt = 1)
    {
        $this->html .= "<form name='$this->form_name' id='$this->form_id' action='$this->action_url' method='$this->form_method'>";

        $this->html .= "<input type='hidden' name='cmd' value='$this->cmd' />";
        $this->html .= "<input type='hidden' name='charset' value='$this->charset' />";
        $this->html .= "<input type='hidden' name='currency_code' value='$this->currency_code' />";

        $this->html .= $this->return_url       != "" ? "<input type='hidden' name='return' value='$this->return_url' />"                 : "";
        $this->html .= $this->hosted_button_id != "" ? "<input type='hidden' name='hosted_button_id' value='$this->hosted_button_id' />" : "";
        $this->html .= $this->business         != "" ? "<input type='hidden' name='business' value='$this->business' />"                 : "";

        // if cmd is _cart not _xclick or another
        if($this->cmd == "_cart")
        {
            $this->html .= "<input type='hidden' name='upload' value='1' />";

            // adding multiple tax
            for($i = 0; $i < count($this->tax); $i++)
            {
                $this->html .= "<input type='hidden' name='tax_" . ($i + 1) . "' value='" . $this->tax[$i] . "' />";
            }

            // adding multiple quantity
            for($i = 0; $i < count($this->quantity); $i++)
            {
                $this->html .= "<input type='hidden' name='quantity_" . ($i + 1) . "' value='" . $this->quantity[$i] . "' />";
            }

            // adding multiple item name
            for($i = 0; $i < count($this->item_name); $i++)
            {
                $this->html .= "<input type='hidden' name='item_name_" . ($i + 1) . "' value='" . $this->item_name[$i] . "' />";
            }

            // adding multiple item number
            for($i = 0; $i < count($this->item_number); $i++)
            {
                $this->html .= "<input type='hidden' name='item_number_" . ($i + 1) . "' value='" . $this->item_number[$i] . "' />";
            }

            // adding multiple amount
            for($i = 0; $i < count($this->amount); $i++)
            {
                $this->html .= "<input type='hidden' name='amount_" . ($i + 1) . "' value='" . $this->amount[$i] . "' />";
            }
        }
        else
        {
            // adding multiple tax
            for($i = 0; $i < count($this->tax); $i++)
            {
                $this->html .= "<input type='hidden' name='tax' value='" . $this->tax[$i] . "' />";
            }

            // adding multiple quantity
            for($i = 0; $i < count($this->quantity); $i++)
            {
                $this->html .= "<input type='hidden' name='quantity' value='" . $this->quantity[$i] . "' />";
            }

            // adding multiple item name
            for($i = 0; $i < count($this->item_name); $i++)
            {
                $this->html .= "<input type='hidden' name='item_name' value='" . $this->item_name[$i] . "' />";
            }

            // adding multiple item number
            for($i = 0; $i < count($this->item_number); $i++)
            {
                $this->html .= "<input type='hidden' name='item_number' value='" . $this->item_number[$i] . "' />";
            }

            // adding multiple amount
            for($i = 0; $i < count($this->amount); $i++)
            {
                $this->html .= "<input type='hidden' name='amount' value='" . $this->amount[$i] . "' />";
            }
        }



        $this->html .= $this->no_note        != "" ? "<input type='hidden' name='no_note' value='$this->no_note' />"               : "";
        $this->html .= $this->receiver_email != "" ? "<input type='hidden' name='receiver_email' value='$this->receiver_email' />" : "";
        $this->html .= $this->ipn_test       != "" ? "<input type='hidden' name='ipn_test' value='$this->ipn_test' />"             : "";
        $this->html .= $this->invoice        != "" ? "<input type='hidden' name='invoice' value='$this->invoice' />"               : "";
        $this->html .= $this->cancel_return  != "" ? "<input type='hidden' name='cancel_return' value='$this->cancel_return' />"   : "";
        $this->html .= $this->notify_url     != "" ? "<input type='hidden' name='notify_url' value='$this->notify_url' />"         : "";
        $this->html .= $this->shipping       != "" ? "<input type='hidden' name='handling_cart' value='$this->shipping' />"        : "";
        $this->html .= $this->handling_cart  != "" ? "<input type='hidden' name='invoice' value='$this->handling_cart' />"         : "";
        $this->html .= $this->no_shipping    != "" ? "<input type='hidden' name='no_shipping' value='$this->no_shipping' />"       : "";
        $this->html .= $this->first_name     != "" ? "<input type='hidden' name='first_name' value='$this->first_name' />"         : "";
        $this->html .= $this->last_name      != "" ? "<input type='hidden' name='last_name' value='$this->last_name' />"           : "";
        $this->html .= $this->address1       != "" ? "<input type='hidden' name='address1' value='$this->address1' />"             : "";
        $this->html .= $this->address2       != "" ? "<input type='hidden' name='address2' value='$this->address2' />"             : "";
        $this->html .= $this->city           != "" ? "<input type='hidden' name='city' value='$this->city' />"                     : "";
        $this->html .= $this->state          != "" ? "<input type='hidden' name='state' value='$this->state' />"                   : "";
        $this->html .= $this->zip            != "" ? "<input type='hidden' name='zip' value='$this->zip' />"                       : "";
        $this->html .= $this->night_phone_a  != "" ? "<input type='hidden' name='night_phone_a' value='$this->night_phone_a' />"   : "";
        $this->html .= $this->night_phone_b  != "" ? "<input type='hidden' name='night_phone_b' value='$this->night_phone_b' />"   : "";
        $this->html .= $this->payer_email    != "" ? "<input type='hidden' name='email' value='$this->payer_email' />"           : "";
        $this->html .= $this->country        != "" ? "<input type='hidden' name='country' value='$this->country' />"               : "";
        $this->html .= $this->lc             != "" ? "<input type='hidden' name='lc' value='$this->lc' />"                         : "";
        $this->html .= $this->cn             != "" ? "<input type='hidden' name='cn' value='$this->cn' />"                         : "";
        $this->html .= $this->cs             != "" ? "<input type='hidden' name='cs' value='$this->cs' />"                         : "";
        $this->html .= $this->page_style     != "" ? "<input type='hidden' name='page_style' value='$this->page_style' />"         : "";

        $this->html .= "<input type='image' name='paypal_submit_btn' class='paypal-submit-button' alt='Buy Now' src='$this->form_btn_img' />";

        $this->html .= "</form>";

        if($opt == self::$AUTO_SUBMIT)
        {
            $this->html .= "<script>document." . $this->form_name . ".submit()</script>";
        }

        echo $this->html;
    }
}