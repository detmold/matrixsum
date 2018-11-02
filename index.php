<?php 
class MatrixSum {

    public $n; //number of rows
    public $m; //number of columns
    public $matrix = array(array()); //input n x m matrix 
    public $queriesMatrix = array(); //queries right-bottom indexes in the form of $queriesMatrix[[1,2], [5,8], [9,7]]
    public $satMatrix = array(array());

    /**
     * function to build SAT matrix. The SAT matrix is the same size as input matrix
     * each cell (i,j) contains subset sum of all elements from input array of index 0,0 to index i,j  
     * recursive pattern: S(x,y) = a(x,y) + S(x-1,y) + S(x,y-1) - S(x-1,y-1)
     * where a is input array and S is SAT array
     */
    private function buildSATMatrix() {
        $this->satMatrix[1][1] = $this->matrix[1][1];
        // rows loop
        for ($i=2; $i<=$this->n; $i++) {
            $this->satMatrix[$i][1] = $this->satMatrix[$i-1][1] + $this->matrix[$i][1];
        }
        // cols loop
        for ($j=2; $j<=$this->m; $j++) {
            $this->satMatrix[1][$j] = $this->satMatrix[1][$j-1] + $this->matrix[1][$j];
        }
        // first column and first row of $this->satMatrix should have sum from input array
        for ($i=2; $i<=$this->n; $i++) {
            for ($j=2; $j<=$this->m; $j++) {
                $this->satMatrix[$i][$j] = $this->matrix[$i][$j] + $this->satMatrix[$i-1][$j] + $this->satMatrix[$i][$j-1] - $this->satMatrix[$i-1][$j-1];
            }
        }
        // print_r($this->satMatrix);
    }
    
    public function init() {
        $matrix = explode(' ', trim(stream_get_line(STDIN, 10000000, PHP_EOL)));
        $this->n = $matrix[0];
        $this->m = $matrix[1];
        for ($i=1; $i<=$this->n; $i++) {
            $rows = explode(' ', trim(stream_get_line(STDIN, 10000000, PHP_EOL)));
            $this->matrix[$i] = array_combine(range(1, count($rows)), array_values($rows));
        }
        //print_r($this->matrix);
        $this->buildSATMatrix();

        $queries = stream_get_line(STDIN, 10000000, PHP_EOL);
        for ($i=0; $i<$queries; $i++) {
            $this->queriesMatrix = explode(' ', trim(stream_get_line(STDIN, 10000000, PHP_EOL)));
            $x = $this->queriesMatrix[0];
            $y = $this->queriesMatrix[1];
            echo 'Suma dla indeksu od [0][0] do ['. $x. '][' .$y. '] wynosi: '. $this->satMatrix[$x][$y] . PHP_EOL;
        }

        
        
        // print_r($this->matrix);
        // print_r($this->queriesMatrix);
    }

}


$matrix = new MatrixSum();
$matrix->init();
?>