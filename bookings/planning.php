<?php

<<<<<<< HEAD
echo 'test';


// $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
// $date->add(new DateInterval('P1D'));
class Agenda{
    
    private $_date;
    private $_premierjour;
    public $_semaine;

    public function get_numsemaine($date){
        $date = $date->format('W');
        $this->_semaine = $date;
    }

    public function get_premierjoursemaine($semainefromnow){
        $premierjour = new DateTime('Monday this week', new DateTimeZone('Europe/Paris'));
        if ($semainefromnow > 0) {
            $interval = new DateInterval('P'.$semainefromnow.'W');
            $premierjour->add($interval);
        }
        elseif ($semainefromnow < 0) {
            $semainefromnow = abs($semainefromnow);
            $interval = new DateInterval('P'.$semainefromnow.'W');
            $premierjour->sub($interval);
        }
        $this->_premierjour = $premierjour;    
        return $this->_premierjour;
    }

    public function generation_tableau($semainefromnow) {
        $premierjour = $this->get_premierjoursemaine($semainefromnow);
        // $this->get_numsemaine($premierjour);
        $interval = new DateInterval('P1D');
        $moisdelannee = ['Janvier', 'Février', 'Mars', 'Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];
        $jourdelasemaine = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
        echo '<h1>'.$moisdelannee[$premierjour->format('m') - 1]." ".$premierjour->format('Y').'</h1><table><thead><tr><th></th>';
        for ($i = 0; $i <= 4; $i++) {
            echo '<th>'.$jourdelasemaine[$i]." ".$premierjour->format('d').'</th>';
            $premierjour->add($interval);
        }
        $heure = 8;
        $heure2 = $heure + 1;
        echo '</tr><tbody>';
        for ($j = 0; $j < 11;$j++) {
            echo '<td>'.$heure.':00'.' - '.$heure2.':00'.'</td>';
            for ($k = 0; $k <= 4;$k++) {
                echo '<td></td>';
            }
            echo '</tr>';
            $heure++;
            $heure2++;
        }
    }

    
}

=======
require '../src/agenda.php';        
>>>>>>> 4f43fb081f42cedbaa02787b6d3912f3ee336571
$agenda = new Agenda();
if (isset($_GET['semaine'])) {
    $sem = $_GET['semaine'];
} else $sem = 0;
$agenda->generation_tableau($sem);
?>
<form action="" method="GET">
    <label for="semaine">test</label>
    <input type="submit" name="semaine" value=<?php echo $sem + 1?>>
    <input type="submit" name='semaine'value=<?php echo $sem - 1?>>
</form>

