<?php 

include_once("connection.php");
include_once("url.php");
//RECEBENDO POST
$data = $_POST;

//---- MODIFICAÇÕES NO BANCO :

//-----CRIANDO USUARIO :
if(!empty($data)){
    if($data["type"] === "create"){
        $name        = $data["name"];
        $phone       = $data["phone"];
        $observation = $data["description"];

        $query = "INSERT INTO contacts (nameContact, phoneContact, observationContact) 
                       VALUES (:nameContact, :phoneContact, :observationContact)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":nameContact", $name);
        $stmt->bindParam(":phoneContact", $phone);
        $stmt->bindParam(":observationContact", $observation);

        try{ 
            $stmt->execute();
            $_SESSION["msg"] = "Adicionado com sucesso !";
        } catch(PDOException $e){
            //ERRO NA CONEXÃO
            $error = $e->getMessage();
            echo "ERROR : $error"; 
        }
    }   //ATUALIZANDO USUARIO : 
    if($data["type"] === "edit") {
        $name        = $data["name"];
        $phone       = $data["phone"];
        $observation = $data["description"];
        $id          = $data["id"];

        $query("UPDATE  contacts 
                   SET  nameContact        = :nameContact
                        phoneContact       = :phoneContact
                        observationContact = :observationContact 
                        WHERE id           = :id");
        
        $stmt = $conn->prepare($query);
        
        $stmt->bindParam(":nameContact", $name);
        $stmt->bindParam(":phoneContact", $phone);
        $stmt->bindParam(":observationContact", $observation);
        $stmt->bindParam(":id", $id);

        try{ 
            $stmt->execute();
            $_SESSION["msg"] = "Atualizado com sucesso !";
        } catch(PDOException $e){
            //ERRO NA CONEXÃO
            $error = $e->getMessage();
            echo "ERROR : $error";
    }
}

    header("Location:" . $BASE_URL . "../index.php");

//SELEÇÃO DE DADOS 
} else {
    $id;

    if(!empty($_GET)){
        $id = $_GET['id'];
    }
    
    if(!empty($id)) {
        $query = "SELECT * FROM contacts WHERE id = :id";
    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    
        $contact = $stmt->fetch();
    
    } else {
        //RETORNA TODOS OS CONTATOS 
        $contacts = [];
    
        $query = "SELECT * FROM contacts";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        $contacts = $stmt->fetchAll();
    
    }
}

$conn = null;
