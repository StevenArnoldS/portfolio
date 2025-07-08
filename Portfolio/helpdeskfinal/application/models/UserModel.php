<?php
class UserModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk update role berdasarkan user ID
    public function updateRole($userId, $data)
    {
        $this->db->where('ID_USER', $userId);
        return $this->db->update('M_USER', $data);
    }
    
    public function get_filtered_data($category, $status) {
        $this->db->select('*');
        $this->db->from('M_TICKET'); // Ganti 'nama_tabel' dengan nama tabel Anda
    
        // Tambahkan kondisi filter
        if (!empty($category)) {
            $this->db->where('CATEGORY', $category);
        }
        if (!empty($status)) {
            $this->db->where('STATUS', $status);
        }
    
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function add($data)
    {
        return $this->db->insert('M_CATEGORY', $data);
    }

    public function delete($data)
    {
        return $this->db->delete('M_CATEGORY', $data);
    }

    public function edit($categoryId, $data)
    {
        $this->db->where('ID', $categoryId);
        return $this->db->update('M_CATEGORY', $data);
    }

    public function addUser($data)
    {
        return $this->db->insert('M_USER', $data);
    }

    public function get_by_nik($nik)
    {
        // Query untuk mendapatkan data user berdasarkan NIK
        $this->db->where('NIK', $nik);
        $query = $this->db->get('M_USER');

        if ($query->num_rows() == 1) {
            return $query->row(); // Kembalikan data user jika ditemukan
        }

        return false; // Kembalikan false jika NIK tidak ditemukan
    }

    public function addCategory($data)
    {
        // Gunakan query manual untuk menyisipkan data dengan TO_DATE
        $sql = "INSERT INTO M_SCHEDULE (ID_SCHEDULE, SCHEDULE_DATE, ID_USER)
            VALUES (?, TO_DATE(?, 'YYYY-MM-DD'), ?)";

        // Eksekusi query manual dengan binding parameter
        return $this->db->query($sql, array($data['ID_SCHEDULE'], $data['SCHEDULE_DATE'], $data['ID_USER']));
    }

    public function checkNikExists($nik)
    {
        $this->db->where('NIK', $nik);
        $query = $this->db->get('M_USER');

        // Jika jumlah baris lebih dari 0, artinya NIK sudah ada
        return $query->num_rows() > 0;
    }

    public function get_schedules_by_date_range($startDate, $endDate)
    {
        $this->db->select('M_SCHEDULE.ID_SCHEDULE, M_SCHEDULE.SCHEDULE_DATE, M_USER.USERNAME');
        $this->db->from('M_SCHEDULE');
        $this->db->join('M_USER', 'M_USER.ID_USER = M_SCHEDULE.ID_USER');

        // Konversi tanggal dari string ke format yang dikenali Oracle menggunakan TO_DATE
        $this->db->where("SCHEDULE_DATE >=", "TO_DATE('$startDate', 'YYYY-MM-DD')", false);
        $this->db->where("SCHEDULE_DATE <=", "TO_DATE('$endDate', 'YYYY-MM-DD')", false);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_attachment($ticket_id, $data)
    {
        $this->db->where('ID_TICKET', $ticket_id);
        return $this->db->update('M_TICKET', $data);
    }

    public function get_note_by_ticket($ticket_id)
    {
        $this->db->select('NOTE');
        $this->db->from('M_TICKET');
        $this->db->where('ID_TICKET', $ticket_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    // Update atau simpan note berdasarkan ID_TICKET
    public function update_note_by_ticket($ticket_id, $data)
    {
        $this->db->where('ID_TICKET', $ticket_id);
        return $this->db->update('M_TICKET', $data);
    }

    public function update_ticket($ticket_id, $update_data)
    {
        if ($update_data['STATUS'] == 'on-progress') {
            $this->db->query(
                "UPDATE M_TICKET 
             SET STATUS = ? 
             WHERE ID_TICKET = ?",
                array($update_data['STATUS'], $ticket_id)
            );
        } else {
            $this->db->query(
                "UPDATE M_TICKET 
             SET STATUS = ?, CATEGORY = ?, COMPLETED_DATE = TO_DATE(?, 'YYYY-MM-DD HH24:MI:SS') 
             WHERE ID_TICKET = ?",
                array($update_data['STATUS'], $update_data['CATEGORY'], $update_data['COMPLETED_DATE'], $ticket_id)
            );
        }
    }
    public function get_ticket_status()
    {
        $this->db->select('STATUS');
        $this->db->from('M_TICKET');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_ticket_category()
    {
        $this->db->select('M_CATEGORY.CATEGORY AS CATEGORY');
        $this->db->from('M_TICKET');
        $this->db->join('M_CATEGORY', 'M_TICKET.CATEGORY = M_CATEGORY.ID', 'left');
        $this->db->where('M_TICKET.CATEGORY IS NOT NULL');
        $query = $this->db->get();
        return $query->result();
    }

}
?>