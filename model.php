<?php
    class DB {
        private $host = 'localhost';
        private $db = 'trynew';
        private $user = 'root';
        private $pass = '';
        private $conn;

        public function connect(){
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conn;
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    }

    class product extends DB {
        
        public function selectall(){
            $sql = 'SELECT * FROM items';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function selectallwhere($id){
            $sql = 'SELECT * FROM items WHERE item_ID = :id';
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':id',  $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function savedata($item, $price){
            $sql = "INSERT INTO items (item_name, item_price) VALUES (:itn, :itp)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':itn', $item);
            $stmt->bindParam(':itp', $price);
            if ($stmt->execute()) {
                header("Location: mainindex.php");
            } else {
                return false;
            }
        }

        public function edit($id){
            $sql = 'SELECT * FROM items WHERE item_ID = :overridee';
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':overridee', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function saveupdate($id, $item, $price){
            $sql = "UPDATE items SET item_name = :itn, item_price = :itmp WHERE item_ID = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':itn', $item);
            $stmt->bindParam(':itmp', $price);
            if ($stmt->execute()) {
                header("Location: mainindex.php");
            } else {
                return false;
            }
        }

        public function delete($id){
            $sql = 'DELETE FROM items WHERE item_ID = :id';
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                header("Location: mainindex.php?try='su'");
            } else {
                return false;
            }
        }

        
    }
?>