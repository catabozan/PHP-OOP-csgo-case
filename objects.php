<?php

// cutie din csgo
// pret
// nume
// premii
// probabilitati

class Cutie {
    private float $pret = 34.28;
    private string $nume;
    private array $premii;
    public function __construct(string $nume, array $premii, float $pret = null) {
        $this->nume = $nume;
        $this->premii = $premii;
        if (! empty($pret)) {
            $this->pret = $pret;
        }
    }
    // public function open(){
    //     $index = array_rand($this->premii);

    //     echo "Ai castigat: " . $this->premii[$index]->nume;
    //     echo "\n";
    // }

    public function open(){
        $premiuGasit = false;
        while (! $premiuGasit){
            $index = array_rand($this->premii);
            $premiu = $this->premii[$index];
            $prob = $premiu->probCastig;
            
            // numar random intre 1 si 100,
            $rand = random_int(1, 100);
            if ($rand <= $prob * 100){
                $premiuGasit = true;
                
                echo "Ai castigat: " . $this->premii[$index]->nume;
                echo "\n";
            }
        }
        
    } 
}

class Premiu {
    public string $nume;
    public float $probCastig;
    public int $raritate = 1; // raritate de la 1 la 4

    public function __construct(string $nume, float $probCastig, int $raritate = null){
        $this->nume = $nume;
        $this->probCastig = $probCastig;
        if (! empty($raritate)) {
            $this->raritate = $raritate;
        }
    }
}

$listaPremii = [
    new Premiu("AK47 Fire Serpent", 0.10, 4),
    new Premiu("Desert Eagle Golden Koi", 0.10, 3),
    new Premiu("P200 Ocean Foam", 0.2, 2),
    new Premiu("AWP Graphite", 0.2, 2),
    new Premiu("P90 Emerald Dragon", 0.4)
];


$case = new Cutie(
    "Operation Bravo Case",
    $listaPremii
);

// var_dump($case);

$case->open();
