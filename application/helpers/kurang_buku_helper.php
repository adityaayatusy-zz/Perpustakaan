<?php

if(!function_exists('kurang_buku'))
{
  function kurang_buku($data,$table,$id=[])
  {
   $ci =& get_instance();
   $count = count($ci->m_admin->get_data_one($table,$id)->result());
   return $data-$count;
  }
}
