<?php
class Database{
    private $mysqli;
    public function dbConnection(){
        try{
            $this->mysqli = mysqli_init();
            $this->mysqli->ssl_set(
                NULL,
                NULL,
                "/etc/ssl/certs/ca-certificates.crt",
                NULL,
                NULL
            );
            $this->mysqli->real_connect(
                "us-east.connect.psdb.cloud",
                "4xfep5llxmbrrbyvju7q",
                "pscale_pw_H6XH2ASXTk407mtSsnkx1fJGpklNEmRq0Wxmf18I4AW",
                "nsdevdb",
                NULL,
                MYSQLI_CLIENT_SSL,
                MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT
            );
            
            return $this->mysqli; // add this line
        }
        catch (Exception $e) {
            // Handle the exception here
        }    
              
        }
        public function query($sql) {
            return $this->mysqli->query($sql);
        }
        public function close(){
            if ($this->mysqli) {
                $this->mysqli->close();
            }
        }

        public function prepare($sql) {
            return $this->mysqli->prepare($sql);
        }
    }
