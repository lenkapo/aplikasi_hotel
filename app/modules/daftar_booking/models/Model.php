<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
    var $table = 'bookings';
    var $idtable = 'id';
    var $column_order = array(
        'id',
        'room_id',
        'full_name',
        'email',
        'phone',
        'mobile',
        'city',
        'country',
        'adults',
        'children',
        'arrival_date',
        'departure_date',
        'nights',
        'status',
        'price_per_night',
        'total_price',
        'message',
        'created_at',
        'invoice_number',
    );
    var $column_search = array(
        'title',
    );
    var $order = array('id' => 'ASC');

    /* Server Side Data */
    /* Modified by : youngsta446@gmail.com */
    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;


        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    /* end server side  */

    function getid($id)
    {
        $this->db->where($this->idtable, $id);
        return $this->db->get($this->table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('banner', $data);
    }

    public function delete($id)
    {
        $this->db->where($this->idtable, $id);
        return $this->db->delete($this->table);
    }
}
