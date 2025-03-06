<?php
include('Model.php');
class BukuModel extends Model
{
    private $db;
    private $table = 'm_buku';

    protected $driver;

    public function __construct()
    {
        include_once('../lib/Connection.php');
        $this->db = $db;
        // $this->db->set_charset('utf8');
        $this->driver = $use_driver;
    }
    public function insertData($data)
    {
        
        if ($this->driver == 'mysql') {
            // Menggunakan MySQLi
            $query = $this->db->prepare("INSERT INTO {$this->table} (kategori_id, buku_kode, buku_nama, jumlah, deskripsi, gambar) 
                VALUES (?, ?, ?, ?, ?, ?)");
    
            // Binding parameter ke query
            $query->bind_param('ississ', 
                $data['kategori_id'], 
                $data['buku_kode'], 
                $data['buku_nama'], 
                $data['jumlah'], 
                $data['deskripsi'], 
                $data['gambar']
            );
    
            // Eksekusi query
            if (!$query->execute()) {
                die('MySQL Insert Error: ' . $query->error);
            }
    
        } else if ($this->driver == 'sqlsrv') {
            // Menggunakan SQLSRV
            $sql = "INSERT INTO {$this->table} (kategori_id, buku_kode, buku_nama, jumlah, deskripsi, gambar) 
                VALUES (?, ?, ?, ?, ?, ?)";
            $params = [
                $data['kategori_id'], 
                $data['buku_kode'], 
                $data['buku_nama'], 
                $data['jumlah'], 
                $data['deskripsi'], 
                $data['gambar']
            ];
    
            // Eksekusi query
            $stmt = sqlsrv_query($this->db, $sql, $params);
    
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        } else {
            die('Unsupported database driver.');
        }
    }
    public function getData(){
        if ($this->driver == 'mysql') {
            // fetch data
            return $this->db->query("SELECT * FROM {$this->table}")->fetch_all(MYSQLI_ASSOC);
        } else {
            // fetch data
            $query = sqlsrv_query($this->db, "SELECT * FROM {$this->table}");
            $data = [];
            while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getDataById($id){
        if ($this->driver == 'mysql') {
            // query untuk mengambil data berdasarkan id
            $query = $this->db->prepare("select * from {$this->table} where buku_id = ?");
            // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
            $query->bind_param('i', $id);
            // eksekusi query
            $query->execute();
            // ambil hasil query
            return $query->get_result()->fetch_assoc();
        } else {
            $query = sqlsrv_query($this->db, "SELECT * FROM {$this->table} WHERE buku_id = ?", [$id]);
            return sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
        }
    }

    public function updateData($id, $data)
    {
        if ($this->driver == 'mysql') {
            // query untuk update data
            $query = $this->db->prepare("UPDATE {$this->table} SET 
                kategori_id = ?, 
                buku_kode = ?, 
                buku_nama = ?, 
                jumlah = ?, 
                deskripsi = ?, 
                gambar = ? 
                WHERE buku_id = ?");
    
            // binding parameter ke query
            $query->bind_param('ississi', 
                $data['kategori_id'], 
                $data['buku_kode'], 
                $data['buku_nama'], 
                $data['jumlah'], 
                $data['deskripsi'], 
                $data['gambar'], 
                $id
            );
    
            // eksekusi query
            $query->execute();
        } else {
            // query untuk update data untuk sqlsrv
            $sql = "UPDATE {$this->table} SET 
                kategori_id = ?, 
                buku_kode = ?, 
                buku_nama = ?, 
                jumlah = ?, 
                deskripsi = ?, 
                gambar = ? 
                WHERE buku_id = ?";
    
            $params = [
                $data['kategori_id'], 
                $data['buku_kode'], 
                $data['buku_nama'], 
                $data['jumlah'], 
                $data['deskripsi'], 
                $data['gambar'], 
                $id
            ];
    
            // eksekusi query menggunakan sqlsrv_query
            $stmt = sqlsrv_query($this->db, $sql, $params);
    
            // cek jika query gagal
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
        }
    } 
    
    public function deleteData($id){
        if ($this->driver == 'mysql') {
            // MySQL: Prepare delete query
            $query = $this->db->prepare("DELETE FROM {$this->table} WHERE buku_id = ?");
            // Bind parameter
            $query->bind_param('i', $id);
            // Execute the query
            $query->execute();
        } else {
            // SQL Server: Execute delete query
            sqlsrv_query($this->db, "DELETE FROM {$this->table} WHERE buku_id = ?", [$id]);
        }
    }
}
