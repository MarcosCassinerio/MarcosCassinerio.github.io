<!DOCTYPE html>
<html>
	<head>
		<title>Cartas</title>
		<link rel="stylesheet" type="text/css" href="../css/cartitas.css"> 
	</head>
	<body>
		<form name="formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<div class="container">
			<div>
				<p class="titulo" align="center">Ajuste estas categorias para encontrar las cartas deseadas</p>
				<table border="none">
					<tr>
						<td>
							<input name="attack" type="number" placeholder="Attack">
						</td>
						<td>
							<select name="collectible" required="" type="number">
								<option value="">Collectability</option>
								<option value="1">Collectible</option>
								<option value="0">Non collectible</option>
						</td>
						<td>
							<input name="cost" type="number" placeholder="Cost">
						</td>
						<td>
							<input name="durability" type="number" placeholder="Durability">
						</td>
						<td>
							<input name="health" type="number" placeholder="Health">
						</td>
						<td>
							<input type="submit" value="Buscar">
						</td>
					</tr>
				</table>
			</div>
			</div>
		</form>
	<div class="downear">
<?php
	require_once 'C:\xampp\unirest-php-master\src\Unirest.php';
	$sets=array("Basic",
	"Classic",
	"Promo",
	"Hall of Fame",
	"Naxxramas",
	"Goblins vs Gnomes",
	"Blackrock Mountain",
	"The Grand Tournament",
	"The League of Explorers",
	"Whispers of the Old Gods",
	"One Night in Karazhan",
	"Mean Streets of Gadgetzan",
	"Journey to Un'Goro",
	"Knights of the Frozen Throne",
	"Kobolds & Catacombs",
	"The Witchwood",
	"Tavern Brawl",
	"Hero Skins",
	"Missions",
	"Credits",
	"System",
	"Debug");
	class parametrosDeBusqueda{
		public $qm;
		public $attack;
		public $collectible;
		public $cost;
		public $durability;
		public $health;
		function __construct(){
			$this->qm=false;
			$this->attack=-1;
			$this->collectible=0;
			$this->cost=-1;
			$this->durability=-1;
			$this->health=-1;
		}
	}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $entries = new parametrosDeBusqueda();
    if($_POST["attack"])
    $entries->attack=$_POST["attack"];
    if($_POST["collectible"])
    $entries->collectible=$_POST["collectible"];
    if($_POST["cost"])
    $entries->cost=$_POST["cost"];
    if($_POST["durability"])
    $entries->durability=$_POST["durability"];
    if($_POST["health"])
    $entries->health=$_POST["health"];
	$link="https://omgvamp-hearthstone-v1.p.mashape.com/cards";
	if($entries->attack!=-1){
		if(!$entries->qm){
			$link.="?";
			$entries->qm=1;
		}else{
			$link.="&";
		}
		$link.="attack=".$entries->attack;
	}
	if($entries->collectible){
		if(!$entries->qm){
			$link.="?";
			$entries->qm=1;
		}else{
			$link.="&";
		}
		$link.="collectible=1";
	}
	if($entries->cost!=-1){
		if(!$entries->qm){
			$link.="?";
			$entries->qm=1;
		}else{
			$link.="&";
		}
		$link.="cost=".$entries->cost;
	}
	if($entries->durability!=-1){
		if(!$entries->qm){
			$link.="?";
			$entries->qm=1;
		}else{
			$link.="&";
		}
		$link.="durability=".$entries->durability;
	}
	if($entries->health!=-1){
		if(!$entries->qm){
			$link.="?";
			$entries->qm=1;
		}else{
			$link.="&";
		}
		$link.="health=".$entries->health;
	}

	$response = Unirest\Request::get($link,
  		array(
    			"X-Mashape-Key" => "rrm8UXHlCsmshkzQwLPpPP7GBv5Rp1lWEG1jsnVpI3bRsk9mId"
  		)
	);
	for($j=0;$j<count($sets);$j++)
		for($i=0;$i<count($response->body->{$sets[$j]});$i++){
			echo '<img src="'.$response->body->{$sets[$j]}[$i]->img.'">';
		}
}
	?>
	</div>
</body>
</html>
