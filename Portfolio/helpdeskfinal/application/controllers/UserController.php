<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function filter_ajax2()
    {
        $category = $this->input->post('category');
        $status = $this->input->post('status');

        // Load model
        $this->load->model('UserModel');

        // try {
        $data = $this->UserModel->get_filtered_data($category, $status);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }




    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel'); // pastikan model sudah diload
    }

    // Fungsi untuk handle update role via AJAX
    public function updateRole()
    {
        // check_login();
        // Terima data POST dari AJAX
        $userId = $this->input->post('userId');
        $role = $this->input->post('role');

        // Lakukan validasi data, jika diperlukan
        if ($userId && $role) {
            $data = array(
                'ROLE' => $role
            );

            // Update data menggunakan model
            $update = $this->UserModel->updateRole($userId, $data);

            if ($update) {
                // Jika sukses, kirim respon sukses ke AJAX
                echo json_encode(['status' => 'success', 'message' => 'Role updated successfully']);
            } else {
                // Jika gagal
                echo json_encode(['status' => 'error', 'message' => 'Failed to update role']);
            }
        } else {
            // Jika data tidak lengkap
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        }
    }

    public function add()
    {
        // check_login();
        // Terima data POST dari AJAX
        $categoryId = $this->input->post('categoryId');
        $categoryName = $this->input->post('categoryName');

        // Lakukan validasi data, jika diperlukan
        if ($categoryId && $categoryName) {
            $data = array(
                'ID' => $categoryId,
                'CATEGORY' => $categoryName
            );

            // Update data menggunakan model
            $add = $this->UserModel->add($data);

            if ($add) {
                // Jika sukses, kirim respon sukses ke AJAX
                echo json_encode(['status' => 'success', 'message' => 'Role updated successfully']);
            } else {
                // Jika gagal
                echo json_encode(['status' => 'error', 'message' => 'Failed to update role']);
            }
        } else {
            // Jika data tidak lengkap
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        }
    }

    public function delete()
    {
        // check_login();
        // Terima data POST dari AJAX
        $categoryId = $this->input->post('categoryId');

        // Lakukan validasi data, jika diperlukan
        if ($categoryId) {
            $data = array(
                'ID' => $categoryId
            );

            // Update data menggunakan model
            $add = $this->UserModel->delete($data);

            if ($add) {
                // Jika sukses, kirim respon sukses ke AJAX
                echo json_encode(['status' => 'success', 'message' => 'Role updated successfully']);
            } else {
                // Jika gagal
                echo json_encode(['status' => 'error', 'message' => 'Failed to update role']);
            }
        } else {
            // Jika data tidak lengkap
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        }
    }

    public function edit()
    {
        // check_login();
        // Terima data POST dari AJAX
        $categoryId = $this->input->post('categoryId');
        $categoryName = $this->input->post('categoryName');

        // Lakukan validasi data, jika diperlukan
        if ($categoryId && $categoryName) {
            $data = array(
                'CATEGORY' => $categoryName
            );

            // Update data menggunakan model
            $update = $this->UserModel->edit($categoryId, $data);

            if ($update) {
                // Jika sukses, kirim respon sukses ke AJAX
                echo json_encode(['status' => 'success', 'message' => 'Role updated successfully']);
            } else {
                // Jika gagal
                echo json_encode(['status' => 'error', 'message' => 'Failed to update role']);
            }
        } else {
            // Jika data tidak lengkap
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        }
    }

    public function addUser()
    {
        // check_login();

        // Terima data POST dari AJAX
        $addId = $this->input->post('addId');
        $nik = $this->input->post('nik');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Lakukan validasi sederhana
        if (empty($addId) || empty($nik) || empty($username) || empty($password)) {
            // Jika data tidak lengkap, kirim respon error
            echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
            return;
        }

        // Panggil model untuk cek apakah NIK sudah ada
        if ($this->UserModel->checkNikExists($nik)) {
            // Jika NIK sudah ada, kirimkan pesan error
            echo json_encode(['status' => 'error', 'message' => 'NIK already exists']);
            return;
        }

        // Enkripsi password sebelum menyimpannya
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Siapkan data untuk disimpan
        $data = array(
            'ID_USER' => $addId,
            'NIK' => $nik,
            'PASSWORD' => $hashedPassword,
            'USERNAME' => $username
        );

        // Panggil model untuk menambahkan user baru
        $add = $this->UserModel->addUser($data);

        if ($add) {
            // Jika sukses, kirim respon sukses ke AJAX
            echo json_encode(['status' => 'success', 'message' => 'User added successfully']);
        } else {
            // Jika gagal menyimpan data
            echo json_encode(['status' => 'error', 'message' => 'Failed to add user']);
        }
    }

    public function login_ajax()
    {
        // Ambil input dari AJAX request
        $nik = $this->input->post('username'); // NIK diambil dari input 'username'
        $password = $this->input->post('password');

        // Validasi input
        if (empty($nik)) {
            echo json_encode([
                'status' => 'error',
                'type' => 'nik',
                'message' => 'NIK harus diisi.'
            ]);
            return;
        }

        if (empty($password)) {
            echo json_encode([
                'status' => 'error',
                'type' => 'password',
                'message' => 'Password harus diisi.'
            ]);
            return;
        }

        // Cek NIK di database
        $user = $this->UserModel->get_by_nik($nik); // Ambil data user berdasarkan NIK

        if ($user) {
            // Jika NIK ada, verifikasi password
            if (password_verify($password, $user->PASSWORD)) {
                // Jika password benar
                $this->db->select('ROLE');
                $this->db->from('M_USER'); // Sesuaikan dengan nama tabelmu
                $this->db->where('NIK', $nik);
                $role_query = $this->db->get();
                $role_result = $role_query->row_array();
                $this->session->set_userdata('user_id', $user->NIK); // Atur session
                $this->session->set_userdata('role', $role_result['ROLE']);

                echo json_encode([
                    'status' => 'success',
                    'redirect' => base_url() // Ganti dengan URL dashboard kamu
                ]);
            } else {
                // Jika password salah
                echo json_encode([
                    'status' => 'error',
                    'type' => 'password',
                    'message' => 'Password yang dimasukkan salah.'
                ]);
            }
        } else {
            // Jika NIK tidak ditemukan
            echo json_encode([
                'status' => 'error',
                'type' => 'nik',
                'message' => 'NIK tidak ditemukan.'
            ]);
        }
    }

    public function logout()
    {
        // Hapus semua session data
        $this->session->unset_userdata('user_id'); // Menghapus session 'user_id'
        $this->session->sess_destroy(); // Menghancurkan seluruh session

        // Redirect ke halaman login
        redirect(base_url('index.php/welcome/login'));
    }

    public function addCategory()
    {
        // check_login();
        // Terima data POST dari AJAX
        $userId = $this->input->post('userId');
        $scheduleDate = $this->input->post('scheduleDate');
        $scheduleId = $this->input->post('scheduleId');

        // Lakukan validasi data, jika diperlukan
        if ($userId && $scheduleDate && $scheduleId) {
            $data = array(
                'ID_SCHEDULE' => $scheduleId,
                'SCHEDULE_DATE' => $scheduleDate,
                'ID_USER' => $userId
            );

            // Update data menggunakan model
            $add = $this->UserModel->addCategory($data);

            if ($add) {
                // Jika sukses, kirim respon sukses ke AJAX
                echo json_encode(['status' => 'success', 'message' => 'Role updated successfully']);
            } else {
                // Jika gagal
                echo json_encode(['status' => 'error', 'message' => 'Failed to update role']);
            }
        } else {
            // Jika data tidak lengkap
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
        }
    }

    public function get_filtered_schedule()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $startDate = $this->input->post('startDate');
            $endDate = $this->input->post('endDate');

            $schedules = $this->UserModel->get_schedules_by_date_range($startDate, $endDate);

            echo json_encode($schedules);
        }
    }

    public function upload_attachment()
    {
        $this->load->model('UserModel');

        // Check if a file is uploaded
        if (!empty($_FILES['attachment']['name'])) {
            // Configuration for file upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 10240;

            $this->load->library('upload', $config);

            // Perform the file upload
            if ($this->upload->do_upload('attachment')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];

                $data = [
                    'ATTACHMENT' => $file_name,
                ];
                $ticket_id = $this->input->post('ticket_id'); // Ambil ticket_id dari form

                // Update the database
                if ($this->UserModel->update_attachment($ticket_id, $data)) {
                    // Return a success response as a JSON object
                    echo json_encode(['success' => true, 'message' => 'File uploaded successfully.']);
                } else {
                    // Handle error case
                    echo json_encode(['success' => false, 'message' => 'Failed to save attachment to the database.']);
                }
            } else {
                // Handle file upload error
                echo json_encode(['success' => false, 'message' => $this->upload->display_errors()]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'No file selected for upload.']);
        }
    }

    public function get_note()
    {
        $ticket_id = $this->input->post('ticket_id');

        // Ambil data note dari database berdasarkan ticket_id
        $note = $this->UserModel->get_note_by_ticket($ticket_id);

        if ($note) {
            echo json_encode(['success' => true, 'note' => $note->NOTE]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No note found.']);
        }
    }

    public function save_note()
    {
        $ticket_id = $this->input->post('ticket_id');
        $note = $this->input->post('note');

        // Data yang akan diupdate
        $data = ['NOTE' => $note];

        // Simpan atau update note di database
        if ($this->UserModel->update_note_by_ticket($ticket_id, $data)) {
            echo json_encode(['success' => true, 'message' => 'Note saved successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save note.']);
        }
    }

    public function update_status()
    {
        $ticket_id = $this->input->post('ticket_id');
        $category_id = $this->input->post('category_id');
        $status = $this->input->post('status');

        // Ambil tanggal dan waktu saat ini dalam format yang sesuai untuk Oracle DATE
        $completed_date = date('Y-m-d H:i:s'); // Format sesuai dengan DATE Oracle: YYYY-MM-DD HH:MI:SS

        // Update data di database
        $update_data = array(
            'STATUS' => $status,
            'CATEGORY' => $category_id,
            'COMPLETED_DATE' => $completed_date // Format yang benar
        );

        $this->UserModel->update_ticket($ticket_id, $update_data);

        // Mengembalikan respon
        echo json_encode(['status' => 'success']);
    }

    public function filter_ajax()
    {
        $date_range = $this->input->post('date_range');

        if ($date_range) {
            // Memisahkan date range menjadi start dan end date
            $dates = explode(" to ", $date_range);
            $start_date = date('d/M/Y', strtotime(str_replace('/', '-', $dates[0])));
            $end_date = date('d/M/Y', strtotime(str_replace('/', '-', $dates[1]))) . ' 23:59:59';

            // Query filter data
            $this->db->select("ID_TICKET, PROBLEM, PHONE, TECHNICIAN, STATUS, CATEGORY, NOTE, 
                                       TO_CHAR(TICKET_DATE, 'DD Mon YYYY HH24:MI') AS TICKET_DATE, 
                                       TO_CHAR(COMPLETED_DATE, 'DD Mon YYYY HH24:MI') AS COMPLETED_DATE");
            $this->db->from('M_TICKET');
            $this->db->where("TICKET_DATE >= TO_DATE('$start_date', 'DD/Mon/YYYY')", NULL, FALSE);
            $this->db->where("TICKET_DATE <= TO_DATE('$end_date', 'DD/Mon/YYYY')", NULL, FALSE);
            $this->db->order_by("ID_TICKET");
            $query = $this->db->get();

            // Jika ada data yang ditemukan
            if ($query->num_rows() > 0) {
                $result = $query->result_array();
                foreach ($result as $row) {
                    echo "<tr>
                                <td class='align-middle text-center ps-3 id_ticket'>{$row['ID_TICKET']}</td>
                                <td class='align-middle problem'>{$row['PROBLEM']}</td>
                                <td class='align-middle text-center phone'>{$row['PHONE']}</td>
                                <td class='align-middle text-center ticket_date'>{$row['TICKET_DATE']}</td>
                                <td class='align-middle text-center technician'>{$row['TECHNICIAN']}</td>";

                    if ($row['STATUS'] == 'unfinished') {
                        echo "<td class='align-middle text-center white-space-nowrap text-end status'>
                                      <span class='badge badge-phoenix fs--2 badge-phoenix-danger'>Waiting</span>
                                      </td>";
                    } elseif ($row['STATUS'] == 'finished') {
                        echo "<td class='align-middle text-center white-space-nowrap text-end status'>
                                      <span class='badge badge-phoenix fs--2 badge-phoenix-success'>Finished</span>
                                      </td>";
                    } elseif ($row['STATUS'] == 'on-progress') {
                        echo "<td class='align-middle text-center white-space-nowrap text-end status'>
                                      <span class='badge badge-phoenix fs--2 badge-phoenix-warning'>On-Progress</span>
                                      </td>";
                    }

                    echo "<td class='align-middle text-center category'>{$row['CATEGORY']}</td>
                                <td class='align-middle text-center completion_date'>{$row['COMPLETED_DATE']}</td>
                                <td class='align-middle note'>{$row['NOTE']}</td>
                                <td class='align-middle text-center white-space-nowrap text-end pe-0'>
                                    <div class='font-sans-serif btn-reveal-trigger position-static'>
                                        <button class='btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2'
                                                type='button' data-bs-toggle='dropdown' data-boundary='window' aria-haspopup='true' aria-expanded='false' data-bs-reference='parent'>
                                            <span class='fas fa-ellipsis-h fs--2'></span>
                                        </button>
                                        <div class='dropdown-menu dropdown-menu-end py-2'>
                                            <a class='dropdown-item' href='#!'>Open Attachment</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>";
                }
            } else {
                echo "<tr><td colspan='10' class='text-center'>No data available for the selected date range.</td></tr>";
            }
        }
    }
    public function fetchMessages()
    {
        // Panggil fungsi fetchMessages dari helper
        $this->load->helper('message_helper');
        fetchMessages(); // Hanya memanggil fungsi, tidak perlu mengembalikan data
        // Mengembalikan respons 200 OK
        return $this->output->set_status_header(200);
    }

    public function filter_finished()
    {
        $date_range = $this->input->post('date_range');

        if ($date_range) {
            // Memisahkan date range menjadi start dan end date
            $dates = explode(" to ", $date_range);
            $start_date = date('d/M/Y', strtotime(str_replace('/', '-', $dates[0])));
            $end_date = date('d/M/Y', strtotime(str_replace('/', '-', $dates[1]))) . ' 23:59:59';

            // Query filter data
            $this->db->select("ID_TICKET, PROBLEM, PHONE, STATUS, CATEGORY, NOTE, 
                               TO_CHAR(TICKET_DATE, 'DD Mon YYYY HH24:MI') AS TICKET_DATE, 
                               TO_CHAR(COMPLETED_DATE, 'DD Mon YYYY HH24:MI') AS COMPLETED_DATE");
            $this->db->from('M_TICKET');
            $this->db->where("TICKET_DATE >= TO_DATE('$start_date', 'DD/Mon/YYYY')", NULL, FALSE);
            $this->db->where("TICKET_DATE <= TO_DATE('$end_date', 'DD/Mon/YYYY')", NULL, FALSE);
            $this->db->where('STATUS', 'finished');
            $this->db->order_by("ID_TICKET");
            $query = $this->db->get();

            // Jika ada data yang ditemukan
            if ($query->num_rows() > 0) {
                $result = $query->result_array();
                foreach ($result as $row) {
                    echo "<tr>
                        <td class='align-middle text-center ps-3 id_ticket'>{$row['ID_TICKET']}</td>
                        <td class='align-middle problem'>{$row['PROBLEM']}</td>
                        <td class='align-middle text-center phone'>{$row['PHONE']}</td>
                        <td class='align-middle text-center ticket_date'>{$row['TICKET_DATE']}</td>";

                    if ($row['STATUS'] == 'unfinished') {
                        echo "<td class='align-middle text-center white-space-nowrap text-end status'>
                              <span class='badge badge-phoenix fs--2 badge-phoenix-danger'>Waiting</span>
                              </td>";
                    } elseif ($row['STATUS'] == 'finished') {
                        echo "<td class='align-middle text-center white-space-nowrap text-end status'>
                              <span class='badge badge-phoenix fs--2 badge-phoenix-success'>Finished</span>
                              </td>";
                    } elseif ($row['STATUS'] == 'on-progress') {
                        echo "<td class='align-middle text-center white-space-nowrap text-end status'>
                              <span class='badge badge-phoenix fs--2 badge-phoenix-warning'>On-Progress</span>
                              </td>";
                    }

                    echo "<td class='align-middle text-center category'>{$row['CATEGORY']}</td>
                        <td class='align-middle text-center completion_date'>{$row['COMPLETED_DATE']}</td>
                        <td class='align-middle note'>{$row['NOTE']}</td>
                        <td class='align-middle text-center white-space-nowrap text-end pe-0'>
                            <div class='font-sans-serif btn-reveal-trigger position-static'>
                                <button class='btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2'
                                        type='button' data-bs-toggle='dropdown' data-boundary='window' aria-haspopup='true' aria-expanded='false' data-bs-reference='parent'>
                                    <span class='fas fa-ellipsis-h fs--2'></span>
                                </button>
                                <div class='dropdown-menu dropdown-menu-end py-2'>
                                    <a class='dropdown-item' href='#!'>Open Attachment</a>
                                </div>
                            </div>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='10' class='text-center'>No data available for the selected date range.</td></tr>";
            }
        }
    }

    public function filter_unfinished()
    {
        $date_range = $this->input->post('date_range');

        // Ambil data kategori dari tabel M_CATEGORY
        $category_query = $this->db->order_by('ID')->get('M_CATEGORY');
        $categories = $category_query->result_array(); // Data kategori

        if ($date_range) {
            // Memisahkan date range menjadi start dan end date
            $dates = explode(" to ", $date_range);
            $start_date = date('d/M/Y', strtotime(str_replace('/', '-', $dates[0])));
            $end_date = date('d/M/Y', strtotime(str_replace('/', '-', $dates[1]))) . ' 23:59:59';

            // Query filter data
            $this->db->select("ID_TICKET, PROBLEM, PHONE, STATUS, 
                           TO_CHAR(TICKET_DATE, 'DD Mon YYYY HH24:MI') AS TICKET_DATE");
            $this->db->from('M_TICKET');
            $this->db->where("TICKET_DATE >= TO_DATE('$start_date', 'DD/Mon/YYYY HH24:MI:SS')", NULL, FALSE);
            $this->db->where("TICKET_DATE <= TO_DATE('$end_date', 'DD/Mon/YYYY HH24:MI:SS')", NULL, FALSE);
            $this->db->where_in('STATUS', ['unfinished', 'on-progress']);
            $this->db->order_by("ID_TICKET");
            $query = $this->db->get();

            // Jika ada data yang ditemukan
            if ($query->num_rows() > 0) {
                $result = $query->result_array();
                foreach ($result as $row) {
                    echo "<tr>
                    <td class='align-middle text-center ps-3 id_ticket'>{$row['ID_TICKET']}</td>
                    <td class='align-middle problem'>{$row['PROBLEM']}</td>
                    <td class='align-middle text-center phone'>{$row['PHONE']}</td>
                    <td class='align-middle text-center ticket_date'>{$row['TICKET_DATE']}</td>";

                    // Ubah ini menjadi select option dengan data dari $categories
                    echo "<td>
                    <select class='form-select'>";
                    foreach ($categories as $category) {
                        echo "<option value='{$category['ID']}'>{$category['CATEGORY']}</option>";
                    }
                    echo "</select>
                    </td>";

                    echo "<td class='align-middle text-center white-space-nowrap text-end pe-0'>
                        <div class='font-sans-serif btn-reveal-trigger position-static'>
                            <button class='btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2'
                                    type='button' data-bs-toggle='dropdown' data-boundary='window' aria-haspopup='true' aria-expanded='false' data-bs-reference='parent'>
                                <span class='fas fa-ellipsis-h fs--2'></span>
                            </button>
                            <div class='dropdown-menu dropdown-menu-end py-2'>";

                    // Logic for dropdown items
                    if ($row["STATUS"] != 'on-progress') {
                        echo "<a class='dropdown-item accept-ticket' data-id='{$row['ID_TICKET']}' href='#!'>Accept Ticket</a>";
                    } else {
                        echo "<a class='dropdown-item note-btn' data-ticket-id='{$row["ID_TICKET"]}' data-bs-toggle='modal' data-bs-target='#note'>Add Notes</a>
                          <a class='dropdown-item add-attachment' data-id='{$row['ID_TICKET']}' data-bs-toggle='modal' data-bs-target='#uploadModal'>Add Attachment</a>
                          <a class='dropdown-item text-success finish' id='btn-check'>Finish Ticket</a>";
                    }

                    echo "</div>
                        </div>
                    </td>
                </tr>";
                }
            } else {
                echo "<tr><td colspan='10' class='text-center'>No data available for the selected date range.</td></tr>";
            }
        }
    }

    public function get_ticket_status()
    {
        $this->load->model('UserModel');
        $status = $this->UserModel->get_ticket_status();
        echo json_encode($status);
    }

    public function get_ticket_category()
    {
        $this->load->model('UserModel');
        $category = $this->UserModel->get_ticket_category();
        echo json_encode($category);
    }

    public function filter_schedule()
    {
        $date_range = $this->input->post('date_range');

        if ($date_range) {
            // Memisahkan date range menjadi start dan end date
            $dates = explode(" to ", $date_range);
            $start_date = date('d-M-Y', strtotime(str_replace('/', '-', $dates[0])));
            $end_date = date('d-M-Y', strtotime(str_replace('/', '-', $dates[1])));

            // Query filter data
            $this->db->select("ID_SCHEDULE, TO_CHAR(SCHEDULE_DATE, 'DD Mon YYYY') AS SCHEDULE_DATE, ID_USER");
            $this->db->from('M_SCHEDULE');
            $this->db->where("SCHEDULE_DATE BETWEEN TO_DATE('$start_date', 'DD-MON-YYYY') AND TO_DATE('$end_date', 'DD-MON-YYYY')", NULL, FALSE);

            $query = $this->db->get();

            // Jika ada data yang ditemukan
            if ($query->num_rows() > 0) {
                $result = $query->result_array();
                foreach ($result as $row) {
                    echo "<tr>
                <td class='align-middle text-center ps-3 id_schedule'>{$row['ID_SCHEDULE']}</td>
                <td class='align-middle date'>{$row['SCHEDULE_DATE']}</td>
                <td class='align-middle text-center technician_name'>{$row['ID_USER']}</td>
                <td class='align-middle text-center white-space-nowrap text-end pe-0'>
                    <div class='font-sans-serif btn-reveal-trigger position-static'>
                        <button class='btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2'
                                type='button' data-bs-toggle='dropdown' data-boundary='window'
                                aria-haspopup='true' aria-expanded='false' data-bs-reference='parent'>
                            <span class='fas fa-ellipsis-h fs--2'></span>
                        </button>
                        <div class='dropdown-menu dropdown-menu-end py-2'>
                            <a class='dropdown-item' href='#!'>Open Attachment</a>
                        </div>
                    </div>
                </td>
            </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No data available for the selected date range.</td></tr>";
            }
        }
    }
}
?>