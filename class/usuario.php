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
			$this->setData($result[0]);
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

	public static function getList() {
		$sql = new Sql();
		return $sql->select("SELECT * FROM usuarios ORDER BY nome");
	}

	public static function search($nome) {
		$sql = new Sql();
		return $sql->select("SELECT * FROM usuarios WHERE nome LIKE :SEARCH ORDER BY nome", array(
			':SEARCH'	=>"%".$nome."%"
		));
	}

	public function setData($data) {

		$this->setId($data['id']);
		$this->setEmail($data['email']);
		$this->setSenha($data['senha']);
		$this->setNome($data['nome']);
	}

	public function insert() {
		$sql = new Sql();

		$result = $sql->select("INSERT INTO usuarios (nome,senha,email)VALUES(:NOME, :SENHA,:EMAIL)",array(
			':SENHA'=>$this->getSenha(),
			'NOME'=>$this->getNome(),
			'EMAIL'=>$this->getEmail()
		));

		if(count($result) > 0) {
			$this->setData($result[0]);
		}
	}

	public function update($nome,$email,$senha) {

		$this->setNome($nome);
		$this->setEmail($email);
		$this->setSenha($senha);

		$sql = new Sql();
		$sql->query("UPDATE usuarios SET nome = :NOME, senha = :SENHA, email = :EMAIL WHERE id = :ID", array(
			':NOME'=>$this->getNome(),
			':SENHA'=>$this->getSenha(),
			':EMAIL'=>$this->getEmail(),
			':ID'=>$this->getID()
		));
	}

	public function delete() {
		$sql = new Sql();
		$sql->query("DELETE FROM usuarios WHERE id = :ID",array(
			':ID'=>$this->getId()
		));

		$this->setID(0);
		$this->setNome("");
		$this->setEmail("");
		$this->setSenha("");
	}
}
?>