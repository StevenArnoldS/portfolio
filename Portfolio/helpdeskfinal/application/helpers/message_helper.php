<?php
defined('BASEPATH') or exit('No direct script access allowed');
$tmp = "";

/**
 * Normalizes the text by converting non-breaking spaces and removing extra spaces.
 */
function normalizeText($text)
{
    $text = preg_replace('/\xC2\xA0/', ' ', $text); // Non-breaking space to regular space
    $text = preg_replace('/\s+/', ' ', $text); // Remove extra spaces
    return trim($text);
}

/**
 * Extracts the issue description from the text.
 */
function extractIssueDescription($text)
{
    if (preg_match('/Permasalahan\s*:\s*(.*?)(?:\s*Nomor[\s\xC2\xA0]*telepon\s*:\s*|$)/i', $text, $matches)) {
        return trim($matches[1]);
    }
    return null;
}

/**
 * Fetches chat data from the API.
 */
function getChats()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:3000/api/getChats',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => 'apiKey=bc045ab565a4c96f49a8c7147621b3b5',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}

/**
 * Fetches messages by phone ID from the API.
 */
function fetchMessageById($phone)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:3000/api/fetchMessageById',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'apiKey=bc045ab565a4c96f49a8c7147621b3b5&phone=' . urlencode($phone) . '&limit=100',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}

/**
 * Finds the Technician with the least queue count.
 */
function findTechnicianWithLeastQueue()
{
    $ci =& get_instance();
    $ci->load->database();

    // Get today's date in the required format
    $today = date('Y-m-d');

    $ci->db->select('M_USER.ID_USER');
    $ci->db->from('M_USER');
    $ci->db->join('M_SCHEDULE', 'M_USER.ID_USER = M_SCHEDULE.ID_USER');
    $ci->db->where('M_USER.ROLE', 'Technician');
    $ci->db->where("M_SCHEDULE.SCHEDULE_DATE = TO_DATE('$today', 'YYYY-MM-DD')", null, false); // Correct date comparison
    $ci->db->order_by('M_USER.QUEUE', 'ASC');
    $ci->db->limit(1);

    $query = $ci->db->get();
    $result = $query->row();

    if ($result) {
        echo "Technician found: " . $result->ID_USER;
        return $result->ID_USER;
    }

    return null;
}


/**
 * Inserts a message into the database if it does not already exist and assigns the Technician with the least queue.
 */
/**
 * Inserts a message into the database if it does not already exist and assigns the Technician with the least queue.
 */
function generateUniqueId($ci)
{
    // Mendapatkan jumlah data yang ada untuk menentukan nomor urut ID
    $yearPart = date('y'); // Mendapatkan dua digit tahun, misal 24 untuk 2024
    $ci->db->select_max('ID_TICKET', 'max_id');
    $ci->db->like('ID_TICKET', "T{$yearPart}00", 'after');
    $query = $ci->db->get('M_TICKET');
    $result = $query->row();

    if ($result && $result->max_id) {
        // Mendapatkan urutan terakhir dari ID yang ada
        $lastSequence = (int) substr($result->max_id, -3);
        $newSequence = $lastSequence + 1;
    } else {
        // Jika belum ada data, mulai dari 1
        $newSequence = 1;
    }

    // Mengonversi urutan menjadi tiga digit dengan leading zero
    $sequencePart = str_pad($newSequence, 3, '0', STR_PAD_LEFT);
    return "T{$yearPart}00{$sequencePart}";
}

function insertMessageToDb($phone, $issueDescription)
{
    $ci =& get_instance();
    $ci->load->database();

    $normalizedIssueDescription = normalizeText($issueDescription);

    // Cek jika sudah ada entri dengan BODY dan TLP yang sama
    $ci->db->where('PROBLEM', $normalizedIssueDescription);
    $ci->db->where('PHONE', $phone);
    $ci->db->where("TRUNC(TICKET_DATE) = TRUNC(SYSDATE)", null, false);
    $existingEntry = $ci->db->get('M_TICKET')->row();

    if ($existingEntry) {
        echo "Entry already exists for BODY: $normalizedIssueDescription and TLP: $phone";
        return false;
    }

    // Temukan teknisi dengan antrean paling sedikit
    $technicianId = findTechnicianWithLeastQueue();
    if (!$technicianId) {
        echo "No technician available.";
        return false;
    }

    // Ambil jumlah data yang ada untuk menentukan nomor urut berikutnya
    $count = $ci->db->count_all('M_TICKET') + 1;

    // Jika nomor urut di bawah 10, tambahkan leading zero, jika tidak, gunakan angka apa adanya
    $sequence = $count < 10 ? '0' . $count : $count;
    $id = "T" . date('y') . "00" . $sequence;

    echo "Inserting entry with Technician ID: $technicianId and Generated ID: $id";

    // Data yang akan dimasukkan ke tabel 'NEW'
    $data = [
        'ID_TICKET' => $id,
        'PROBLEM' => $normalizedIssueDescription,
        'PHONE' => $phone,
        'TECHNICIAN' => $technicianId,
        'STATUS' => 'unfinished',
    ];

    // Gunakan SYSDATE untuk timestamp saat ini di Oracle
    $ci->db->set('TICKET_DATE', 'SYSDATE', FALSE);
    $ci->db->insert('M_TICKET', $data);

    // Update antrean teknisi
    $ci->db->set('QUEUE', 'QUEUE + 1', FALSE);
    $ci->db->where('ID_USER', $technicianId);
    $ci->db->update('M_USER');

    return true;
}


/**
 * Fetches messages from the chat API and processes them.
 */
function containsKeywords($text)
{
    return preg_match('/Permasalahan\s*:\s*/i', $text);
}

function containsSkipKeywords($text)
{
    $skipKeywords = [
        'selamat malam',
        'Selamat pagi',
        'Selamat malam',
        'Selamat sore',
        'selamat pagi',
        'selamat sore',
        'Halo',
        'selamat siang',
        'halo',
        'Selamat siang'
    ];

    foreach ($skipKeywords as $keyword) {
        if (stripos($text, $keyword) !== false) {
            return true;
        }
    }
    return false;
}

function getActiveTechniciansToday()
{
    $ci =& get_instance();
    $ci->load->database();

    // Get today's date in the required format
    $today = date('Y-m-d');

    $ci->db->select('M_USER.PHONE, M_USER.USERNAME');
    $ci->db->from('M_USER');
    $ci->db->join('M_SCHEDULE', 'M_USER.ID_USER = M_SCHEDULE.ID_USER');
    $ci->db->where('M_USER.ROLE', 'Technician');
    $ci->db->where("M_SCHEDULE.SCHEDULE_DATE = TO_DATE('$today', 'YYYY-MM-DD')", null, false); // Correct date comparison

    $query = $ci->db->get();
    return $query->result();
}

function fetchMessages()
{
    $ci =& get_instance();
    $ci->load->database();
    $chatData = getChats();
    $filteredResults = [];
    $count = $ci->db->count_all('M_TICKET') + 1;
    $sequence = $count < 10 ? '0' . $count : $count;
    $id = "T" . date('y') . "00" . $sequence;

    if ($chatData && isset($chatData['results']) && is_array($chatData['results'])) {
        foreach ($chatData['results'] as $result) {
            if (!empty($result['conversationTimestamp']) && isset($result['id'])) {
                $phone = preg_replace('/\D/', '', $result['id']);
                $fetchMessage = fetchMessageById($phone);

                if ($fetchMessage && isset($fetchMessage['results'])) {
                    $latestMessage = end($fetchMessage['results']);
                    if (
                        isset($latestMessage['fromMe']) && $latestMessage['fromMe'] === false &&
                        isset($latestMessage['body'])
                    ) {
                        $normalizedBody = normalizeText($latestMessage['body']);

                        // Periksa apakah pesan mengandung angka kategori
                        if (preg_match('/\b(1|2|3|4)\b/', $normalizedBody, $matches)) {
                            $number = $matches[1];
                            switch ($number) {
                                case '1':
                                    $tmp = "Human error - ";
                                    break;
                                case '2':
                                    $tmp = "Jaringan - ";
                                    break;
                                case '3':
                                    $tmp = "Hardware - ";
                                    break;
                                case '4':
                                    $activeTechnicians = getActiveTechniciansToday();
                                    $contactMessage = "Anda dapat menghubungi: ";
                                    $contactMessage .= implode(', ', array_map(function ($tech) {
                                        return "{$tech->PHONE} dengan nama {$tech->USERNAME}";
                                    }, $activeTechnicians));

                                    sendMessage($phone, $activeTechnicians ? $contactMessage : "Maaf, tidak ada teknisi yang bertugas hari ini.");
                                    break;
                            }

                            // Set session userdata
                            if (isset($tmp)) {
                                $ci->session->set_userdata('tmp_' . $phone, $tmp);
                            }
                        }

                        // Cek dan ambil deskripsi masalah
                        if (containsKeywords($normalizedBody)) {
                            $issueDescription = extractIssueDescription($normalizedBody);

                            // Ambil nilai tmp dari session atau kirim pesan kesalahan jika belum ada
                            $tmp = $ci->session->userdata('tmp_' . $phone);
                            if ($tmp && $issueDescription) {
                                $fullDescription = $tmp . $issueDescription;

                                if (insertMessageToDb($phone, $fullDescription)) {
                                    sendMessage($phone, "Laporan Anda sedang diproses dengan nomor tiket " . $id . ". Terima kasih.");
                                    $ci->session->unset_userdata('tmp_' . $phone);
                                    break;
                                } else {
                                    sendMessage($phone, "Kesalahan saat menyimpan laporan. Silakan coba lagi.");
                                    $ci->session->unset_userdata('tmp_' . $phone);
                                    break;
                                }
                            } else {
                                // Kirim pesan kesalahan jika tmp belum ada atau deskripsi kosong
                                sendMessage($phone, "Kesalahan saat menyimpan laporan. Pastikan Anda memilih kategori terlebih dahulu.");
                                $ci->session->unset_userdata('tmp_' . $phone);
                                break;
                            }
                        }
                    }
                }

                $filteredResults[] = [
                    'id' => $phone,
                    'conversationTimestamp' => $result['conversationTimestamp'],
                ];
            }
        }
    }

    return $filteredResults;
}




/**
 * Sends a message using the WHAPI.
 */
function sendMessage($phone, $message)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:3000/api/sendMessage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query([
            'apiKey' => 'bc045ab565a4c96f49a8c7147621b3b5',
            'phone' => $phone,
            'message' => $message,
        ]),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}
