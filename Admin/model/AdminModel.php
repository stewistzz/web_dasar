<?php
include('Model.php');

class AdminModel extends Model
{
    protected $db;
    protected $table = 'Admin';
    protected $driver;

    public function __construct()
    {
        include_once('../lib/Connection.php');
        $this->db = $db;
        $this->driver = $use_driver;
    }

    public function insertData($data)
    {
        if ($this->driver == 'mysql') {
            // MySQL: Prepare statement for the insert query
            $query = $this->db->prepare("INSERT INTO {$this->table} (account_id, nip, nama, email, kontak) 
                                         VALUES (?, ?, ?, ?, ? )");
            // Bind parameters to the query
            $query->bind_param('ssisss', $data['account_id'], $data['nip'], $data['nama'], $data['email'], $data['kontak']);
            // Execute the query
            $query->execute();
        } else {
            // SQL Server: Execute the insert query
            sqlsrv_query($this->db, "INSERT INTO {$this->table} (account_id, nip, nama, email, kontak) 
                                     VALUES (?, ?, ?, ?, ?)", [
                $data['account_id'],
                $data['nip'],
                $data['nama'],
                $data['email'],
                $data['kontak']
            ]);
        }
    }

    public function getData()
    {
        if ($this->driver == 'mysql') {
            // MySQL: Query to fetch all data from the table
            return $this->db->query("SELECT * FROM {$this->table}")->fetch_all(MYSQLI_ASSOC);
        } else {
            // SQL Server: Query to fetch all data from the table
            $query = sqlsrv_query($this->db, "SELECT * FROM {$this->table}");
            $data = [];
            while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getDataById($id)
    {
        if ($this->driver == 'mysql') {
            // MySQL: Prepare query to fetch data by id
            $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE admin_id = ?");
            // Bind parameter
            $query->bind_param('i', $id);
            // Execute and fetch result
            $query->execute();
            return $query->get_result()->fetch_assoc();
        } else {
            // SQL Server: Query to fetch data by id
            $query = sqlsrv_query($this->db, "SELECT * FROM {$this->table} WHERE admin_id = ?", [$id]);
            return sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
        }
    }

    public function updateData($id, $data)
    {
        if ($this->driver == 'mysql') {
            // MySQL: Prepare update query
            $query = $this->db->prepare("UPDATE {$this->table} 
                                         SET account_id = ?, nip = ?, nama = ?, email = ?, kontak = ?
                                         WHERE admin_id = ?");
            // Bind parameters
            $query->bind_param('ssiissi', $data['account_id'], $data['nama'], $data['nim'], $data['email'], $data['angkatan'], $data['nama_kelas'], $data['status'], $id);
            // Execute the query
            $query->execute();
        } else {
            // SQL Server: Execute update query
            sqlsrv_query($this->db, "UPDATE {$this->table} 
                                     SET account_id = ?, nip = ?, nama = ?, email = ?, kontak = ?
                                     WHERE admin_id = ?", [
                $data['account_id'],
                $data['nip'],
                $data['nama'],
                $data['email'],
                $data['kontak'],
                $id
            ]);
        }
    }

    public function deleteData($id)
    {
        if ($this->driver == 'mysql') {
            // MySQL: Prepare delete query
            $query = $this->db->prepare("DELETE FROM {$this->table} WHERE admin_id = ?");
            // Bind parameter
            $query->bind_param('i', $id);
            // Execute the query
            $query->execute();
        } else {
            // SQL Server: Execute delete query
            sqlsrv_query($this->db, "DELETE FROM {$this->table} WHERE admin_id = ?", [$id]);
        }
    }
}
