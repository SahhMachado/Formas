<?php
    require_once "classes/autoload.php";
?>
<?php
    class Cubo extends Quadrado{
        private $idC;

        public function __construct($idC, $ld, $cr, $id) {
            parent::__construct($id, $ld, $cr, '');
            $this->setIdC($idC);
            $this->setCor($cr);
        }

        public function getIdC(){ return $this->idC; }
        public function setIdC($idC){ $this->idC = $idC;}

        public function getCor() { return $this->cr;}
        public function setCor($cr) { $this->cr = $cr;}
        
        public function AreaC() {
            $area = 6 * pow($this->getLado(),2);
            return $area;
        }

        public function PerimetroC() {
            $per = $this->getLado() * 12;
            return $per;
        }

        public function DiagonalC() {
            $d = $this->getLado() * sqrt(3);
            return $d;
        }

        public function VolumeC() {
            $vol = pow($this->getLado(),3);
            return $vol;
        }

        public function insere(){
            $sql = 'INSERT INTO cubo (cor, idquad) 
            VALUES(:cor, :idquad)';
            $parametros = array(":cor"=> $this->getCor(),
                                ":idquad"=> $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE cubo SET cor = :cor, idquad = :idquad WHERE idC = :idC';
            $parametros = array(":cor"=> $this->getCor(),
                                ":idquad"=> $this->getId(),
                                ":idC"=> $this->getIdC());

            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM cubo WHERE idC = :idC';
            $parametros = array(":idC" => $this->getIdC());

            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM quadrado,cubo WHERE idquad = id";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " && idC like :procurar"; $procurar .= "%";break;
                    case(2): $sql .= " && cor like :procurar"; $procurar .="%"; break;
                    case(3): $sql .= " && idquad = :procurar"; break;
                }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }

        public function divide(){
            return $this->getLado() / 2;
        }

        public function desenha(){
            $c = "<div style='width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; animation: rotate 10s infinite alternate; transform-style: preserve-3d;'>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateY(90deg) translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateY(180deg) translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateY(-90deg) translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateX(90deg) translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getLado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: rotateX(-90deg) translateZ(".$this->divide()."vh);'></div>
                    </div><br><br><br>";
            return $c;
        }

        public function __toString() {
            return  "<br>Id Quadrado: ".$this->getId().
                    "<br>Id Cubo: ".$this->getIdC().
                    "<br>Cor: ".$this->getCor().
                    "<br>Área: ".round($this->AreaC(),2)." m²".
                    "<br>Perímetro: ".round($this->PerimetroC(),2).
                    "<br>Diagonal: ".round($this->DiagonalC(),2).
                    "<br>Volume: ".round($this->VolumeC(),2);
        }
    }
?>