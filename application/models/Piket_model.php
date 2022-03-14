<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
class Piket_model extends CI_Model {

    function getDetailKbm($nbm, $date){
        $result = $this->db->get_where('tbl_rekap_kbm',
        ['id_peg' => $nbm,
        'date' => $date
        ])->result_array();

        return $result;
    }
}