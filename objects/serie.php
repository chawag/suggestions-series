<?php
class Serie
{
	// connexion db et table
	private $conn;
	private $tableName = 'series';
	// propriétés
	public $id;
	public $imdbID;
	public $title;
	public $year;
	public $runtime;
	public $genre;
	public $actors;
	public $plot;
	public $country;
	public $poster;
	public $pseudo;
	public $comment;
	public $label;
	public $points;
	public $feedback;
	public $created;
	public $updated;

	// construct $db
	public function __construct($db) {
		$this->conn = $db;
	}

	// méthode créer série en bdd
	function createSerie() {
		$this->imdbID = strip_tags(trim($this->imdbID));
		$this->title = strip_tags(trim($this->title));
		$this->year = strip_tags(trim($this->year));
		$this->runtime = strip_tags(trim($this->runtime));
		$this->genre = strip_tags(trim($this->genre));
		$this->actors = strip_tags(trim($this->actors));
		$this->plot = strip_tags(trim($this->plot));
		$this->country = strip_tags(trim($this->country));
		$this->poster = strip_tags(trim($this->poster));
		$this->pseudo = strip_tags(trim($this->pseudo));
		$this->comment = strip_tags(trim($this->comment));
		$this->created = strip_tags(trim($this->created));

		$sql = '
			INSERT INTO '.$this->tableName.' 
			(
				ser_imdbID,
				ser_title,
				ser_year,
				ser_runtime,
				ser_genre,
				ser_actors,
				ser_plot,
				ser_country,
				ser_poster,
				ser_pseudo,
				ser_comment,
				ser_created
			)
			VALUES 
			(
				:imdbID,
				:title,
				:year,
				:runtime,
				:genre,
				:actors,
				:plot,
				:country,
				:poster,
				:pseudo,
				:comment,
				:created
			)
		';
		$stmt = $this->conn->prepare($sql);

		$stmt->bindValue(':imdbID', $this->imdbID);
		$stmt->bindValue(':title', $this->title);
		$stmt->bindValue(':year', $this->year);
		$stmt->bindValue(':runtime', $this->runtime);
		$stmt->bindValue(':genre', $this->genre);
		$stmt->bindValue(':actors', $this->actors);
		$stmt->bindValue(':plot', $this->plot);
		$stmt->bindValue(':country', $this->country);
		$stmt->bindValue(':poster', $this->poster);
		$stmt->bindValue(':pseudo', $this->pseudo);
		$stmt->bindValue(':comment', $this->comment);
		$stmt->bindValue(':created', $this->created);

		if ($stmt->execute()) {
			return true;
		}
		else{
			print_r($stmt->errorInfo());
			return false;
		}
	}

	// méthode récupérer les séries de la table
	function fetchAllSeries($limit, $orderBy) {
		$sql = '
			SELECT * 
			FROM '.$this->tableName 
		;
		if ($orderBy == 'orderCreation') {
			$sql .= ' ORDER BY ser_created DESC';
		}
		else if ($orderBy == 'orderUpdate') {
			$sql .= ' ORDER BY ser_updated DESC';
		}
		if ($limit > 0) {
			$sql .= ' LIMIT 3';
		}

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

}//end class Serie