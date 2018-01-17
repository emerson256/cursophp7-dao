<?php

class Usuario {

	private $id;
	private $nome;
	private $email;
	private $senha;

	public function getId() {
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}

	public function loadById($id) {
		$sql = new Sql();
		$result = $sql->select("SELECT * FROM usuarios WHERE id = :ID",array(
			":ID"=>$id
		));

		if(count($result[0]) > 0) {
			$row = $result[0];
			$this->setId($row['id']);
			$this->setEmail($row['email']);
			$this->setSenha($row['senha']);
			$this->setNome($row['nome']);
		}

	}

	public function __toString() {
		return json_encode(array(
			"id"=>$this->getId(),
			"nome"=>$this->getNome(),
			"email"=>$this->getEmail(),
			"senha"=>$this->getSenha()
		));
	}
}
?>