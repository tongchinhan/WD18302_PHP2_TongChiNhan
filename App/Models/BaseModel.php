<?php

namespace App\Models;

use App\Models\CrudInterface;
use App\Models\Database;
use PDO;
use Exception;
use App\Models\QueryBuilder;
use PDOException;

abstract class BaseModel implements CrudInterface
{
    use QueryBuilder;


    private $_connection;

    protected $name = "BaseModel";
    private $_query;

    public function __construct()
    {
        $this->_connection = new Database();
    }

    // abstract public function getAllWithPaginate(int $limit, int $offset);

    public function getAll()
    {
        $this->_query = "SELECT * FROM $this->tableName";

        return $this;
    }

    public function orderBy(string $order = 'ASC')
    {
        $this->_query = $this->_query . "order by " . $order;

        return $this;
    }


    public function get()
    {
        $stmt = $this->_connection->PDO()->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getOne($id)
    {
        return [];
    }


    public function limit(int $limit = 10)
    {
        $stmt   = $this->_connection->PDO()->prepare($this->_query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(int $id, array $data)
    {
    }
    public function remove(int $id): bool
    {
        return true;
    }



    public function insertData($table, $data)
    {

        if (!empty($data)) {

            $fielStr  = '';
            $valueStr = '';
            foreach ($data as $key => $value) {
                $fielStr .= $key . ',';
                $valueStr .= "'" . $value . "',";
            }

            $fielStr  = rtrim($fielStr, ',');
            $valueStr = rtrim($valueStr, ',');
            $sql      = "INSERT INTO  $table($fielStr) VALUES ($valueStr)";

            $status = $this->query($sql);
            if (!$status)
                return false;
        }
        return true;
    }

    public function updateData($table, $data, $condition)
    {
        if (!empty($data)) {
            $updateStr = '';
            foreach ($data as $key => $value) {
                // Kiểm tra xem giá trị có phải là một chuỗi hay không
                if (!is_numeric($value)) {
                    $value = "'" . $value . "'"; // Thêm dấu nháy đơn nếu là một chuỗi
                }
                // Thêm vào chuỗi cập nhật
                $updateStr .= "$key=$value,";
            }
            $updateStr = rtrim($updateStr, ','); // Loại bỏ dấu phẩy cuối cùng
            // Xây dựng câu lệnh SQL cập nhật
            $sql = "UPDATE $table SET $updateStr";
            // Nếu có điều kiện, thêm vào câu lệnh SQL
            if (!empty($condition)) {
                $sql .= " WHERE idtailieu = $condition";
            }
            // Thực thi câu lệnh SQL
            $status = $this->query($sql);
            if (!$status) {
                return false;
            }
        }
        return true;
    }

    public function deleteData($table, $condition = ''): bool
    {
        $sql = 'DELETE FROM ' . $table;
        if (!empty($condition)) {
            $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
        }
        $status = $this->query($sql);
        if (!$status)
            return false;
        return true;
    }
    public function delete(int $id): bool
    {
        $this->_query = "DELETE FROM $this->tableName WHERE idtailieu=$id";

        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }

    public function query($sql)
    {
        try {
            $statement = $this->_connection->PDO()->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $ex) {
            $mess = $ex->getMessage();
            echo $mess;
            die();
        }
    }
    public function getAllDocuments()
    {
        try {
            $query = "SELECT * FROM tailieu";
            $statement = $this->_connection->PDO()->query($query);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    public function GetTheLoai()
    {
        try {
            $query = "SELECT * FROM tailieu";
            $statement = $this->_connection->PDO()->query($query);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function getDocumentById($documentId)
    {
        try {
            $query = "SELECT * FROM tailieu WHERE idtailieu = :idtailieu";
            $statement = $this->_connection->PDO()->prepare($query);
            $statement->bindParam(':idtailieu', $documentId, PDO::PARAM_INT);
            $statement->execute();
            $document = $statement->fetch(PDO::FETCH_ASSOC);
            return $document;
        } catch (PDOException $e) {
            // Xử lý lỗi truy vấn
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function deleteDocumentById($documentId)
    {
        try {
            $query = "DELETE FROM tailieu WHERE idtailieu = :idtailieu";
            $statement = $this->_connection->PDO()->prepare($query);
            $statement->bindParam(':idtailieu', $documentId, PDO::PARAM_INT);
            $statement->execute();
            return $statement->rowCount() > 0;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function addDocument($documentData)
    {
        try {
            // Sử dụng prepared statement để tránh SQL injection
            $query = "INSERT INTO tailieu (ten, mota, ngaytao) VALUES (:ten, :mota, :ngaytao)";
            $statement = $this->_connection->PDO()->prepare($query);

            // Bind các giá trị từ dữ liệu tài liệu được chuyển vào
            $statement->bindParam(':ten', $documentData['ten']);
            $statement->bindParam(':mota', $documentData['mota']);

            // Chuyển đổi ngày thành định dạng phù hợp trước khi gắn vào câu lệnh SQL
            $ngaytao = date("Y-m-d", strtotime($documentData['ngaytao']));
            $statement->bindParam(':ngaytao', $ngaytao);

            // Thực hiện câu lệnh SQL để thêm tài liệu
            $result = $statement->execute();

            // Trả về true nếu thêm thành công và false nếu không thành công
            return $result;
        } catch (PDOException $e) {
            // Xử lý lỗi truy vấn
            echo "Thêm tài liệu không thành công! Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function updateDocument($updatedData)
    {
        try {
            // Sử dụng prepared statement để tránh SQL injection
            $query = "UPDATE tailieu SET ten = :ten, mota = :mota, ngaytao = :ngaytao WHERE idtailieu = :idtailieu";
            $statement = $this->_connection->PDO()->prepare($query);

            // Bind các giá trị từ dữ liệu được chuyển vào
            $statement->bindParam(':idtailieu', $updatedData['idtailieu']);
            $statement->bindParam(':ten', $updatedData['ten']);
            $statement->bindParam(':mota', $updatedData['mota']);

            // Chuyển đổi ngày thành định dạng phù hợp trước khi gắn vào câu lệnh SQL
            $ngaytao = date("Y-m-d", strtotime($updatedData['ngaytao']));
            $statement->bindParam(':ngaytao', $ngaytao);

            // Thực hiện câu lệnh SQL để cập nhật tài liệu
            $result = $statement->execute();

            // Trả về true nếu cập nhật thành công và false nếu không thành công
            return $result;
        } catch (PDOException $e) {
            // Xử lý lỗi truy vấn
            echo "Cập nhật tài liệu không thành công! Lỗi: " . $e->getMessage();
            return false;
        }
    }


    public function updatePass($id, $password)
    {
        try {
            // Xây dựng truy vấn SQL
            $query = "UPDATE nguoidung SET password = :password WHERE idnguoidung = :id";

            // Chuẩn bị truy vấn
            $statement = $this->_connection->PDO()->prepare($query);

            // Bind các tham số
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);

            // Thực thi truy vấn
            $statement->execute();

            // Kiểm tra xem truy vấn đã thành công hay không
            if ($statement->rowCount() > 0) {
                // Truy vấn cập nhật mật khẩu thành công, trả về true
                return true;
            } else {
                // Không có dòng nào bị ảnh hưởng, truy vấn không thành công, trả về false
                return false;
            }
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            echo "Lỗi: " . $e->getMessage();
            return false; // Truy vấn không thành công do lỗi
        }
    }
    public function getAllUsser()
    {
        try {
            $query = "SELECT * FROM nguoidung";
            $statement = $this->_connection->PDO()->query($query);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    public function deleteUs(int $id): bool
    {
        $this->_query = "DELETE FROM $this->tableName WHERE idnguoidung=$id";

        $stmt   = $this->_connection->PdO()->prepare($this->_query);
        $stmt->execute();
        $affected_rows = $stmt->rowCount();
        return $affected_rows;
    }
    public function updateUs($updatedData)
    {
        try {
            // Sử dụng prepared statement để tránh SQL injection
            $query = "UPDATE nguoidung SET ten = :ten, email = :email, sdt = :sdt, diachi = :diachi WHERE idnguoidung = :idnguoidung";
            $statement = $this->_connection->PDO()->prepare($query);

            // Bind các giá trị từ dữ liệu được chuyển vào
            $statement->bindValue(':ten', $updatedData['ten']);
            $statement->bindValue(':email', $updatedData['email']);
            $statement->bindValue(':sdt', $updatedData['sdt']);
            $statement->bindValue(':diachi', $updatedData['diachi']);



            // Thực hiện câu lệnh SQL để cập nhật người dùng
            $result = $statement->execute();

            // Trả về true nếu cập nhật thành công và false nếu không thành công
            return $result;
        } catch (PDOException $e) {
            // Xử lý lỗi truy vấn
            echo "Cập nhật người dùng không thành công! Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function getUsertById($documentId)
    {
        try {
            $query = "SELECT * FROM  nguoidung WHERE idnguoidung = :idnguoidung";
            $statement = $this->_connection->PDO()->prepare($query);
            $statement->bindParam(':idnguoidung', $documentId, PDO::PARAM_INT);
            $statement->execute();
            $document = $statement->fetch(PDO::FETCH_ASSOC);
            return $document;
        } catch (PDOException $e) {
            // Xử lý lỗi truy vấn
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
}
