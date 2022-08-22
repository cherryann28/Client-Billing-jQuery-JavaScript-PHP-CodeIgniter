<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Model {

    public function client_billings()
    {
        return $this->db->query(
            "SELECT sum(amount) as total_cost, date_format(charged_datetime,'%M') as month,
                    date_format(charged_datetime, '%Y') as year
                FROM billing
                WHERE date_format(charged_datetime, '%Y') = 2011
                GROUP BY month, year
                ORDER BY charged_datetime")->result_array();
    }

    // public function update_date($from, $to)
    // {
    //     return $this->db->query(
    //         "SELECT sum(amount) as total_cost, date_format(charged_datetime,'%M') as month,
    //                 date_format(charged_datetime, '%Y') as year
    //         FROM billing
    //         WHERE charged_datetime between $from and charged_datetime $to'
    //         GROUP BY month, year
    //         ORDER BY charged_datetime")->result_array();
    // }

    
    public function date_range($post)
    {
        $query = "SELECT sum(amount) as total_cost, date_format(charged_datetime,'%M') as month,
                    date_format(charged_datetime, '%Y') as year
                    FROM billing
                    WHERE charged_datetime>= ? AND charged_datetime<= ?";
        $values = array($post['from_date'], $post['to_date']);
        return $this->db->query($query, $values)->result_array();
    }
}
