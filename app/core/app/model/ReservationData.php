<?php
class reservationData {
	public static $tablename = "reservation";


	public function reservationData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getPacient(){ return PacientData::getById($this->pacient_id); }
	public function getMedic(){ return MedicData::getById($this->medic_id); }
	public function getCategory(){ return CategoryData::getById($this->category_id); }
	public function getStatus(){ return StatusData::getById($this->status_id); }
	public function getPayment(){ return PaymentData::getById($this->payment_id); }
	public function getPayment_type(){ return Payment_typeData::getById($this->payment_type_id); }
	public function getCoverage(){ return Payment_typeData::getById($this->coverage_id); }

	public function add(){
		$sql = "insert into reservation (medic_id,category_id,date_at,time_at,pacient_id,user_id,price,status_id,coverage_id,payment_id,payment_type_id,created_at) ";
		$sql .= "value (\"$this->medic_id\",\"$this->category_id\",\"$this->date_at\",\"$this->time_at\",$this->pacient_id,$this->user_id,\"$this->price\",$this->status_id,$this->coverage_id,$this->payment_id,$this->payment_type_id,$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto reservationData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set pacient_id=\"$this->pacient_id\",medic_id=\"$this->medic_id\",category_id=\"$this->category_id\",date_at=\"$this->date_at\",time_at=\"$this->time_at\",status_id=\"$this->status_id\" ,coverage_id=\"$this->coverage_id\",payment_id=\"$this->payment_id\",payment_type_id=\"$this->payment_type_id\",price=\"$this->price\",medic=\"$this->medic\",info=\"$this->info\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new reservationData());
	}

	public static function getRepeated($pacient_id,$medic_id,$date_at,$time_at){
		$sql = "select * from ".self::$tablename." where pacient_id=$pacient_id and medic_id=$medic_id and date_at=\"$date_at\" and time_at=\"$time_at\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new reservationData());
	}



	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new reservationData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new reservationData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new reservationData());
	}

	public static function getAllPendings(){
		$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) and status_id=1 and payment_id=1 order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new reservationData());
	}


	public static function getAllByPacientId($id){
		$sql = "select * from ".self::$tablename." where pacient_id=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new reservationData());
	}

	public static function getAllByMedicId($id){
		$sql = "select * from ".self::$tablename." where medic_id=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new reservationData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new reservationData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tablename." where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new reservationData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new reservationData());
	}


}

?>