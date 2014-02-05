<?php

    class util
    {
    public static function util_id_control($control_id)
       {
           return htmlspecialchars(util::util_new($control_id));
       }

       public static function util_new($control_id)
       {
           global $$control_id;
           if(!isset($$control_id))
           {
               return "";
           }
           else
           {
               return $$control_id;
           }

       }
    }
?>